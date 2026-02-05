@extends('layout')

@section('content')
<div class="relative min-h-[80vh] flex flex-col justify-center overflow-hidden">
    <!-- Background Decor -->
    <div class="absolute top-0 right-0 -mr-20 -mt-20 sm:mr-0 sm:mt-0">
        <div class="w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob"></div>
    </div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 sm:ml-0 sm:mb-0">
        <div class="w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-700 text-sm font-bold mb-6 shadow-sm">
                <span class="flex h-2 w-2 rounded-full bg-indigo-600 mr-2 animate-pulse"></span>
                v1.0.0 Now Available
            </div>
            
            <h1 class="text-5xl md:text-7xl font-black text-gray-900 tracking-tight leading-tight mb-6">
                Professional <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-violet-600">Custom Fields</span>
                <span class="block text-4xl md:text-6xl text-gray-800 mt-2">for Laravel Applications</span>
            </h1>
            
            <p class="text-xl text-gray-500 mb-10 leading-relaxed mx-auto max-w-2xl">
                Empower your data models with dynamic attributes. Validated, type-safe, and seamlessly integrated into your Eloquent workflow.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ url('/custom-fields') }}" class="group relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-200 bg-indigo-600 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 hover:bg-indigo-700 shadow-lg hover:shadow-indigo-500/30 transform hover:-translate-y-1">
                    <span>Manage Fields</span>
                    <svg class="w-5 h-5 ml-2 -mr-1 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
                <a href="https://github.com/salaheldeen911/package-skeleton-laravel" target="_blank" class="inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-gray-700 transition-all duration-200 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 hover:bg-gray-50 hover:border-gray-300 shadow-sm transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    Documentation
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- Posts Card -->
            <a href="{{ route('posts.index') }}" class="group relative overflow-hidden bg-white rounded-3xl p-8 shadow-sm hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-indigo-100">
                <div class="absolute top-0 right-0 p-6 opacity-5 group-hover:opacity-10 transition-opacity">
                     <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 group-hover:text-indigo-600 transition-colors mb-3">Post Management</h3>
                    <p class="text-gray-500 leading-relaxed mb-6">
                        Experience dynamic content structures. Attach metadata, SEO tags, or custom switches to your blog posts on the fly.
                    </p>
                    <div class="flex items-center text-sm font-bold text-indigo-600">
                        Explore Posts
                        <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </div>
                </div>
            </a>

            <!-- Products Card -->
            <a href="{{ route('products.index') }}" class="group relative overflow-hidden bg-white rounded-3xl p-8 shadow-sm hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-emerald-100">
                <div class="absolute top-0 right-0 p-6 opacity-5 group-hover:opacity-10 transition-opacity">
                    <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 group-hover:text-emerald-600 transition-colors mb-3">Product Catalog</h3>
                    <p class="text-gray-500 leading-relaxed mb-6">
                        Simulate complex e-commerce needs. Add specs, dimensions, or technical attributes without changing your database schema.
                    </p>
                    <div class="flex items-center text-sm font-bold text-emerald-600">
                        Explore Products
                        <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
</style>
@endsection
