<x-app-layout>
    <x-slot:metaTitle>Halaman Galeri</x-slot:metaTitle>
    <x-slot:metaDesc>Ini halaman cuma buat galeri aja</x-slot:metaDesc>
    <x-slot:title>Galeri</x-slot:title>

    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="font-display text-3xl font-bold">Kelola Galeri</h1>
                <p class="text-gray-500">Kelola album dan foto galeri sekolah.</p>
            </div>
            <button type="submit"
                class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                @svg('lucide-plus', 'h-4 w-4 me-1.5')
                Tambah Album</button>
        </div>

        <div class="space-y-8">
            @if (count($albums) > 0)
                @foreach ($albums as $album)
                    <div class="rounded-lg border border-default bg-white shadow-sm">
                        <div class="space-y-1.5 p-6 flex flex-row items-start justify-between gap-4">
                            <div class="flex gap-4">
                                <img src={{ $album['cover_image'] }} alt={{ $album['name'] }}
                                    class="w-24 h-24 object-cover rounded-lg" />
                                <div>
                                    <CardTitle class="text-xl font-semibold leading-none tracking-tight">
                                        {{ $album['name'] }}</CardTitle>
                                    @if ($album['description'])
                                        <p class="text-sm text-gray-500 mt-1">{{ $album['description'] }}</p>
                                    @endif
                                    <div
                                        class="bg-brand-softer text-xs font-medium px-1.5 py-0.5 rounded-full inline-flex items-center mt-2">
                                        @svg('lucide-image', 'h-3 w-3 mr-1')
                                        {{ count($album['photos']) }} foto
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button type="button"
                                    class="bg-disabled box-border border border-gray-200 inline-flex items-center  hover:bg-amber-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                    @svg('lucide-plus', 'h-4 w-4 me-1') Tambah Foto</button>
                                <button type="button"
                                    class="bg-disabled box-border border border-gray-200 inline-flex items-center  hover:bg-amber-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                    @svg('lucide-pencil', 'h-4 w-4')</button>
                                <button type="button"
                                    class="text-white bg-red-500 box-border border border-fg-disabled inline-flex items-center  hover:bg-red-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                    @svg('lucide-trash-2', 'h-4 w-4')</button>
                            </div>
                        </div>
                        <div class="p-6 pt-0">
                            @if (count($album['photos']) > 0)
                                <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-2">
                                    @foreach ($album['photos'] as $photo)
                                        <div class="relative group aspect-square">
                                            <img src="{{ $photo['url'] }}" alt="{{ $photo['caption'] ?? 'Photo' }}"
                                                class="w-full h-full object-cover rounded" />
                                            <div
                                                class="absolute inset-0 bg-gray-800/50 opacity-0 group-hover:opacity-100 transition-opacity rounded flex items-center justify-center gap-1">
                                                <button type="button"
                                                    class="bg-disabled box-border border border-gray-200 inline-flex items-center  hover:bg-disabled/90 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                                    @svg('lucide-pencil', 'h-3 w-3')</button>
                                                <button type="button"
                                                    class="text-white bg-red-500 box-border border border-fg-disabled inline-flex items-center  hover:bg-red-500/90 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                                    @svg('lucide-trash-2', 'h-3 w-3')</button>
                                            </div>
                                            @if (isset($photo['caption']))
                                                <div
                                                    class="absolute bottom-0 left-0 right-0 bg-gray-800/70 text-white text-xs p-1 truncate rounded-b">
                                                    {{ $photo['caption'] }}
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-sm text-gray-500 text-center py-4">
                                    Belum ada foto dalam album ini. Klik "Tambah Foto" untuk menambahkan.
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-12">
                    <Images class="h-12 w-12 text-gray-500 mx-auto mb-4" />
                    <p class="text-gray-500">Belum ada album. Buat album baru untuk memulai.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
