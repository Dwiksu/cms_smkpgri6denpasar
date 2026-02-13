<x-header>
    <x-slot:metaTitle>{{ $metaTitle ?? '' }}</x-slot:metaTitle>
    <x-slot:metaDesc>{{ $metaDesc ?? '' }}</x-slot:metaDesc>
    {{ $title ?? '' }}
</x-header>

<x-navbar></x-navbar>

<main class="flex-1 bg-gray-50 min-h-screen">
    {{ $slot }}
</main>

<footer class="bg-gray-800 antialiased pt-32 relative overlay-top">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">

        <div class="border-b border-gray-700 pb-14">
            <div class="grid gap-10 lg:grid-cols-2">
                
                <div class="space-y-10">

                    <!-- INFO SEKOLAH -->
                    <div>
                        <!-- NAMA SEKOLAH (FOCUS) -->
                        <h4 class="text-3xl font-bold text-white leading-tight">
                            {{ $info->short_name }}
                        </h4>

                        <p class="mt-3 text-sm text-gray-400 leading-relaxed max-w-xl">
                            Sekolah Menengah Kejuruan yang berkomitmen mencetak lulusan
                            berkarakter, kompeten, dan siap bersaing di dunia kerja.
                        </p>

                        <ul class="mt-4 space-y-2 text-sm text-gray-400">
                            <li class="flex items-center gap-2">
                                @svg('lucide-map-pin', 'w-4 h-4 text-sky-600')
                                <span>{{ $info->address }}</span>
                            </li>
                            <li class="flex items-center gap-2">
                                @svg('lucide-phone', 'w-4 h-4 text-sky-600')
                                <span>{{ $info->phone ?? '-' }}</span>
                            </li>
                            <li class="flex items-center gap-2">
                                @svg('lucide-mail', 'w-4 h-4 text-sky-600')
                                <span>{{ $info->email ?? '-' }}</span>
                            </li>
                        </ul>

                        {{-- <a href="{{ route('public.tentang.kontak') }}">
                            <button
                                class="mt-5 inline-flex items-center gap-2 rounded-md
                   bg-sky-600 px-5 py-2.5 text-sm font-medium text-white
                   hover:bg-sky-700 transition focus:outline-none focus:ring-2
                   focus:ring-sky-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                                @svg('lucide-mail', 'h-4 w-4')
                                Kontak Kami
                            </button>
                        </a> --}}
                    </div>


                    <div class="grid gap-8 sm:grid-cols-2">

                        <!-- JURUSAN -->
                        <div>
                            <h6 class="mb-3 text-sm font-semibold uppercase tracking-wider text-white">
                                Jurusan
                            </h6>

                            <ul class="space-y-2 text-sm">
                                @forelse ($majors as $major)
                                    <li>
                                        <a href="{{ route('public.jurusan.show', $major->slug) }}"
                                            class="text-gray-400 hover:text-white transition">
                                            {{ $major->name }}
                                        </a>
                                    </li>
                                @empty
                                    <li class="text-gray-500">Jurusan belum tersedia</li>
                                @endforelse
                            </ul>
                        </div>

                        <!-- SOSIAL MEDIA -->
                        <div>
                            <h6 class="mb-3 text-sm font-semibold uppercase tracking-wider text-white">
                                Ikuti Kami
                            </h6>

                            <div class="flex gap-4">
                                <a href="{{ $info->instagram ?? '#' }}"
                                    class="flex h-11 w-11 items-center justify-center rounded-full
           bg-white/10 text-gray-300
           hover:bg-sky-600 hover:text-white
           transition hover:scale-110"
                                    aria-label="Instagram">
                                    @svg('lucide-instagram', 'h-5 w-5')
                                </a>
                                <a href="{{ $info->facebook ?? '#' }}"
                                    class="flex h-11 w-11 items-center justify-center rounded-full
           bg-white/10 text-gray-300
           hover:bg-sky-600 hover:text-white
           transition hover:scale-110"
                                    aria-label="Facebook">
                                    @svg('lucide-facebook', 'h-5 w-5')
                                </a>
                                <a href="{{ $info->youtube ?? '#' }}"
                                    class="flex h-11 w-11 items-center justify-center rounded-full
           bg-white/10 text-gray-300
           hover:bg-sky-600 hover:text-white
           transition hover:scale-110"
                                    aria-label="YouTube">
                                    @svg('lucide-youtube', 'h-5 w-5')
                                </a>
                            </div>

                            <p class="mt-3 text-xs text-gray-400">
                                Ikuti kami untuk info & kegiatan terbaru
                            </p>
                        </div>

                    </div>
                </div>

                <!-- ================= KANAN ================= -->
                <div class="rounded-xl bg-gray-50 p-3 shadow-md h-fit">
                    <p class="mb-2 text-sm font-semibold text-primary-700">
                        Lokasi Kami
                    </p>

                    <iframe class="w-full h-75 rounded-lg"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.155001235972!2d115.21844697592086!3d-8.67680598834165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd240eeec312863%3A0x7cffa04e5587c843!2sSMK%20PGRI%206%20Denpasar!5e0!3m2!1sen!2sid!4v1770903262851!5m2!1sen!2sid"
                        loading="lazy">
                    </iframe>
                </div>


            </div>
        </div>

        <!-- COPYRIGHT -->
        <div class="py-6 text-center">
            <p class="text-sm text-gray-400">
                © 2026 <span class="font-medium text-white">{{ $info->short_name }}</span>.
                All rights reserved.
            </p>
        </div>

    </div>
</footer>


<x-footer></x-footer>
