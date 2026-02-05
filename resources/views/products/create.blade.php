@extends('layout')

@section('content')
<div class="max-w-5xl mx-auto py-8">
    <div class="md:grid md:grid-cols-3 md:gap-8">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0 sticky top-24">
                <h3 class="text-2xl font-black text-gray-900 tracking-tight">Add Product</h3>
                <p class="mt-2 text-sm text-gray-500 font-medium leading-relaxed">
                    Expand your catalog. Ensure all details are accurate for your customers.
                </p>
                <div class="mt-6">
                    <a href="{{ route('products.index') }}" class="inline-flex items-center text-sm font-bold text-emerald-600 hover:text-emerald-800 transition-colors">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                        Back to Products
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-8 py-8 space-y-8">
                        
                        {{-- Standard Fields --}}
                        <div class="space-y-6">
                            <div>
                                <label for="name" class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2 px-1">Product Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all bg-gray-50 focus:bg-white text-gray-900 font-bold placeholder-gray-400 text-lg" placeholder="E.g. Wireless Headphones">
                                @error('name') <p class="mt-2 text-sm font-bold text-red-500 flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="price" class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2 px-1">Price</label>
                                <div class="relative rounded-xl shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>
                                    <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" 
                                        class="w-full pl-7 px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all bg-gray-50 focus:bg-white text-gray-900 font-medium placeholder-gray-400" placeholder="0.00">
                                </div>
                                @error('price') <p class="mt-2 text-sm font-bold text-red-500 flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="description" class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2 px-1">Description</label>
                                <textarea name="description" id="description" rows="4" 
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all bg-gray-50 focus:bg-white text-gray-900 font-medium placeholder-gray-400 resize-y" placeholder="Describe your product..."></textarea>
                                @error('description') <p class="mt-2 text-sm font-bold text-red-500 flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>{{ $message }}</p> @enderror
                            </div>
                        </div>

                         {{-- Divider --}}
                         <div class="relative py-4">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-gray-100"></div>
                            </div>
                            <div class="relative flex justify-start">
                                <span class="pr-3 bg-white text-xs font-bold text-gray-400 uppercase tracking-wider">Specifications</span>
                            </div>
                        </div>

                        {{-- Custom Fields --}}
                        <x-custom-fields::render :model="null" :customFields="\App\Models\Product::customFields()" />

                    </div>
                    <div class="px-8 py-5 bg-gray-50/50 border-t border-gray-100 flex items-center justify-end">
                        <button type="submit" class="inline-flex items-center px-8 py-3.5 border border-transparent rounded-xl shadow-lg shadow-emerald-200 text-sm font-black text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all transform hover:-translate-y-0.5">
                            Save Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
