<x-app>
    <x-slot:title>{{ $album->name }}</x-slot:title>

    <div class="min-h-screen" x-data="{
        selectedIndex: null,
        photos: {{ json_encode($album->photos) }},
    
        swipeX: 0, 
        isSwiping: false, 
        isAnimating: false, 
        startX: 0, 
        screenWidth: 0, 
    
        init() {
            this.screenWidth = window.innerWidth || document.documentElement.clientWidth;
            window.addEventListener('resize', () => {
                this.screenWidth = window.innerWidth || document.documentElement.clientWidth;
            });
        },
    
        close() {
            this.selectedIndex = null;
            this.swipeX = 0;
            this.isAnimating = false;
        },
    
        handleChange(direction) {
            if (this.isAnimating) return; 
    
            const nextIndex = direction === 'next' ? this.selectedIndex + 1 : this.selectedIndex - 1;
    
            if (nextIndex >= 0 && nextIndex < this.photos.length) {
                this.isAnimating = true;
    
                this.swipeX = direction === 'next' ? -this.screenWidth : this.screenWidth;
    
                setTimeout(() => {
                    this.selectedIndex = nextIndex; 
                    this.swipeX = direction === 'next' ? this.screenWidth : -this.screenWidth;

                    setTimeout(() => {
                        this.swipeX = 0;
                        setTimeout(() => { this.isAnimating = false; }, 300);
                    }, 50);
    
                }, 300); 
            } else {
                this.swipeX = 0;
            }
        },
        next() { this.handleChange('next'); },
        prev() { this.handleChange('prev'); },
    

        startSwipe(e) {
            if (this.isAnimating || this.selectedIndex === null) return;
            this.isSwiping = true;
            this.startX = e.type.includes('mouse') ? e.pageX : e.touches[0].clientX;
        },
        moveSwipe(e) {
            if (!this.isSwiping || this.isAnimating) return;
    
            const currentX = e.type.includes('mouse') ? e.pageX : e.touches[0].clientX;
            let diff = currentX - this.startX;

            const isFirst = this.selectedIndex === 0;
            const isLast = this.selectedIndex === this.photos.length - 1;
            if ((isFirst && diff > 0) || (isLast && diff < 0)) {
                diff = diff / (1 + Math.abs(diff) / this.screenWidth * 2);
            }
    
            this.swipeX = diff;
        },
        endSwipe() {
            if (!this.isSwiping) return;
            this.isSwiping = false;
            const threshold = 60;
    
            if (this.swipeX < -threshold && this.selectedIndex < this.photos.length - 1) {
                this.handleChange('next');
            } else if (this.swipeX > threshold && this.selectedIndex > 0) {
                this.handleChange('prev');
            } else {
                this.swipeX = 0;
            }
        }
    }" x-init="init();
    $watch('selectedIndex', value => {
        document.body.style.overflow = value !== null ? 'hidden' : '';
    })" @keydown.escape.window="close()"
        @keydown.arrow-right.window="next()" @keydown.arrow-left.window="prev()">

        <section id="hero"
            class="bg-white aspect-auto min-h-[300px] md:min-h-0 md:aspect-5/1 w-full relative flex overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                style="background-image: url('{{ asset($album->cover_image) }}');">
                <div class="absolute inset-0 bg-linear-to-r from-sky-600/90 to-sky-600/70"></div>
            </div>
            <div class="py-8 px-4 max-w-screen-xl mx-auto w-full lg:py-16 lg:px-8 relative z-10 flex items-end">
                <div>
                    <h1 class="mb-4 text-4xl font-bold tracking-tight text-white md:text-5xl lg:text-6xl">
                        {{ $album->name }}</h1>
                    @if ($album->description)
                        <p class="text-lg font-normal text-white lg:text-xl">
                            {{ $album->description }}</p>
                    @endif
                </div>
            </div>
        </section>

        <section class="py-12 bg-white">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
                <div class="flex items-center gap-2 mb-8 text-slate-500">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p>{{ count($album->photos) }} foto dalam album ini</p>
                </div>

                @if (count($album->photos) > 0)
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($album->photos as $index => $photo)
                            <div class="aspect-square cursor-pointer group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-500" data-aos="fade-up"
                                @click="selectedIndex = {{ $index }}">
                                <img src="{{ $photo['url'] }}" alt="{{ $photo['caption'] ?? 'Foto' }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-4">
                                    <p class="text-white text-sm font-medium line-clamp-2">
                                        {{ $photo['caption'] ?? 'Foto ' . ($index + 1) }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-20 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200">
                        <svg class="h-16 w-16 text-slate-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-slate-500 text-lg">Belum ada foto dalam album ini.</p>
                    </div>
                @endif
            </div>
        </section>

        <template x-teleport="body">
            <div x-show="selectedIndex !== null"
                class="fixed inset-0 z-[999] flex flex-col items-center justify-center bg-black/95 transition-opacity duration-300"
                x-cloak>

                {{-- Background Overlay --}}
                <div class="absolute inset-0 z-0"></div>

                {{-- Tombol Close (X) --}}
                <button @click="close()"
                    class="absolute top-4 right-4 md:top-5 md:right-5 z-[1001] bg-black/40 md:bg-transparent rounded-full text-white/80 hover:text-white p-2 transition-colors">
                    <svg class="w-7 h-7 md:w-10 md:h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                {{-- Navigasi Desktop --}}
                <div
                    class="hidden md:flex absolute inset-x-0 top-1/2 -translate-y-1/2 justify-between px-10 z-[1001] pointer-events-none">
                    <button x-show="selectedIndex > 0" @click.stop="prev()"
                        class="pointer-events-auto p-4 text-white/50 hover:text-white bg-black/20 hover:bg-black/40 rounded-full transition-all">
                        <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <div x-show="selectedIndex === 0"></div>
                    <button x-show="selectedIndex < photos.length - 1" @click.stop="next()"
                        class="pointer-events-auto p-4 text-white/50 hover:text-white bg-black/20 hover:bg-black/40 rounded-full transition-all">
                        <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                {{-- Area Geser & Foto --}}
                <div class="relative z-[1000] flex-grow w-full max-w-5xl flex items-center justify-center p-4 pt-16 pb-[100px] md:pb-4 pointer-events-auto cursor-grab active:cursor-grabbing overflow-hidden"
                    style="touch-action: pan-y;" @touchstart="startSwipe" @touchmove="moveSwipe" @touchend="endSwipe"
                    @mousedown="startSwipe" @mousemove="moveSwipe" @mouseup="endSwipe"
                    @mouseleave="if(isSwiping) endSwipe()">

                    {{-- Bungkus Transform: Bergerak mengikuti swipeX --}}
                    <div class="w-full h-full flex items-center justify-center will-change-transform"
                        :style="`transform: translateX(${swipeX}px); transition: ${isSwiping || (isAnimating && Math.abs(swipeX) === screenWidth) ? 'none' : 'transform 0.3s cubic-bezier(0.25, 1, 0.5, 1)'}`">

                        {{-- Gambar --}}
                        <img :src="photos[selectedIndex]?.url" :alt="photos[selectedIndex]?.caption"
                            class="max-w-full max-h-[70vh] md:max-h-[75vh] object-contain rounded-lg md:shadow-2xl pointer-events-none select-none"
                            x-show="selectedIndex !== null">
                    </div>
                </div>

                {{-- Kotak Caption (Fixed Bottom Mobile) --}}
                <div class="pointer-events-auto fixed bottom-0 inset-x-0 md:static w-full md:max-w-2xl bg-[#1a1a1a] md:bg-white/10 md:backdrop-blur-md p-4 pb-6 md:p-5 rounded-t-3xl md:rounded-2xl border-t md:border border-white/10 flex items-center shadow-[0_-15px_40px_rgba(0,0,0,0.6)] md:shadow-xl z-[1002] md:mb-6 transition-transform duration-300"
                    :class="isAnimating ? 'translate-y-[150%]' : 'translate-y-0'"> {{-- Sembunyikan caption saat animasi berjalan --}}

                    {{-- Tombol Prev Mobile --}}
                    <button x-show="selectedIndex > 0" @click.stop="prev()"
                        class="md:hidden flex-shrink-0 p-2 text-white/70 hover:text-white bg-white/10 active:bg-white/20 rounded-full transition-colors"
                        :disabled="isAnimating">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <div x-show="selectedIndex === 0" class="md:hidden w-10"></div>

                    {{-- Teks Keterangan --}}
                    <div class="flex-grow text-center px-2">
                        <p class="text-white text-sm md:text-lg font-medium line-clamp-2"
                            x-text="photos[selectedIndex]?.caption || 'Tanpa keterangan'"></p>
                        <div class="inline-block mt-1.5 md:mt-2">
                            <span
                                class="px-3 py-1 bg-white/20 rounded-full text-white text-[10px] md:text-xs tracking-widest font-semibold">
                                <span x-text="selectedIndex + 1"></span> / <span x-text="photos.length"></span>
                            </span>
                        </div>
                    </div>

                    {{-- Tombol Next Mobile --}}
                    <button x-show="selectedIndex < photos.length - 1" @click.stop="next()"
                        class="md:hidden flex-shrink-0 p-2 text-white/70 hover:text-white bg-white/10 active:bg-white/20 rounded-full transition-colors"
                        :disabled="isAnimating">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    <div x-show="selectedIndex === photos.length - 1" class="md:hidden w-10"></div>
                </div>
            </div>
        </template>
    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }

        .will-change-transform {
            will-change: transform;
        }
    </style>
</x-app>
