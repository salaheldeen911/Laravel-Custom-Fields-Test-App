<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Fields Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="h-full bg-gray-50/50 selection:bg-indigo-500 selection:text-white">
    <div class="min-h-full">
        <!-- Modern Glass Navbar -->
        <nav class="sticky top-0 z-50 w-full backdrop-blur-md bg-white/80 border-b border-gray-100 transition-all duration-300" x-data="{ mobileMenuOpen: false }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">
                    <!-- Logo & Brand -->
                    <div class="flex-shrink-0 flex items-center gap-3">
                        <a href="{{ url('/') }}" class="flex items-center group">
                            <span class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-xl shadow-lg shadow-indigo-200 group-hover:scale-110 transition-transform duration-300 transform">🚀</span>
                            <span class="ml-3 text-xl font-extrabold tracking-tight text-gray-900 group-hover:text-indigo-600 transition-colors">
                                CustomFields <span class="text-indigo-600">Demo</span>
                            </span>
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="{{ url('/') }}" class="text-sm font-bold {{ request()->is('/') ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-900' }} transition-colors">
                            Home
                        </a>
                        <a href="{{ route('posts.index') }}" class="text-sm font-bold {{ request()->routeIs('posts.*') ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-900' }} transition-colors">
                            Posts
                        </a>
                        <a href="{{ route('products.index') }}" class="text-sm font-bold {{ request()->routeIs('products.*') ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-900' }} transition-colors">
                            Products
                        </a>
                        
                        <div class="h-6 w-px bg-gray-200"></div>

                        <a href="{{ url('/custom-fields') }}" class="group relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-bold text-white transition-all duration-200 bg-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 hover:bg-indigo-600 shadow-md hover:shadow-xl hover:-translate-y-0.5">
                            Manage Fields
                            <svg class="w-4 h-4 ml-2 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden flex items-center">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-xl text-gray-400 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 transition-colors">
                            <span class="sr-only">Open main menu</span>
                            <svg class="h-6 w-6" x-show="!mobileMenuOpen" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="h-6 w-6" x-show="mobileMenuOpen" x-cloak fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" x-collapse x-cloak class="md:hidden border-t border-gray-100 bg-white">
                <div class="px-4 pt-2 pb-6 space-y-1">
                    <a href="{{ url('/') }}" class="block px-3 py-4 rounded-xl text-base font-bold {{ request()->is('/') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-900 hover:bg-gray-50' }}">
                        Home
                    </a>
                    <a href="{{ route('posts.index') }}" class="block px-3 py-4 rounded-xl text-base font-bold {{ request()->routeIs('posts.*') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-900 hover:bg-gray-50' }}">
                        Posts
                    </a>
                    <a href="{{ route('products.index') }}" class="block px-3 py-4 rounded-xl text-base font-bold {{ request()->routeIs('products.*') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-900 hover:bg-gray-50' }}">
                        Products
                    </a>
                    <div class="pt-4 mt-4 border-t border-gray-100">
                        <a href="{{ url('/custom-fields') }}" class="flex items-center justify-center w-full px-4 py-4 text-base font-bold text-white bg-indigo-600 rounded-xl hover:bg-indigo-700">
                            Manage Custom Fields
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="mb-10 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-500 p-1 shadow-lg transform transition-all duration-300 hover:scale-[1.01]">
                        <div class="flex items-center justify-between rounded-xl bg-white p-4">
                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0 flex items-center justify-center w-10 h-10 rounded-full bg-emerald-100">
                                    <svg class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-gray-900">Success!</h3>
                                    <p class="text-sm text-gray-500">{{ session('success') }}</p>
                                </div>
                            </div>
                            <button @click="show = false" class="text-gray-400 hover:text-gray-500 transition-colors">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
        
        <footer class="bg-white border-t border-gray-100 mt-auto">
             <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-sm font-medium text-gray-400">
                    &copy; {{ date('Y') }} CustomFields Demo. Built with Laravel & Tailwind CSS.
                </p>
             </div>
        </footer>
    </div>
</body>
</html>