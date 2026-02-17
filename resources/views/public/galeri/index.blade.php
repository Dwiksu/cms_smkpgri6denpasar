<x-app>
    <x-slot:title>Galeri</x-slot:title>


        <section id="hero" class="bg-white aspect-5/1 w-full relative flex overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                style="background-image: url('assets/guru.jpeg');">
                <div class="absolute inset-0 bg-linear-to-r from-sky-600/90 to-sky-600/70"></div>
            </div>
            <div class="py-8 px-4 max-w-screen-xl mx-auto w-full lg:py-16 lg:px-8 relative z-10 flex items-end">
                <div>
                    <h1 class="mb-4 text-4xl font-bold tracking-tight text-white md:text-5xl lg:text-6xl">
                        Galeri Foto </h1>
                    <p class="text-lg font-normal text-white lg:text-xl">
                        Lihat berbagai momen dan kegiatan yang berlangsung di sekolah kami.</p>
                </div>
            </div>
        </section>

        {{-- Albums Grid --}}
        <section class="py-16 bg-white">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
                @if (count($albums) > 0)
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($albums as $album)
                            <a href="/galeri/{{ $album->slug }}"
                                class="group block bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300">

                                {{-- Image Wrapper --}}
                                <div class="aspect-[16/10] overflow-hidden relative bg-slate-200">
                                    <img src="{{ $album->cover_image ?? '/placeholder.svg' }}" alt="{{ $album->name }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                                    {{-- Photo Count Badge --}}
                                    <div class="absolute bottom-3 right-3">
                                        <span
                                            class="flex items-center gap-1.5 bg-slate-900/80 backdrop-blur text-white px-3 py-1.5 rounded-xl text-xs font-bold">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{ count($album->photos) }} Foto
                                        </span>
                                    </div>
                                </div>

                                {{-- Content --}}
                                <div class="p-6">
                                    <h3
                                        class="text-lg font-bold text-slate-900 group-hover:text-sky-600 transition-colors mb-2">
                                        {{ $album->name }}
                                    </h3>

                                    @if ($album->description)
                                        <p class="text-slate-600 text-sm line-clamp-2 leading-relaxed">
                                            {{ $album->description }}
                                        </p>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="py-20 text-center border-2 border-dashed border-slate-200 rounded-3xl">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 bg-slate-100 rounded-full mb-4 text-slate-400">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800">Belum ada album</h3>
                        <p class="text-slate-500">Silakan kembali lagi nanti.</p>
                    </div>
                @endif
            </div>
        </section>
</x-app>
