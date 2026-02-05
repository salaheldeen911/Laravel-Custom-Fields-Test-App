@extends('layout')

@section('content')
<h1 class="text-2xl font-bold mb-6">Create User</h1>

<form action="{{ route('users.store') }}" method="POST" class="bg-white p-6 rounded shadow max-w-lg">
    @csrf

    {{-- Standard Fields --}}
    <h2 class="text-xl font-semibold mb-4 border-b pb-2">Basic Info</h2>
    <div class="mb-4">
        <label class="block font-bold mb-1">Name</label>
        <input type="text" name="name" class="w-full border p-2 rounded" value="{{ old('name') }}" required>
        @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-1">Email</label>
        <input type="email" name="email" class="w-full border p-2 rounded" value="{{ old('email') }}" required>
        @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-1">Password</label>
        <input type="password" name="password" class="w-full border p-2 rounded" required>
        @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-1">Confirm Password</label>
        <input type="password" name="password_confirmation" class="w-full border p-2 rounded" required>
    </div>

    {{-- Custom Fields Smart Component --}}
    <x-custom-fields::render :model="null" :custom-fields="$customFields" />

    <div class="mt-6">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save User</button>
    </div>
</form>
@endsection