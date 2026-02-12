<?php

function isActiveSidebar($path)
{
    return request()->routeIs($path)
        ? 'bg-neutral-tertiary text-cyan-600'
        : 'text-neutral-tertiary hover:bg-gray-200 hover:text-cyan-600';
}

function CalendarCategoryColor(string $category): string
{
    return match ($category) {
        'akademik' => 'bg-brand text-white',
        'kegiatan' => 'bg-green-500 text-white',
        'ujian' => 'bg-red-500 text-white',
        'libur' => 'bg-yellow-500 text-white',
        default => 'bg-gray-500 text-white',
    };
}

function errorBorder(string $field): string
{
    $errors = session('errors');
    return $errors && $errors->has($field)
        ? 'bg-red-50 border-red-100 focus:border-red-300 focus:ring-red-300'
        : 'border-default-medium';
}
