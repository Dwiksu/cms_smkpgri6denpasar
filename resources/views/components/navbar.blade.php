<nav class="bg-transparent backdrop-blur-sm sticky w-full z-50 top-0 start-0 shadow-sm" id="header"
    x-data="{ mobileOpen: false }" x-init="$watch('mobileOpen', value => {
        if (value) {
            document.documentElement.style.overflow = 'hidden';
            document.body.style.overflow = 'hidden';
        } else {
            document.documentElement.style.overflow = '';
            document.body.style.overflow = '';
        }
    })">
    <div class="relative max-w-screen-xl flex flex-wrap items-center mx-auto p-4">

        {{-- Logo --}}
        <a href="{{ route('public.home.index') }}" class="flex items-center me-auto space-x-3 rtl:space-x-reverse z-50">
            <img src="{{ asset('assets/logo_smk_pgri_6.png') }}" class="h-12" alt="Logo" />
            <div class="flex flex-col justify-center">
                <p class="text-sm md:text-md font-semibold whitespace-nowrap text-sky-600">SMK PGRI 6
                    DENPASAR</p>
                <p class="text-[0.45rem] md:text-[0.6rem] text-heading font-light whitespace-nowrap uppercase">
                    {{ $tagline }}</p>
            </div>
        </a>

        <div class="flex items-center ml-8 gap-3 md:order-2 z-50">
            <a href="{{ $ppdb_link ?? '#' }}" class="hidden md:block">
                <button type="button"
                    class="text-white bg-sky-600 hover:bg-sky-800 border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-full text-xs px-3 py-2 focus:outline-none">
                    Info Pendaftaran Siswa
                </button>
            </a>

            {{-- Hamburger Button--}}
            <button @click="mobileOpen = !mobileOpen" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sky-600 md:hidden focus:outline-none transition-colors rounded-lg hover:bg-sky-50"
                :aria-expanded="mobileOpen.toString()">
                <span class="sr-only">Open main menu</span>
                <div class="relative w-5 h-4">
                    <span class="absolute block w-5 h-0.5 bg-current transform transition duration-300 ease-in-out"
                        :class="mobileOpen ? 'rotate-45 top-2' : 'top-0'"></span>
                    <span
                        class="absolute block w-5 h-0.5 bg-current transform transition duration-300 ease-in-out top-2"
                        :class="mobileOpen ? 'opacity-0' : 'opacity-100'"></span>
                    <span class="absolute block w-5 h-0.5 bg-current transform transition duration-300 ease-in-out"
                        :class="mobileOpen ? '-rotate-45 top-2' : 'top-4'"></span>
                </div>
            </button>
        </div>

        {{-- ===================== MOBILE MENU ===================== --}}
        <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full" x-cloak
            @resize.window="if (window.innerWidth >= 768) mobileOpen = false"
            class="absolute inset-0 w-full h-[100dvh] bg-white z-40 md:hidden">

            <div class="flex flex-col h-full">
                <div class="h-20 flex-shrink-0"></div>

                <div class="flex-1 overflow-y-auto px-6 py-4 pb-24">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-4 ml-2">Menu Sekolah</p>

                    <ul class="flex flex-col space-y-2 text-sm font-semibold">
                        {{-- Beranda --}}
                        <li>
                            <a href="{{ route('public.home.index') }}"
                                class="flex items-center px-4 py-3.5 rounded-2xl transition-all {{ isActiveHamburgerMenu('public.home.index') }}">
                                Beranda
                            </a>
                        </li>

                        <li x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full px-4 py-3.5 rounded-2xl transition-all {{ isActiveHamburgerMenu('public.tentang.*')}}">
                                <span>Tentang Kami</span>
                                <svg class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="overflow-hidden transition-[max-height] duration-300 ease-in-out"
                                x-ref="tentang"
                                :style="open ? 'max-height: ' + $refs.tentang.scrollHeight + 'px' : 'max-height: 0px'">
                                <div class="mt-1 ml-4 space-y-1 border-l-2 border-sky-100">
                                    <a href="{{ route('public.tentang.sambutan') }}"
                                        class="block px-6 py-3 text-gray-500 {{ isActiveHamburgerMenu('public.tentang.sambutan') }}">Sambutan
                                        Kepala Sekolah</a>
                                    <a href="{{ route('public.tentang.sejarah') }}"
                                        class="block px-6 py-3 text-gray-500 {{ isActiveHamburgerMenu('public.tentang.sejarah') }}">Sejarah
                                        Kami</a>
                                    <a href="{{ route('public.tentang.kontak') }}"
                                        class="block px-6 py-3 text-gray-500 {{ isActiveHamburgerMenu('public.tentang.kontak') }}">Kontak
                                        Kami</a>
                                </div>
                            </div>
                        </li>

                        <li>
                            <a href="{{ route('public.berita.index') }}"
                                class="block px-4 py-3.5 rounded-2xl {{ isActiveHamburgerMenu('public.berita.*')}}">Berita
                                & Pengumuman</a>
                        </li>

                        <li x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full px-4 py-3.5 rounded-2xl {{ isActiveHamburgerMenu('public.jurusan.show')}}">
                                <span>Jurusan</span>
                                <svg class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="overflow-hidden transition-[max-height] duration-300 ease-in-out"
                                x-ref="jurusan"
                                :style="open ? 'max-height: ' + $refs.jurusan.scrollHeight + 'px' : 'max-height: 0px'">
                                <div class="mt-1 ml-4 space-y-1 border-l-2 border-sky-100">
                                    @forelse ($majors as $major)
                                        <a href="{{ route('public.jurusan.show', $major->slug) }}"
                                            class="block px-6 py-3 text-gray-500 {{ isActiveHamburgerMenu('public.jurusan.show', ['major' => $major->slug])}}">
                                            {{ $major->name }}
                                        </a>
                                    @empty
                                        <p class="px-6 py-3 text-xs italic text-gray-400">Belum tersedia</p>
                                    @endforelse
                                </div>
                            </div>
                        </li>

                        <li><a href="{{ route('public.galeri.index') }}"
                                class="block px-4 py-3.5 rounded-2xl {{ isActiveHamburgerMenu('public.galeri.index') }}">Galeri</a></li>
                        <li><a href="{{ route('public.guru.index') }}"
                                class="block px-4 py-3.5 rounded-2xl {{ isActiveHamburgerMenu('public.guru.index') }}">Profil Guru</a></li>
                        <li><a href="{{ route('public.kalender.index') }}"
                                class="block px-4 py-3.5 rounded-2xl {{ isActiveHamburgerMenu('public.kalender.index') }}">Kalender</a></li>
                    </ul>

                    {{-- CTA di dalam menu mobile --}}
                    <div class="mt-6 border-t border-gray-100 pt-6">
                        <a href="{{ $ppdb_link ?? '#' }}" class="block">
                            <button type="button"
                                class="w-full text-white bg-sky-600 hover:bg-sky-800 border border-transparent focus:ring-4 focus:ring-brand-medium font-bold rounded-2xl text-sm px-4 py-4 shadow-md active:scale-[0.98] transition-all focus:outline-none">
                                Info Pendaftaran Siswa
                            </button>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>

        {{-- ===================== DESKTOP MENU ===================== --}}
        <div class="hidden md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-row text-sm font-small md:space-x-4 rtl:space-x-reverse">

                <li>
                    <a href="{{ route('public.home.index') }}"
                        class="block py-2 px-3 {{ isActiveNavbar('public.home.index') }}">Beranda</a>
                </li>

                <li class="relative" x-data="{ open: false }" @mouseenter="setTimeout(() => open = true, 100)"
                    @mouseleave="setTimeout(() => open = false, 100)">
                    <button
                        class="flex items-center justify-between w-full py-2 px-3 md:w-auto {{ isActiveNavbar('public.tentang.*') }}">
                        Tentang Kami
                        <svg class="w-4 h-4 ms-1.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition x-cloak class="pt-3 absolute left-0 z-20">
                        <div
                            class="w-55 bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg">
                            <ul class="text-sm text-body font-small divide-y divide-default/60">
                                <li class="flex items-center w-full px-4 py-3">
                                    <a href="{{ route('public.tentang.sambutan') }}"
                                        class="{{ isActiveNavbar('public.tentang.sambutan') }} w-full">Sambutan Kepala
                                        Sekolah</a>
                                </li>
                                <li class="flex items-center w-full px-4 py-3">
                                    <a href="{{ route('public.tentang.sejarah') }}"
                                        class="{{ isActiveNavbar('public.tentang.sejarah') }} w-full">Sejarah
                                        Kami</a>
                                </li>
                                <li class="flex items-center w-full px-4 py-3">
                                    <a href="{{ route('public.tentang.kontak') }}"
                                        class="{{ isActiveNavbar('public.tentang.kontak') }} w-full">Kontak Kami</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li>
                    <a href="{{ route('public.berita.index') }}"
                        class="block py-2 px-3 {{ isActiveNavbar('public.berita.*') }}">Berita & Pengumuman</a>
                </li>

                <li class="relative" x-data="{ open: false }" @mouseenter="setTimeout(() => open = true, 100)"
                    @mouseleave="setTimeout(() => open = false, 100)">
                    <button
                        class="flex items-center justify-between w-full py-2 px-3 md:w-auto {{ isActiveNavbar('public.jurusan.show') }}">
                        Jurusan
                        <svg class="w-4 h-4 ms-1.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition x-cloak class="pt-3 absolute left-0 z-20">
                        <div
                            class="w-55 bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg">
                            <ul class="text-sm text-body font-small divide-y divide-default/60">
                                @forelse ($majors as $major)
                                    <li class="flex items-center w-full px-4 py-3">
                                        <a href="{{ route('public.jurusan.show', $major->slug) }}"
                                            class="{{ isActiveNavbar('public.jurusan.show', ['major' => $major->slug]) }} w-full">
                                            {{ $major->name }}
                                        </a>
                                    </li>
                                @empty
                                    <li class="px-4 py-3 text-sm text-body">Jurusan
                                        belum tersedia</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </li>

                <li>
                    <a href="{{ route('public.galeri.index') }}"
                        class="block py-2 px-3 {{ isActiveNavbar('public.galeri.*') }}">Galeri</a>
                </li>

                <li>
                    <a href="{{ route('public.guru.index') }}"
                        class="block py-2 px-3 {{ isActiveNavbar('public.guru.index') }}">Profil Guru</a>
                </li>

                <li>
                    <a href="{{ route('public.kalender.index') }}"
                        class="block py-2 px-3 {{ isActiveNavbar('public.kalender.index') }}">Kalender</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>