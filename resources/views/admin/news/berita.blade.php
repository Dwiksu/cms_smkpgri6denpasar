<x-app-layout>
    <x-slot:metaTitle>Halaman Berita</x-slot:metaTitle>
    <x-slot:metaDesc>Ini halaman cuma buat berita aja</x-slot:metaDesc>
    <x-slot:title>Berita</x-slot:title>

    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="font-display text-3xl font-bold">Kelola Berita</h1>
                <p class="text-gray-500">Tambah, edit, atau hapus berita dan pengumuman.</p>
            </div>
            <a href="{{ route('berita.create.admin') }}"
                class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                @svg('lucide-plus', 'h-4 w-4 me-1.5')
                Tambah Berita</a>
        </div>

        {{-- Search --}}
        <div class="max-w-md relative">
            <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    @svg('lucide-search', 'w-4 h-4 text-body')
                </div>
                <input type="search" id="search"
                    class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                    placeholder="Cari berita..." />
            </div>
        </div>

        {{--  News List  --}}
        <div class="grid gap-4">
            @if (count($news) > 0)
                @foreach ($news as $item)
                    <div class="rounded-lg border border-default bg-white shadow-sm">
                        <div class="p-4">
                            <div class="flex gap-4">
                                <img src={{ $item['image'] }} alt={{ $item['title'] }}
                                    class="w-24 h-24 object-cover rounded flex-shrink-0" />
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between gap-2">
                                        <div>
                                            <span
                                                class="bg-brand text-white text-xs font-bold px-2 py-1 rounded-full">Berita</span>
                                            <h3 class="font-semibold mt-1 line-clamp-1">{{ $item['title'] }}</h3>
                                            <p class="text-sm text-gray-500 line-clamp-2">{{ $item['excerpt'] }}
                                            </p>
                                            <p class="text-xs text-gray-500 mt-2">
                                                {{ \Carbon\Carbon::parse($item['published_at'])->translatedFormat('l, d F y') }}
                                            </p>
                                        </div>
                                        <div class="flex gap-2 flex-shrink-0">
                                            <button type="button"
                                                class="bg-disabled box-border border border-gray-200 inline-flex items-center  hover:bg-amber-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                                @svg('lucide-pencil', 'h-4 w-4')</button>
                                            <button type="button"
                                                class="text-white bg-red-500 box-border border border-fg-disabled inline-flex items-center  hover:bg-red-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                                @svg('lucide-trash-2', 'h-4 w-4')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-muted-foreground py-8">Tidak ada berita ditemukan.</p>
            @endif
        </div>
    </div>
</x-app-layout>
