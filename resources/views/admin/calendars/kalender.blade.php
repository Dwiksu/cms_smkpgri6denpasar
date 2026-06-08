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
                            <h2 class="text-lg font-bold" x-text="selectedEvent.title.charAt(0).toUpperCase() + selectedEvent.title.slice(1)"></h2>
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
                            <a :href="`/cp-smkpgri-6/kalender/${selectedEvent.id}/edit`"
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
                        events: '/cp-smkpgri-6/calendar-events',

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

                        fetch(`/cp-smkpgri-6/kalender/${id}/delete`, {
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
