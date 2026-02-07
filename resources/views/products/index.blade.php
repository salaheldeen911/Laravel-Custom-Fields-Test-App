@extends('layout')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Products</h1>
        <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Create Product
        </a>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-md border border-gray-200">
        <ul role="list" class="divide-y divide-gray-200">
            @forelse($products as $product)
            <li>
                <div class="px-4 py-4 sm:px-6 hover:bg-gray-50 transition duration-150 ease-in-out">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-medium text-indigo-600 truncate mr-2">{{ $product->name }}</h3>
                            <p class="mt-1 flex items-center text-sm text-gray-500">
                                <span class="font-bold text-gray-900 mr-2">${{ number_format($product->price, 2) }}</span>
                                <span class="truncate text-gray-400">{{ Str::limit($product->description, 40) }}</span>
                            </p>
                            
                            {{-- Display Custom Fields Summary --}}
                            @php
                                $customData = $product->customFieldsResponse();
                            @endphp
                            @if(!empty($customData))
                            <div class="mt-2 flex flex-wrap gap-2">
                                @foreach(array_slice($customData, 0, 3) as $key => $value)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                        {{ Str::studly($key) }}: {{ is_array($value) ? 'Array' : Str::limit($value, 20) }}
                                    </span>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="ml-4 flex-shrink-0 flex items-center space-x-4">
                            <a href="{{ route('products.show', $product) }}" class="text-gray-600 hover:text-gray-900 font-medium text-sm">View</a>
                            <a href="{{ route('products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900 font-medium text-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium text-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </li>
            @empty
            <li class="px-4 py-12 text-center">
                <p class="text-gray-500">No products found. Create one to get started!</p>
            </li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
