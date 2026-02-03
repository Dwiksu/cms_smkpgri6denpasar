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
            <a href="{{ route('admin.berita.create') }}"
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
                                <img src={{ $item->image }} alt={{ $item->title }}
                                    class="w-24 h-24 object-cover rounded shrink-0" />
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between gap-2">
                                        <div>
                                            <span
                                                class="text-xs font-bold px-2 py-1 rounded-full {{ NewsCategoryColor($item->category) }}">{{ ucfirst($item->category) }}</span>
                                            <h3 class="text-xl font-semibold mt-1 line-clamp-1">{{ $item->title }}</h3>
                                            <p class="text-sm text-gray-500 line-clamp-2">{{ $item->excerpt }}
                                            </p>
                                            <p class="text-xs text-gray-500 mt-2">
                                                {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, d F Y') }}
                                            </p>
                                        </div>
                                        <div class="flex gap-2 shrink-0">
                                            <a type="button" href="{{ route('admin.berita.edit', $item) }}"
                                                class="bg-amber-400 box-border border border-amber-200 inline-flex items-center  hover:bg-amber-300 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                                @svg('lucide-pencil', 'h-4 w-4')</a>
                                            <form action="{{ route('admin.berita.destroy', $item) }}" method="POST" class="delete-form" data-confirm="Hapus berita {{ $item->title }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-white bg-red-500 box-border border border-fg-disabled inline-flex items-center  hover:bg-red-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                                    @svg('lucide-trash-2', 'h-4 w-4')</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="rounded-lg border border-default bg-white shadow-sm">
                    <div class="p-4 flex items-center gap-4">
                        <div class="w-14 text-center shrink-0">
                            <p class="text-2xl font-bold text-blue-600">-</p>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold mt-1">Tidak ada Berita.</h3>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
