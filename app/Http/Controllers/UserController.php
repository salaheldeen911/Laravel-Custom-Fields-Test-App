<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return response()->json($user->load(['customFieldsValues']));
    }

    public function create()
    {
        $customFields = User::customFields();

        return view('users.create', compact('customFields'));
    }

    public function store(Request $request)
    {
        // 1. Validate Custom Fields first
        $validator = User::customFieldsValidation($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // 2. Validate Standard Fields
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:4',
        ]);
        $validated['password'] = bcrypt($validated['password']);

        // 3. Create User
        $user = User::create($validated);

        // 4. Save Custom Fields
        // Note: The service expects request structure with 'fieldName' keys
        $user->saveCustomFields(data: $request->all());

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        // Eager load values to avoid N+1 queries when accessing $user->custom(...)
        $user->load('customFieldsValues.customField');

        $customFields = User::customFields();

        return view('users.edit', compact('user', 'customFields'));
    }

    public function update(Request $request, User $user)
    {
        $validator = User::customFieldsValidation($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        if ($request->filled('password')) {
            $request->validate(['password' => 'confirmed|min:4']);
            $validated['password'] = bcrypt($request->password);
        }

        $user->update($validated);
        $user->updateCustomFields($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'User deleted.');
    }
}
