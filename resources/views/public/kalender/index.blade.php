<x-app>
    <x-slot:title>Kalender</x-slot:title>

    <div class="min-h-screen" x-data="calendarApp({{ $events->toJson() }})" x-init="initCalendar()">

        <section id="hero"
            class="bg-white aspect-auto min-h-[250px] md:min-h-0 md:aspect-5/1 w-full relative flex overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                style="background-image: url('assets/guru.jpeg');">
                <div class="absolute inset-0 bg-linear-to-r from-sky-600/90 to-sky-600/70"></div>
            </div>
            <div class="py-10 px-4 max-w-screen-xl mx-auto w-full lg:py-16 lg:px-8 relative z-10 flex items-end">
                <div>
                    <h1
                        class="mb-2 md:mb-4 text-3xl font-bold tracking-tight text-white sm:text-4xl md:text-5xl lg:text-6xl">
                        Kalender Akademik</h1>
                    <p class="text-sm font-normal text-white sm:text-lg lg:text-xl">
                        Lihat jadwal kegiatan, ujian, dan agenda penting sekolah.</p>
                </div>
            </div>
        </section>

        <section class="py-8 md:py-12 bg-slate-50">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
                <div class="grid lg:grid-cols-3 gap-6 md:gap-8">

                    <div class="lg:col-span-2">
                        <div
                            class="bg-white rounded-2xl md:rounded-3xl shadow-xl border border-slate-100 overflow-hidden">

                            <div
                                class="p-4 md:p-6 border-b border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                                <h2 class="text-lg md:text-xl font-bold text-slate-800" x-text="formatMonthTitle()">
                                </h2>

                                <div class="flex flex-wrap items-center justify-center gap-2 md:gap-3 w-full sm:w-auto">
                                    <select x-model="categoryFilter"
                                        class="rounded-xl border-slate-200 text-xs md:text-sm focus:ring-sky-500 py-2">
                                        <option value="all">Semua Kategori</option>
                                        <option value="akademik">Akademik</option>
                                        <option value="kegiatan">Kegiatan</option>
                                        <option value="libur">Libur</option>
                                        <option value="ujian">Ujian</option>
                                    </select>

                                    <div class="flex gap-1">
                                        <button @click="prevMonth()"
                                            class="p-2 md:p-2.5 hover:bg-slate-100 rounded-xl border border-slate-200 transition-colors">
                                            <svg class="w-4 h-4 md:w-5 md:h-5 text-slate-600" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                        <button @click="nextMonth()"
                                            class="p-2 md:p-2.5 hover:bg-slate-100 rounded-xl border border-slate-200 transition-colors">
                                            <svg class="w-4 h-4 md:w-5 md:h-5 text-slate-600" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 md:p-6">
                                <div class="grid grid-cols-7 gap-px mb-1 md:mb-2 text-center">
                                    <template x-for="day in ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab']">
                                        <div class="text-[10px] md:text-sm font-bold text-slate-400 py-1 md:py-2"
                                            x-text="day"></div>
                                    </template>
                                </div>

                                <div class="grid grid-cols-7 gap-1 md:gap-2">
                                    <template x-for="blank in blankDays">
                                        <div class="aspect-square"></div>
                                    </template>

                                    <template x-for="date in noOfDays">
                                        <div class="aspect-square p-1 md:p-2 border rounded-xl md:rounded-2xl transition-all relative group flex flex-col"
                                            :class="[
                                                isToday(date) ? 'border-sky-600 bg-sky-50/50 ring-1 ring-sky-600' : 'border-slate-100 hover:bg-slate-50 hover:border-slate-200',
                                                getEventsForDay(date).length > 0 ? 'cursor-pointer' : ''
                                            ]"
                                            @click="getEventsForDay(date).length > 0 ? openDayEvents(date) : null">

                                            <div class="flex flex-col h-full pointer-events-none md:pointer-events-auto">
                                                
                                                <span class="text-xs md:text-sm font-semibold text-center md:text-left leading-none md:leading-normal mt-0.5 md:mt-0"
                                                    :class="isToday(date) ? 'text-sky-600' : 'text-slate-700'"
                                                    x-text="date"></span>

                                                <div class="mt-1 flex-1 overflow-hidden flex flex-row items-center justify-center md:flex-col md:items-stretch md:justify-start gap-1 md:gap-0 md:space-y-1 w-full">
                                                    
                                                    <template x-for="event in (getEventsForDay(date).length > 2 ? getEventsForDay(date).slice(0, 1) : getEventsForDay(date))">
                                                        <div @click.stop="openDayEvents(date, event)" class="cursor-pointer group/event shrink-0">

                                                            <div :class="getCategoryClass(event.category)"
                                                                class="md:hidden w-2 h-2 rounded-full shadow-sm">
                                                            </div>

                                                            <div :class="getCategoryClass(event.category)"
                                                                class="hidden md:block text-[9px] lg:text-[10px] px-1.5 py-0.5 rounded-md truncate shadow-sm group-hover/event:opacity-80 transition-opacity"
                                                                :title="event.title">
                                                                <span x-text="event.title.charAt(0).toUpperCase() + event.title.slice(1)"></span>
                                                            </div>

                                                        </div>
                                                    </template>

                                                    <template x-if="getEventsForDay(date).length > 2">
                                                        <div @click.stop="openDayEvents(date)" 
                                                            class="shrink-0 flex items-center justify-center bg-slate-200 text-slate-700 rounded-full md:rounded-md px-1.5 py-1 cursor-pointer shadow-sm">
                                                            <span class="text-[9px] md:text-xs font-bold leading-none">
                                                                +<span x-text="getEventsForDay(date).length - 1"></span>
                                                            </span>
                                                        </div>
                                                    </template>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>

                                <div
                                    class="flex flex-wrap justify-center md:justify-start gap-3 md:gap-4 mt-4 md:mt-8 pt-4 md:pt-6 border-t border-slate-100">
                                    <div
                                        class="flex items-center gap-1.5 text-[10px] md:text-xs font-medium text-slate-500">
                                        <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-sky-600"></div> Akademik
                                    </div>
                                    <div
                                        class="flex items-center gap-1.5 text-[10px] md:text-xs font-medium text-slate-500">
                                        <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-amber-500"></div> Kegiatan
                                    </div>
                                    <div
                                        class="flex items-center gap-1.5 text-[10px] md:text-xs font-medium text-slate-500">
                                        <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-emerald-500"></div> Libur
                                    </div>
                                    <div
                                        class="flex items-center gap-1.5 text-[10px] md:text-xs font-medium text-slate-500">
                                        <div class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-rose-500"></div> Ujian
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div
                            class="bg-white rounded-2xl md:rounded-3xl p-5 md:p-6 shadow-xl border border-slate-100 lg:sticky lg:top-24">
                            <h3 class="text-lg md:text-xl font-bold text-slate-800 mb-5 md:mb-6">Agenda Mendatang</h3>

                            <div class="space-y-4 md:space-y-6">
                                <template x-for="event in upcomingEvents" :key="event.id">
                                    <div @click="openSingleEvent(event)"
                                        class="flex gap-3 md:gap-4 group cursor-pointer">
                                        <div
                                            class="flex-shrink-0 w-12 md:w-14 text-center bg-slate-50 rounded-xl md:rounded-2xl p-2 group-hover:bg-sky-50 transition-colors border border-slate-100 flex flex-col justify-center">
                                            <p class="text-xl md:text-2xl font-bold text-sky-600"
                                                x-text="getDay(event.start_date)"></p>
                                            <p class="text-[9px] md:text-[10px] text-slate-500 uppercase font-bold"
                                                x-text="getMonthLabel(event.start_date)"></p>
                                        </div>
                                        <div class="flex-1">
                                            <span :class="getCategoryClass(event.category)"
                                                class="text-[9px] md:text-[10px] uppercase font-bold px-2 py-0.5 rounded-full mb-1 inline-block">
                                                <span x-text="event.category"></span>
                                            </span>
                                            <h4 class="font-bold text-slate-800 text-sm line-clamp-1 capitalize group-hover:text-sky-600 transition-colors"
                                                x-text="event.title"></h4>
                                            <p class="text-[11px] md:text-xs text-slate-500 mt-1 line-clamp-2"
                                                x-text="event.description"></p>
                                        </div>
                                    </div>
                                </template>

                                <template x-if="upcomingEvents.length === 0">
                                    <div class="text-center py-8">
                                        <p class="text-slate-500 text-sm">Belum ada agenda terdekat.</p>
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

                {{-- Overlay Background --}}
                <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" @click="closeModal()"
                    class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>

                {{-- Kotak Modal (Dengan event deteksi SWIPE jari) --}}
                <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                    x-transition:leave-end="opacity-0 scale-95 translate-y-4"
                    class="relative bg-white w-full max-w-lg rounded-2xl md:rounded-3xl shadow-2xl overflow-hidden z-10"
                    @touchstart="startSwipe" @touchmove="moveSwipe" @touchend="endSwipe">

                    <template x-if="selectedEvents.length > 0">
                        <div>
                            <div :class="getCategoryClass(selectedEvents[activeEventIndex]?.category)"
                                class="p-5 md:p-6 text-white relative transition-colors duration-300">
                                <button @click="closeModal()"
                                    class="absolute top-3 right-3 md:top-4 md:right-4 p-2 hover:bg-white/20 rounded-full transition-colors z-20">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                <span class="text-[10px] md:text-xs font-bold uppercase tracking-widest opacity-80"
                                    x-text="selectedEvents[activeEventIndex]?.category"></span>
                                <h3 class="text-xl md:text-2xl font-bold mt-1 pr-8 leading-tight"
                                    x-text="selectedEvents[activeEventIndex]?.title.charAt(0).toUpperCase() + selectedEvents[activeEventIndex]?.title.slice(1)">
                                </h3>
                            </div>

                            <div class="p-5 md:p-8 space-y-5 md:space-y-6">
                                <div class="flex items-start gap-3 md:gap-4">
                                    <div
                                        class="p-2.5 md:p-3 bg-slate-100 rounded-xl md:rounded-2xl text-slate-500 shrink-0">
                                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs md:text-sm font-bold text-slate-800">Waktu Pelaksanaan</p>
                                        <p class="text-sm md:text-base text-slate-600 mt-0.5"
                                            x-text="selectedEvents[activeEventIndex] ? formatFullDate(selectedEvents[activeEventIndex].start_date) : ''">
                                        </p>
                                        <template
                                            x-if="selectedEvents[activeEventIndex]?.end_date && selectedEvents[activeEventIndex]?.end_date !== selectedEvents[activeEventIndex]?.start_date">
                                            <p class="text-sm md:text-base text-slate-600">
                                                s/d <span
                                                    x-text="formatFullDate(selectedEvents[activeEventIndex].end_date)"></span>
                                            </p>
                                        </template>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 md:gap-4">
                                    <div
                                        class="p-2.5 md:p-3 bg-slate-100 rounded-xl md:rounded-2xl text-slate-500 shrink-0">
                                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h7" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs md:text-sm font-bold text-slate-800">Detail Agenda</p>
                                        <p class="text-sm md:text-base text-slate-600 leading-relaxed mt-1"
                                            x-text="selectedEvents[activeEventIndex]?.description || 'Tidak ada deskripsi tambahan.'">
                                        </p>
                                    </div>
                                </div>

                                <template x-if="selectedEvents.length > 1">
                                    <div class="flex items-center justify-between pt-5 mt-3 border-t border-slate-100">
                                        <button @click="prevEvent()" :disabled="activeEventIndex === 0"
                                            :class="activeEventIndex === 0 ? 'opacity-30 cursor-not-allowed' :
                                                'hover:bg-slate-200'"
                                            class="p-2.5 bg-slate-100 text-slate-600 rounded-full transition-colors">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>

                                        <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">
                                            Agenda <span class="text-sky-600 text-sm"
                                                x-text="activeEventIndex + 1"></span> dari <span
                                                x-text="selectedEvents.length"></span>
                                        </div>

                                        <button @click="nextEvent()"
                                            :disabled="activeEventIndex === selectedEvents.length - 1"
                                            :class="activeEventIndex === selectedEvents.length - 1 ?
                                                'opacity-30 cursor-not-allowed' : 'hover:bg-slate-200'"
                                            class="p-2.5 bg-slate-100 text-slate-600 rounded-full transition-colors">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    </div>
                                </template>

                                <template x-if="selectedEvents.length <= 1">
                                    <div class="pt-2 md:pt-4">
                                        <button @click="closeModal()"
                                            class="w-full py-3 md:py-4 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm md:text-base font-bold rounded-xl md:rounded-2xl transition-colors">
                                            Tutup Detail
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
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

                selectedEvents: [],
                activeEventIndex: 0,
                showModal: false,

                startX: 0,
                swipeX: 0,
                isSwiping: false,

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
                        start.setHours(0, 0, 0, 0);
                        end.setHours(23, 59, 59, 999);
                        const matchesCategory = this.categoryFilter === 'all' || event.category === this
                            .categoryFilter;
                        return currentDay >= start && currentDay <= end && matchesCategory;
                    });
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
                        })
                        .format(new Date(this.year, this.month));
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

                openDayEvents(date, specificEvent = null) {
                    const evts = this.getEventsForDay(date);
                    if (evts.length > 0) {
                        this.selectedEvents = evts;

                        this.activeEventIndex = specificEvent ? evts.findIndex(e => e.id === specificEvent.id) : 0;
                        if (this.activeEventIndex === -1) this.activeEventIndex = 0;
                        this.showModal = true;
                        document.body.style.overflow = 'hidden';
                    }
                },

                openSingleEvent(event) {
                    this.selectedEvents = [event];
                    this.activeEventIndex = 0;
                    this.showModal = true;
                    document.body.style.overflow = 'hidden';
                },

                closeModal() {
                    this.showModal = false;
                    document.body.style.overflow = '';
                    setTimeout(() => {
                        this.selectedEvents = [];
                        this.activeEventIndex = 0;
                    }, 300);
                },

                nextEvent() {
                    if (this.activeEventIndex < this.selectedEvents.length - 1) this.activeEventIndex++;
                },
                prevEvent() {
                    if (this.activeEventIndex > 0) this.activeEventIndex--;
                },

                startSwipe(e) {
                    if (this.selectedEvents.length <= 1) return;
                    this.startX = e.touches[0].clientX;
                    this.isSwiping = true;
                },
                moveSwipe(e) {
                    if (!this.isSwiping) return;
                    this.swipeX = e.touches[0].clientX - this.startX;
                },
                endSwipe() {
                    if (!this.isSwiping) return;
                    this.isSwiping = false;
                    if (this.swipeX < -50) this.nextEvent();
                    if (this.swipeX > 50) this.prevEvent();
                    this.swipeX = 0;
                },

                formatFullDate(dateString) {
                    return new Intl.DateTimeFormat('id-ID', {
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric'
                        })
                        .format(new Date(dateString));
                }
            }
        }
    </script>
</x-app>
