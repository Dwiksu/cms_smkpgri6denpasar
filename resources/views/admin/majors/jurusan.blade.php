<x-app-layout>
    <x-slot:title>Jurusan</x-slot:title>

    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="font-display text-3xl font-bold">Kelola Jurusan</h1>
                <p class="text-gray-500">Tambah, edit, atau hapus program keahlian.</p>
            </div>
            <a href="{{ route('admin.jurusan.create') }}"
                class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                @svg('lucide-plus', 'h-4 w-4 me-1.5')
                Tambah Jurusan</a>
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
                    placeholder="Cari jurusan..." required />
            </div>
        </div>

        {{--  Majors List  --}}
        <div class="overflow-x-auto rounded-lg border border-default bg-white shadow-sm">
            <table class="min-w-full text-sm">
                <thead class="bg-neutral-secondary-soft border-b border-default">
                    <tr class="text-left text-heading">
                        <th class="px-4 py-3">Gambar</th>
                        <th class="px-4 py-3">Singkatan</th>
                        <th class="px-4 py-3">Nama Jurusan</th>
                        <th class="px-4 py-3">Deskripsi</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-default">
                    @forelse ($majors as $item)
                        <tr class="hover:bg-neutral-secondary-soft/50 transition">
                            {{-- Image --}}
                            <td class="px-4 py-3">
                                <img src="{{ $item->image }}" alt="{{ $item->name }}"
                                    class="w-16 h-12 object-cover rounded-md border">
                            </td>

                            {{-- Short Name --}}
                            <td class="px-4 py-3">
                                <span
                                    class="inline-flex items-center rounded-md bg-blue-100 text-blue-700 px-2 py-1 text-xs font-medium uppercase">
                                    {{ $item->short_name }}
                                </span>
                            </td>

                            {{-- Name --}}
                            <td class="px-4 py-3 font-semibold capitalize">
                                {{ $item->name }}
                            </td>

                            {{-- Description --}}
                            <td class="px-4 py-3 text-gray-500 max-w-sm">
                                <p class="line-clamp-2">
                                    {{ $item->description }}
                                </p>
                            </td>

                            {{-- Actions --}}
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.jurusan.edit', $item) }}"
                                        class="bg-amber-400 hover:bg-amber-300 text-white p-2 rounded shadow-xs">
                                        @svg('lucide-pencil', 'w-4 h-4')
                                    </a>

                                    <form action="{{ route('admin.jurusan.destroy', $item) }}" method="POST"
                                        class="delete-form" data-confirm="Hapus jurusan {{ $item->name }}?">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-400 text-white p-2 rounded shadow-xs">
                                            @svg('lucide-trash-2', 'w-4 h-4')
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                Tidak ada jurusan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
