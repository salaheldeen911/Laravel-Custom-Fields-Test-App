@extends('layout')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Users</h1>
    <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create User</a>
</div>

<div class="bg-white rounded shadow p-4">
    <table class="w-full text-left">
        <thead>
            <tr class="border-b">
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-2">{{ $user->name }}</td>
                <td class="p-2">{{ $user->email }}</td>
                <td class="p-2">
                    <a href="{{ route('users.edit', $user) }}" class="text-blue-500 mr-2">Edit</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection