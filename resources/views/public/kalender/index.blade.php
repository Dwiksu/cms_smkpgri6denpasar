<x-app>
    <x-slot:title>Kalender</x-slot:title>

    <div class="min-h-screen" x-data="calendarApp({{ $events->toJson() }})" x-init="initCalendar()">

        <section id="hero" class="bg-white aspect-5/1 w-full relative flex overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                style="background-image: url('assets/guru.jpeg');">
                <div class="absolute inset-0 bg-linear-to-r from-sky-600/90 to-sky-600/70"></div>
            </div>
            <div class="py-8 px-4 max-w-screen-xl mx-auto w-full lg:py-16 lg:px-8 relative z-10 flex items-end">
                <div>
                    <h1 class="mb-4 text-4xl font-bold tracking-tight text-white md:text-5xl lg:text-6xl">
                        Kalender Akademik</h1>
                    <p class="text-lg font-normal text-white lg:text-xl">
                        Lihat jadwal kegiatan, ujian, dan agenda penting sekolah.</p>
                </div>
            </div>
        </section>

        <section class="py-12">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
                <div class="grid lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
                            <div
                                class="p-6 border-b border-slate-100 flex flex-wrap items-center justify-between gap-4">
                                <h2 class="text-xl font-bold text-slate-800" x-text="formatMonthTitle()"></h2>

                                <div class="flex items-center gap-3">
                                    <select x-model="categoryFilter"
                                        class="rounded-xl border-slate-200 text-sm focus:ring-sky-500">
                                        <option value="all">Semua Kategori</option>
                                        <option value="akademik">Akademik</option>
                                        <option value="kegiatan">Kegiatan</option>
                                        <option value="libur">Libur</option>
                                        <option value="ujian">Ujian</option>
                                    </select>

                                    <div class="flex gap-1">
                                        <button @click="prevMonth()"
                                            class="p-2 hover:bg-slate-100 rounded-lg border border-slate-200">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                        <button @click="nextMonth()"
                                            class="p-2 hover:bg-slate-100 rounded-lg border border-slate-200">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="grid grid-cols-7 gap-px mb-2 text-center">
                                    <template x-for="day in ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab']">
                                        <div class="text-sm font-bold text-slate-400 py-2" x-text="day"></div>
                                    </template>
                                </div>

                                <div class="grid grid-cols-7 gap-2">
                                    <template x-for="blank in blankDays">
                                        <div class="aspect-square"></div>
                                    </template>

                                    <template x-for="date in noOfDays">
                                        <div class="aspect-square p-1 border rounded-2xl transition-all relative group"
                                            :class="isToday(date) ? 'border-sky-600 bg-sky-50/50 ring-1 ring-sky-600' :
                                                'border-transparent hover:bg-slate-50 hover:border-slate-200'">

                                            <div class="flex flex-col h-full">
                                                <span class="text-sm font-semibold"
                                                    :class="isToday(date) ? 'text-sky-600' : 'text-slate-700'"
                                                    x-text="date"></span>

                                                <div class="mt-1 space-y-1 overflow-hidden">
                                                    <template x-for="event in getEventsForDay(date)">
                                                        <div @click="openEvent(event)"
                                                            :class="getCategoryClass(event.category)"
                                                            class="text-[10px] px-1.5 py-0.5 rounded-md truncate shadow-sm cursor-pointer"
                                                            :title="event.title">
                                                            <span x-text="event.title"></span>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>

                                <div class="flex flex-wrap gap-4 mt-8 pt-6 border-t border-slate-100">
                                    <div class="flex items-center gap-2 text-xs font-medium text-slate-500">
                                        <div class="w-3 h-3 rounded-full bg-sky-600"></div> Akademik
                                    </div>
                                    <div class="flex items-center gap-2 text-xs font-medium text-slate-500">
                                        <div class="w-3 h-3 rounded-full bg-amber-500"></div> Kegiatan
                                    </div>
                                    <div class="flex items-center gap-2 text-xs font-medium text-slate-500">
                                        <div class="w-3 h-3 rounded-full bg-emerald-500"></div> Libur
                                    </div>
                                    <div class="flex items-center gap-2 text-xs font-medium text-slate-500">
                                        <div class="w-3 h-3 rounded-full bg-rose-500"></div> Ujian
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-white rounded-3xl p-6 shadow-xl border border-slate-100 sticky top-24">
                            <h3 class="text-xl font-bold text-slate-800 mb-6">Agenda Mendatang</h3>

                            <div class="space-y-6">
                                <template x-for="event in upcomingEvents" :key="event.id">
                                    <div @click="openEvent(event)" class="flex gap-4 group cursor-pointer">
                                        <div
                                            class="flex-shrink-0 w-14 text-center bg-slate-50 rounded-2xl p-2 group-hover:bg-sky-50 transition-colors border border-slate-100">
                                            <p class="text-2xl font-bold text-sky-600"
                                                x-text="getDay(event.start_date)">
                                            </p>
                                            <p class="text-[10px] text-slate-500 uppercase font-bold"
                                                x-text="getMonthLabel(event.start_date)"></p>
                                        </div>
                                        <div class="flex-1">
                                            <span :class="getCategoryClass(event.category)"
                                                class="text-[10px] uppercase font-bold px-2 py-0.5 rounded-full mb-1 inline-block">
                                                <span x-text="event.category"></span>
                                            </span>
                                            <h4 class="font-bold text-slate-800 text-sm line-clamp-1"
                                                x-text="event.title"></h4>
                                            <p class="text-xs text-slate-500 mt-1 line-clamp-2"
                                                x-text="event.description"></p>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <template x-teleport="body">
            <div x-show="showModal" class="fixed inset-0 z-[999] flex items-center justify-center p-4" x-cloak>

                <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" @click="closeModal()"
                    class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>

                <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                    x-transition:leave-end="opacity-0 scale-95 translate-y-4"
                    class="relative bg-white w-full max-w-lg rounded-3xl shadow-2xl overflow-hidden z-10">

                    <div :class="selectedEvent ? getCategoryClass(selectedEvent.category) : ''"
                        class="p-6 text-white relative">
                        <button @click="closeModal()"
                            class="absolute top-4 right-4 p-2 hover:bg-white/20 rounded-full transition-colors">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <span class="text-xs font-bold uppercase tracking-widest opacity-80"
                            x-text="selectedEvent?.category"></span>
                        <h3 class="text-2xl font-bold mt-1" x-text="selectedEvent?.title"></h3>
                    </div>

                    <div class="p-8 space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-slate-100 rounded-2xl text-slate-500">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800">Waktu Pelaksanaan</p>
                                <p class="text-slate-600"
                                    x-text="selectedEvent ? formatFullDate(selectedEvent.start_date) : ''"></p>
                                <template x-if="selectedEvent?.end_date">
                                    <p class="text-slate-600 mt-1">
                                        s/d <span x-text="formatFullDate(selectedEvent.end_date)"></span>
                                    </p>
                                </template>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-slate-100 rounded-2xl text-slate-500">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800">Detail Agenda</p>
                                <p class="text-slate-600 leading-relaxed mt-1"
                                    x-text="selectedEvent?.description || 'Tidak ada deskripsi tambahan.'"></p>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button @click="closeModal()"
                                class="w-full py-4 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-2xl transition-colors">
                                Tutup Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>


    <script>
        function calendarApp(eventsData) {
            return {
                month: '',
                year: '',
                noOfDays: [],
                blankDays: [],
                events: eventsData,
                categoryFilter: 'all',
                categoryColors: {
                    akademik: 'bg-sky-600 text-white',
                    kegiatan: 'bg-amber-500 text-white',
                    libur: 'bg-emerald-500 text-white',
                    ujian: 'bg-rose-500 text-white'
                },
                selectedEvent: null,
                showModal: false,

                initCalendar() {
                    let today = new Date();
                    this.month = today.getMonth();
                    this.year = today.getFullYear();
                    this.getNoOfDays();
                },

                getNoOfDays() {
                    let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
                    let dayOfWeek = new Date(this.year, this.month).getDay();

                    let blankdaysArray = [];
                    for (var i = 1; i <= dayOfWeek; i++) {
                        blankdaysArray.push(i);
                    }

                    let daysArray = [];
                    for (var i = 1; i <= daysInMonth; i++) {
                        daysArray.push(i);
                    }

                    this.blankDays = blankdaysArray;
                    this.noOfDays = daysArray;
                },

                nextMonth() {
                    if (this.month == 11) {
                        this.month = 0;
                        this.year++;
                    } else {
                        this.month++;
                    }
                    this.getNoOfDays();
                },

                prevMonth() {
                    if (this.month == 0) {
                        this.month = 11;
                        this.year--;
                    } else {
                        this.month--;
                    }
                    this.getNoOfDays();
                },

                isToday(date) {
                    const today = new Date();
                    const d = new Date(this.year, this.month, date);
                    return today.toDateString() === d.toDateString();
                },

                getEventsForDay(date) {
                    const currentDay = new Date(this.year, this.month, date);
                    return this.events.filter(event => {
                        const start = new Date(event.start_date);
                        const end = event.end_date ? new Date(event.end_date) : start;

                        // Reset time for comparison
                        start.setHours(0, 0, 0, 0);
                        end.setHours(23, 59, 59, 999);

                        const matchesCategory = this.categoryFilter === 'all' || event.category === this
                            .categoryFilter;
                        return currentDay >= start && currentDay <= end && matchesCategory;
                    }).slice(0, 3);
                },

                get upcomingEvents() {
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);
                    return this.events
                        .filter(e => new Date(e.start_date) >= today)
                        .sort((a, b) => new Date(a.start_date) - new Date(b.start_date))
                        .slice(0, 5);
                },

                formatMonthTitle() {
                    return new Intl.DateTimeFormat('id-ID', {
                        month: 'long',
                        year: 'numeric'
                    }).format(new Date(this.year, this.month));
                },

                getDay(dateString) {
                    return new Date(dateString).getDate();
                },

                getMonthLabel(dateString) {
                    return new Intl.DateTimeFormat('id-ID', {
                        month: 'short'
                    }).format(new Date(dateString));
                },

                getCategoryClass(cat) {
                    return this.categoryColors[cat] || 'bg-slate-200';
                },

                openEvent(event) {
                    this.selectedEvent = event;
                    this.showModal = true;
                    document.body.style.overflow = 'hidden'; // Kunci scroll
                },

                closeModal() {
                    this.showModal = false;
                    document.body.style.overflow = ''; // Lepas scroll
                    setTimeout(() => {
                        this.selectedEvent = null;
                    }, 300);
                },

                // Helper untuk format tanggal di modal
                formatFullDate(dateString) {
                    return new Intl.DateTimeFormat('id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    }).format(new Date(dateString));
                }
            }
        }
    </script>
</x-app>
