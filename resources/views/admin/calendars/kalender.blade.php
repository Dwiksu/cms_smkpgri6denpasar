<x-app-layout>
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
        {{-- <div class="overflow-x-auto rounded-lg border border-default bg-white shadow-sm">
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
                        <tr class="hover:bg-gray-50"> --}}
        {{-- Date --}}
        {{-- <td class="px-4 py-3 text-center">
                                <p class="text-lg font-bold text-blue-600">
                                    {{ \Carbon\Carbon::parse($e->start_date)->format('d') }}
                                </p>
                                <p class="text-xs text-gray-500 uppercase">
                                    {{ \Carbon\Carbon::parse($e->start_date)->format('M') }}
                                </p>
                            </td> --}}

        {{-- Title & Description --}}
        {{-- <td class="px-4 py-3">
                                <p class="font-semibold">
                                    {{ $e->title }}
                                </p>
                                <p class="text-xs text-gray-500 line-clamp-2">
                                    {{ $e->description }}
                                </p>
                            </td> --}}

        {{-- Category --}}
        {{-- <td class="px-4 py-3">
                                <span
                                    class="{{ CalendarCategoryColor($e->category) }} text-white text-xs font-semibold px-2 py-1 rounded-full">
                                    {{ ucfirst($e->category) }}
                                </span>
                            </td> --}}

        {{-- Date Range --}}
        {{-- <td class="px-4 py-3 text-gray-500">
                                {{ \Carbon\Carbon::parse($e->start_date)->translatedFormat('d M Y') }}
                                @if ($e->end_date)
                                    <br>
                                    <span class="text-xs text-gray-400">
                                        s/d {{ \Carbon\Carbon::parse($e->end_date)->translatedFormat('d M Y') }}
                                    </span>
                                @endif
                            </td> --}}

        {{-- Action --}}
        {{-- <td class="px-4 py-3 text-center">
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
        </div> --}}
        <div x-data="calendarPage()" x-init="initCalendar()" class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- KIRI: KALENDER -->
            <div class="lg:col-span-2 border-default bg-white shadow-sm rounded-lg p-4">
                <div id="calendar"></div>
            </div>

            <!-- KANAN: DETAIL -->
            <div class="border-default bg-white shadow-sm rounded-lg p-4 border h-fit">
                <template x-if="selectedEvent">
                    <div class="space-y-4">
                        <div>
                            <h2 class="text-lg font-bold" x-text="selectedEvent.title"></h2>
                            <p class="text-white text-xs font-semibold px-2 py-1 rounded-full w-fit"
                                :style="{ backgroundColor: selectedEvent.color }"
                                x-text="selectedEvent.category.charAt(0).toUpperCase() + selectedEvent.category.slice(1)">
                            </p>
                        </div>

                        <div class="text-sm">
                            <p>
                                <strong>Mulai:</strong>
                                <span x-text="formatDate(selectedEvent.start)"></span>
                            </p>
                            <p>
                                <strong>Selesai:</strong>
                                <span x-text="formatDate(selectedEvent.end)"></span>
                            </p>
                        </div>

                        <p class="text-sm text-gray-600" x-text="selectedEvent.description"></p>

                        <!-- ACTION -->
                        <div class="flex gap-2 pt-4">
                            <a :href="`/admin/kalender/${selectedEvent.id}/edit`"
                                class="bg-amber-400 hover:bg-amber-300 p-2 rounded shadow-sm text-white">
                                @svg('lucide-pencil', 'h-4 w-4')
                            </a>

                            <button @click="deleteEvent(selectedEvent.id)"
                                class="bg-red-500 hover:bg-red-400 text-white p-2 rounded shadow-sm">
                                @svg('lucide-trash-2', 'h-4 w-4')
                            </button>
                        </div>
                    </div>
                </template>

                <template x-if="!selectedEvent">
                    <p class="text-sm text-gray-500 text-center min-h-32 flex items-center justify-center">
                        Klik event di kalender untuk melihat detail
                    </p>
                </template>
            </div>
        </div>
    </div>

    <script>
        function calendarPage() {
            return {
                calendar: null,
                selectedEvent: null,

                initCalendar() {
                    const el = document.getElementById('calendar')

                    this.calendar = new FullCalendar.Calendar(el, {
                        initialView: 'dayGridMonth',
                        height: 'auto',
                        events: '/admin/calendar-events',

                        eventClick: (info) => {
                            this.selectedEvent = {
                                id: info.event.id,
                                title: info.event.title,
                                start: info.event.start,
                                end: info.event.end ?? info.event.start,
                                description: info.event.extendedProps.description,
                                category: info.event.extendedProps.category,
                                color: info.event.backgroundColor
                            }
                        }
                    })

                    this.calendar.render()
                },

                deleteEvent(id) {
                    Swal.fire({
                        title: 'Hapus event?',
                        text: 'Data tidak bisa dikembalikan',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Hapus'
                    }).then(r => {
                        if (!r.isConfirmed) return

                        fetch(`/admin/kalender/${id}/delete`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                                    'Accept': 'application/json'
                                }
                            })
                            .then(r => r.json())
                            .then(r => {
                                if (r.success) {
                                    Swal.fire("Terhapus!", r.message, "success")
                                    this.calendar.refetchEvents()
                                    this.selectedEvent = null
                                } else {
                                    Swal.fire("Gagal!", r.message ?? "Terjadi kesalahan", "error")
                                }
                            })
                            .catch(() => {
                                Swal.fire("Error!", "Gagal menghapus data", "error")
                            })

                    })
                },

                formatDate(date) {
                    return new Date(date).toLocaleDateString('id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    })
                }
            }
        }
    </script>



</x-app-layout>
