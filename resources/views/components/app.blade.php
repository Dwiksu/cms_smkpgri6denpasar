<x-header>
    <x-slot:metaTitle>{{ $metaTitle ?? '' }}</x-slot:metaTitle>
    <x-slot:metaDesc>{{ $metaDesc ?? '' }}</x-slot:metaDesc>
    {{ $title ?? '' }}
</x-header>

<x-navbar></x-navbar>

<div
    x-data="{ progress: 0, show: false }"
    x-init="
        const update = () => {
            const scrollTop = window.scrollY
            const docHeight = document.documentElement.scrollHeight - window.innerHeight
            progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0
            show = scrollTop > 300
        }
        update()
        window.addEventListener('scroll', update)
    "
    class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 z-50"
>
    <button
        x-show="show"
        x-transition
        @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="relative
               w-10 h-10 sm:w-14 sm:h-14
               rounded-full
               flex items-center justify-center
               bg-transparent text-sky-600
               shadow-lg"
        aria-label="Scroll to top"
    >
        <!-- progress ring -->
        <svg class="absolute inset-0 -rotate-90"
             viewBox="0 0 56 56"
             :width="$el.parentElement.offsetWidth"
             :height="$el.parentElement.offsetHeight">
            <circle cx="28" cy="28" r="25"
                    stroke="rgba(0, 132, 209,0.3)"
                    stroke-width="3"
                    fill="transparent"/>
            <circle cx="28" cy="28" r="25"
                    stroke="rgba(0, 132, 209,0.7)"
                    stroke-width="3"
                    fill="transparent"
                    stroke-dasharray="157"
                    :stroke-dashoffset="157 - (157 * progress / 100)"
                    stroke-linecap="round"/>
        </svg>

        <span class="text-sm sm:text-base">@svg('lucide-chevron-up', 'w-4 h-4 md:w-8 md:h-8')</span>
    </button>
</div>

<main class="flex-1 bg-white min-h-screen">
    {{ $slot }}
</main>

<footer class="bg-gray-800 antialiased pt-32 relative overlay-top" data-aos="fade-up">
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
                                <span> Office: {{ $info->office_phone ?? '-' }}</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <!-- ICON WHATSAPP -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                    class="w-4 h-4 text-sky-600 fill-current">
                                    <path
                                        d="M19.11 17.38c-.27-.14-1.6-.79-1.85-.88-.25-.09-.43-.14-.61.14-.18.27-.7.88-.86 1.06-.16.18-.32.2-.59.07-.27-.14-1.13-.42-2.15-1.35-.79-.71-1.33-1.59-1.49-1.86-.16-.27-.02-.41.12-.55.12-.12.27-.32.41-.48.14-.16.18-.27.27-.45.09-.18.05-.34-.02-.48-.07-.14-.61-1.47-.84-2.01-.22-.53-.45-.46-.61-.47-.16-.01-.34-.01-.52-.01-.18 0-.48.07-.73.34-.25.27-.96.94-.96 2.29s.98 2.65 1.12 2.84c.14.18 1.93 2.95 4.68 4.14.65.28 1.16.45 1.56.57.65.21 1.25.18 1.72.11.52-.08 1.6-.65 1.82-1.28.23-.63.23-1.17.16-1.28-.07-.11-.25-.18-.52-.32z" />
                                    <path
                                        d="M16.01 3C9.38 3 4 8.38 4 15.01c0 2.65.86 5.09 2.32 7.07L4 29l7.12-2.28c1.92 1.05 4.12 1.65 6.89 1.65 6.63 0 12.01-5.38 12.01-12.01S22.64 3 16.01 3zm0 21.75c-2.42 0-4.67-.73-6.54-1.98l-.47-.31-4.22 1.35 1.38-4.1-.33-.49c-1.29-1.9-1.98-4.12-1.98-6.21 0-6.36 5.18-11.54 11.54-11.54 6.36 0 11.54 5.18 11.54 11.54 0 6.36-5.18 11.54-11.54 11.54z" />
                                </svg>

                                <span>
                                    WhatsApp: {{ $info->whatsapp_phone ?? '-' }}
                                </span>
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
                                <!-- INSTAGRAM -->
                                <a href="{{ $info->instagram ?? '#' }}"
                                    class="flex h-11 w-11 items-center justify-center rounded-full
                   bg-white/10 text-gray-300
                   hover:bg-sky-600 hover:text-white
                   transition hover:scale-110"
                                    aria-label="Instagram">
                                    @svg('lucide-instagram', 'h-5 w-5')
                                </a>

                                <!-- FACEBOOK -->
                                <a href="{{ $info->facebook ?? '#' }}"
                                    class="flex h-11 w-11 items-center justify-center rounded-full
                   bg-white/10 text-gray-300
                   hover:bg-sky-600 hover:text-white
                   transition hover:scale-110"
                                    aria-label="Facebook">
                                    @svg('lucide-facebook', 'h-5 w-5')
                                </a>

                                <!-- YOUTUBE -->
                                <a href="{{ $info->youtube ?? '#' }}"
                                    class="flex h-11 w-11 items-center justify-center rounded-full
                   bg-white/10 text-gray-300
                   hover:bg-sky-600 hover:text-white
                   transition hover:scale-110"
                                    aria-label="YouTube">
                                    @svg('lucide-youtube', 'h-5 w-5')
                                </a>

                                <!-- TIKTOK -->
                                <a href="{{ $info->tiktok ?? '#' }}"
                                    class="flex h-11 w-11 items-center justify-center rounded-full
                   bg-white/10 text-gray-300
                   hover:bg-sky-600 hover:text-white
                   transition hover:scale-110"
                                    aria-label="TikTok">
                                    <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.5 1c.9 2.6 2.9 4.6 5.5 5.5v3.3c-2.1 0-4.1-.7-5.5-1.9V15a6 6 0 1 1-6-6c.4 0 .8 0 1.2.1v3.4a2.7 2.7 0 1 0 1.8 2.5V1h3z" />
                                    </svg>
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
