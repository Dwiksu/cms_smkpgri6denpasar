<x-app-layout>
    <x-slot:metaTitle>Halaman Profil Guru</x-slot:metaTitle>
    <x-slot:metaDesc>Ini halaman cuma buat profil guru aja</x-slot:metaDesc>
    <x-slot:title>Profil Guru</x-slot:title>

    <div class="space-y-6" x-data="{ search: '' }">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="font-display text-3xl font-bold">Kelola Guru</h1>
                <p class="text-gray-500">Tambah, edit, atau hapus data guru.</p>
            </div>
            <a href="{{ route('admin.profil.create') }}"
                class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                @svg('lucide-plus', 'h-4 w-4 me-1.5')
                Tambah Guru</a>
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
                    placeholder="Cari guru..." />
            </div>
        </div>

        {{-- Teacher List --}}
        <div class="overflow-x-auto rounded-xl border border-default bg-white shadow-xs">
            <table class="w-full text-sm text-left text-heading">
                <thead class="bg-neutral-primary-soft text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Foto</th>
                        <th class="px-4 py-3">Nama Guru</th>
                        <th class="px-4 py-3">Jabatan</th>
                        <th class="px-4 py-3">Mata Pelajaran</th>
                        <th class="px-4 py-3">Pendidikan</th>
                        <th class="px-4 py-3">Jurusan</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-default">
                    @forelse ($teachers as $item)
                        <tr class="hover:bg-neutral-secondary-soft transition"
                            x-show="
                                search === '' ||
                                '{{ strtolower($item->name) }}'.includes(search.toLowerCase()) ||
                                '{{ strtolower($item->position) }}'.includes(search.toLowerCase()) ||
                                '{{ strtolower($item->major->name ?? 'Umum') }}'.includes(search.toLowerCase()) || 
                                '{{ strtolower($item->subject) }}'.includes(search.toLowerCase()) || 
                                '{{ strtolower($item->education) }}'.includes(search.toLowerCase())
                            ">

                            {{-- Foto --}}
                            <td class="px-4 py-3">
                                <img src="{{ $item->photo }}" alt="{{ $item->name }}"
                                    class="w-10 h-10 rounded-full object-cover border" />
                            </td>

                            {{-- Nama --}}
                            <td class="px-4 py-3 font-semibold capitalize">
                                {{ $item->name }}
                            </td>

                            {{-- Jabatan --}}
                            <td class="px-4 py-3 text-gray-600 capitalize">
                                {{ $item->position }}
                            </td>

                            {{-- Subject --}}
                            <td class="px-4 py-3 text-blue-600 capitalize">
                                {{ $item->subject }}
                            </td>

                            {{-- Pendidikan --}}
                            <td class="px-4 py-3 text-green-600 capitalize">
                                {{ $item->education ?? '—' }}
                            </td>

                            {{-- Jurusan --}}
                            <td class="px-4 py-3 text-purple-600 capitalize">
                                {{ $item->major->name ?? 'Umum' }}
                            </td>

                            {{-- Aksi --}}
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.profil.edit', $item) }}"
                                        class="bg-amber-400 hover:bg-amber-300 text-white rounded-lg p-2">
                                        @svg('lucide-pencil', 'h-4 w-4')
                                    </a>

                                    <form action="{{ route('admin.profil.destroy', $item) }}" method="POST"
                                        class="delete-form" data-confirm="Hapus guru {{ $item->name }}?">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-400 text-white rounded-lg p-2">
                                            @svg('lucide-trash-2', 'h-4 w-4')
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                                Tidak ada data guru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
