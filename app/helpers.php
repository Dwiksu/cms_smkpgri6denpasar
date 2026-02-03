<?php

function isActiveSidebar($path) {
    return request()->routeIs($path)
        ? 'bg-neutral-tertiary text-cyan-600'
        : 'text-neutral-tertiary hover:bg-gray-200 hover:text-cyan-600';
}

 function NewsCategoryColor(string $category): string
    {
        return match ($category) {
            'berita'   => 'bg-brand text-white',
            'kegiatan'   => 'bg-green-500 text-white',
            'pengumuman' => 'bg-red-500 text-white',
            'prestasi' => 'bg-yellow-500 text-white',
            default      => 'bg-gray-500 text-white',
        };
    }