<x-app-layout>
    <x-slot:metaTitle>Halaman Berita</x-slot:metaTitle>
    <x-slot:metaDesc>Ini halaman cuma buat berita aja</x-slot:metaDesc>
    <x-slot:title>Berita</x-slot:title>

    <div class="space-y-6" x-data="{ search: '' }">
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
                <input type="search" id="search" x-model.debounce.300ms="search"
                    class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                    placeholder="Cari berita..." />
            </div>
        </div>

        {{-- News Table --}}
        <div class="overflow-x-auto rounded-lg border border-default bg-white shadow-sm">
            <table class="w-full text-sm text-left">
                <thead class="bg-neutral-secondary-medium text-heading">
                    <tr>
                        <th class="px-4 py-3 w-20">Gambar</th>
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3 text-center w-28">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-default">
                    @forelse ($news as $item)
                        <tr class="hover:bg-gray-50"
                            x-show="
                                search === '' ||
                                '{{ strtolower($item->title) }}'.includes(search.toLowerCase()) ||
                                '{{ strtolower($item->excerpt) }}'.includes(search.toLowerCase()) ||
                                '{{ strtolower($item->category) }}'.includes(search.toLowerCase())
                            ">
                            {{-- Image --}}
                            <td class="px-4 py-3">
                                <img src="{{ $item->image }}" alt="{{ $item->title }}"
                                    class="w-16 h-16 object-cover rounded">
                            </td>

                            {{-- Title & Excerpt --}}
                            <td class="px-4 py-3">
                                <p class="font-semibold line-clamp-1">
                                    {{ $item->title }}
                                </p>
                                <p class="text-xs text-gray-500 line-clamp-2">
                                    {{ $item->excerpt }}
                                </p>
                            </td>

                            {{-- Category --}}
                            <td class="px-4 py-3">
                                <span
                                    class="text-xs font-semibold px-2 py-1 rounded-full {{ NewsCategoryColor($item->category) }}">
                                    {{ ucfirst($item->category) }}
                                </span>
                            </td>

                            {{-- Published Date --}}
                            <td class="px-4 py-3 text-gray-500">
                                {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d F Y') }}
                            </td>

                            {{-- Action --}}
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.berita.edit', $item) }}"
                                        class="bg-amber-400 hover:bg-amber-300 p-2 rounded shadow-sm">
                                        @svg('lucide-pencil', 'h-4 w-4')
                                    </a>

                                    <form action="{{ route('admin.berita.destroy', $item) }}" method="POST"
                                        class="delete-form" data-confirm="Hapus berita {{ $item->title }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-400 text-white p-2 rounded shadow-sm">
                                            @svg('lucide-trash-2', 'h-4 w-4')
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                Tidak ada berita.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
