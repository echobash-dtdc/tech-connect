{{-- resources/views/components/sidebar-link.blade.php --}}
@props(['active' => false])

@php
    $classes = ($active ?? false)
                ? 'block pl-3 pr-4 py-2 border-l-4 border-primary-500 text-base font-medium text-primary-700 bg-primary-100 dark:text-primary-100 dark:bg-primary-700'
                : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-primary-600 hover:border-primary-300 hover:bg-primary-50 dark:text-primary-200 dark:hover:bg-primary-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>