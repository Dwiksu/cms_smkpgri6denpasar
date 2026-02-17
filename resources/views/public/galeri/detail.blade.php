<x-app>
    <x-slot:title>{{ $album->title }}</x-slot:title>


    <div class="min-h-screen" x-data="{
        selectedIndex: null,
        photos: {{ json_encode($album->photos) }},
        next() { if (this.selectedIndex < this.photos.length - 1) this.selectedIndex++ },
        prev() { if (this.selectedIndex > 0) this.selectedIndex-- },
        close() { this.selectedIndex = null }
    }" x-init="$watch('selectedIndex', value => {
        if (value !== null) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    })" @keydown.escape.window="close()"
        @keydown.arrow-right.window="next()" @keydown.arrow-left.window="prev()">

        <section id="hero" class="bg-white aspect-5/1 w-full relative flex overflow-hidden">
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
                            <div class="aspect-square cursor-pointer group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-500"
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
                class="fixed inset-0 z-[999] flex items-center justify-center bg-black/95 transition-opacity duration-300"
                x-cloak>
                {{-- Area Klik untuk Menutup (Overlay) --}}
                <div class="absolute inset-0 z-0" @click="close()"></div>

                {{-- Tombol Close --}}
                <button @click="close()"
                    class="absolute top-5 right-5 z-[1001] text-white/70 hover:text-white p-2 transition-colors">
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                {{-- Navigasi - Gunakan .stop untuk mencegah event bubbling --}}
                <div
                    class="absolute inset-x-0 top-1/2 -translate-y-1/2 flex justify-between px-4 md:px-10 z-[1001] pointer-events-none">
                    <button x-show="selectedIndex > 0" @click.stop="prev()"
                        class="pointer-events-auto p-4 text-white/50 hover:text-white bg-black/20 hover:bg-black/40 rounded-full transition-all">
                        <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <div x-show="selectedIndex === 0"></div> {{-- Spacer --}}

                    <button x-show="selectedIndex < photos.length - 1" @click.stop="next()"
                        class="pointer-events-auto p-4 text-white/50 hover:text-white bg-black/20 hover:bg-black/40 rounded-full transition-all">
                        <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                {{-- Kontainer Foto --}}
                <div
                    class="relative z-[1000] max-w-5xl w-full h-full flex flex-col items-center justify-center gap-6 p-4 pointer-events-none">
                    <img :src="photos[selectedIndex]?.url" :alt="photos[selectedIndex]?.caption"
                        class="max-w-full max-h-[75vh] object-contain rounded-lg shadow-2xl pointer-events-auto"
                        x-show="selectedIndex !== null" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="scale-95 opacity-0" x-transition:enter-end="scale-100 opacity-100">

                    {{-- Caption --}}
                    <div
                        class="pointer-events-auto w-full max-w-2xl bg-white/10 backdrop-blur-md p-5 rounded-2xl text-center border border-white/10">
                        <p class="text-white text-lg font-medium"
                            x-text="photos[selectedIndex]?.caption || 'Tanpa keterangan'"></p>
                        <div class="flex items-center justify-center gap-3 mt-2">
                            <span class="px-3 py-1 bg-white/20 rounded-full text-white text-xs">
                                <span x-text="selectedIndex + 1"></span> / <span x-text="photos.length"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</x-app>
