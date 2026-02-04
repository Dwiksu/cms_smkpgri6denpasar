<x-app-layout>
    <x-slot:metaTitle>Halaman Kalender</x-slot:metaTitle>
    <x-slot:metaDesc>Ini halaman cuma buat kalender aja</x-slot:metaDesc>
    <x-slot:title>Kalender</x-slot:title>

    <div class="space-y-6">
        <div class="flex justify-between items-center gap-4">
            <div>
                <h1 class="font-display text-3xl font-bold">Kelola Kalender</h1>
                <p class="text-gray-500">Tambah dan kelola agenda sekolah.</p>
            </div>
            <a href="{{ route('admin.kalender.create') }}" type="button"
                class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                @svg('lucide-plus', 'h-4 w-4 me-1.5')
                Tambah Agenda</a>
        </div>

        {{-- Calendar Table --}}
        <div class="overflow-x-auto rounded-lg border border-default bg-white shadow-sm">
            <table class="w-full text-sm text-left">
                <thead class="bg-neutral-secondary-medium text-heading">
                    <tr>
                        <th class="px-4 py-3 w-24">Tanggal</th>
                        <th class="px-4 py-3">Agenda</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Periode</th>
                        <th class="px-4 py-3 text-center w-28">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-default">
                    @forelse ($events as $e)
                        <tr class="hover:bg-gray-50">
                            {{-- Date --}}
                            <td class="px-4 py-3 text-center">
                                <p class="text-lg font-bold text-blue-600">
                                    {{ \Carbon\Carbon::parse($e->start_date)->format('d') }}
                                </p>
                                <p class="text-xs text-gray-500 uppercase">
                                    {{ \Carbon\Carbon::parse($e->start_date)->format('M') }}
                                </p>
                            </td>

                            {{-- Title & Description --}}
                            <td class="px-4 py-3">
                                <p class="font-semibold">
                                    {{ $e->title }}
                                </p>
                                <p class="text-xs text-gray-500 line-clamp-2">
                                    {{ $e->description }}
                                </p>
                            </td>

                            {{-- Category --}}
                            <td class="px-4 py-3">
                                <span
                                    class="{{ CalendarCategoryColor($e->category) }} text-white text-xs font-semibold px-2 py-1 rounded-full">
                                    {{ ucfirst($e->category) }}
                                </span>
                            </td>

                            {{-- Date Range --}}
                            <td class="px-4 py-3 text-gray-500">
                                {{ \Carbon\Carbon::parse($e->start_date)->translatedFormat('d M Y') }}
                                @if ($e->end_date)
                                    <br>
                                    <span class="text-xs text-gray-400">
                                        s/d {{ \Carbon\Carbon::parse($e->end_date)->translatedFormat('d M Y') }}
                                    </span>
                                @endif
                            </td>

                            {{-- Action --}}
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.kalender.edit', $e) }}"
                                        class="bg-amber-400 hover:bg-amber-300 p-2 rounded shadow-sm">
                                        @svg('lucide-pencil', 'h-4 w-4')
                                    </a>

                                    <form action="{{ route('admin.kalender.destroy', $e) }}" method="POST"
                                        class="delete-form" data-confirm="Hapus agenda {{ $e->title }}">
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
                                Tidak ada agenda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
