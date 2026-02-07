@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-3xl font-black text-gray-900 tracking-tight">{{ $post->title }}</h1>
        <div class="flex space-x-3">
            <a href="{{ route('posts.edit', $post) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Edit Post
            </a>
            <a href="{{ route('posts.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Back to List
            </a>
        </div>
    </div>

    {{-- Content --}}
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Post Details</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Standard and custom attributes.</p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Title</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $post->title }}</dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Content</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 whitespace-pre-wrap">{{ $post->content }}</dd>
                </div>
            </dl>
        </div>
    </div>

    {{-- Custom Fields --}}
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 bg-gray-50">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Custom Fields Data</h3>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                @forelse($post->customFieldsResponse() as $key => $value)
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 hover:bg-gray-50 transition-colors">
                        <dt class="text-sm font-bold text-gray-500 uppercase tracking-wider">{{ Str::headline($key) }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                             @if(is_array($value))
                                @if(isset($value['path']))
                                    {{-- File --}}
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                        <a href="{{ \Illuminate\Support\Facades\Storage::disk(config('custom-fields.files.disk', 'public'))->url($value['path']) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900 font-medium underline">
                                            {{ $value['original_name'] ?? 'Download File' }}
                                        </a>
                                        <span class="text-gray-400 text-xs">({{ isset($value['size']) ? number_format($value['size'] / 1024, 2) . ' KB' : '' }})</span>
                                    </div>
                                @else
                                    {{-- Other Array --}}
                                    <pre class="bg-gray-100 rounded p-2 text-xs overflow-auto">{{ json_encode($value, JSON_PRETTY_PRINT) }}</pre>
                                @endif
                             @else
                                {{ $value }}
                             @endif
                        </dd>
                    </div>
                @empty
                    <div class="py-4 sm:py-5 sm:px-6 text-center text-gray-500">
                        No custom fields data available.
                    </div>
                @endforelse
            </dl>
        </div>
    </div>
</div>
@endsection
