@props(['href' => '#'])
<li>
    <a href="{{ $href }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
        <span class="w-6 h-6 text-gray-500 dark:text-gray-400">
            {{ $icon ?? '' }}
        </span>
        <span class="ml-3">{{ $slot }}</span>
    </a>
</li>
