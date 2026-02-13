<nav class="bg-transparent backdrop-blur-sm sticky w-full z-20 top-0 start-0 shadow-sm" id="header">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('assets/logo_smk_pgri_6.png') }}" class="h-12" alt="Logo" />
            <div class="flex flex-col justify-center">
                <p class="text-sm md:text-md font-semibold whitespace-nowrap text-sky-600">SMK PGRI 6 DENPASAR</p>
                <p class="text-[0.45rem] md:text-[0.6rem] text-heading font-light whitespace-nowrap uppercase">Menjadi
                    yang tergacor</p>
            </div>
        </a>
        <div class="flex flex-wrap items-center justify-between gap-5">

            <div class="inline-flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button"
                    class="text-white bg-sky-600 hover:bg-sky-800 box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-full text-xs px-3 py-2 focus:outline-none">Info
                    Pendaftaran Siswa</button>
                <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-2 w-9 h-9 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary"
                    aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M5 7h14M5 12h14M5 17h14" />
                    </svg>
                </button>
            </div>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul
                    class="flex flex-col text-sm font-small p-4 md:p-0 mt-4 border border-default rounded-base md:space-x-4 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                    <li>
                        <a href="{{ route('public.home.index') }}"
                            class="block py-2 px-3 {{ isActiveNavbar('public.home.index') }}"
                            aria-current="page">Beranda</a>
                    </li>
                    <li class="relative" x-data="{ open: false }" @mouseenter="setTimeout(() => open = true, 100)"
                        @mouseleave="setTimeout(() => open = false, 100)">

                        <button
                            class="flex items-center justify-between w-full py-2 px-3 font-small md:w-auto
               text-body rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-sky-700 md:p-0 md:dark:hover:bg-transparent">
                            Tentang Kami
                            <svg class="w-4 h-4 ms-1.5 transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 9-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Dropdown -->
                        <div x-show="open" x-transition x-cloak class="pt-3 absolute left-0 z-20">
                            <div
                                class="w-55 bg-neutral-primary-medium border border-default-medium
                   rounded-base shadow-lg">

                                <ul class="text-sm text-body font-small divide-y divide-default/60">
                                    <li class="flex items-center w-full px-4 py-3">
                                        <a href="{{ route('public.sambutan.index') }}"
                                            class="{{ isActiveNavbar('public.sambutan.index') }}">
                                            Sambutan Kepala Sekolah
                                        </a>
                                    </li>
                                    <li class="flex items-center w-full px-4 py-3">
                                        <a href="{{ route('public.sejarah.index') }}"
                                            class="{{ isActiveNavbar('public.sejarah.index') }}">
                                            Sejarah Kami
                                        </a>
                                    </li>
                                    <li class="flex items-center w-full px-4 py-3">
                                        <a href="{{ route('public.kontak.index') }}"
                                            class="{{ isActiveNavbar('public.kontak.index') }}">
                                            Kontak Kami
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('public.berita.index') }}"
                            class="block py-2 px-3 {{ isActiveNavbar('public.berita.index') }}">Berita & Pengumuman</a>
                    </li>
                    <li class="relative" x-data="{ open: false }" @mouseenter="setTimeout(() => open = true, 100)"
                        @mouseleave="setTimeout(() => open = false, 100)">

                        <button
                            class="flex items-center justify-between w-full py-2 px-3 font-small md:w-auto
               text-body rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-sky-700 md:p-0 md:dark:hover:bg-transparent">
                            Jurusan
                            <svg class="w-4 h-4 ms-1.5 transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 9-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Dropdown -->
                        <div x-show="open" x-transition x-cloak class="pt-3 absolute left-0 z-20">
                            <div
                                class="w-55
                   bg-neutral-primary-medium border border-default-medium
                   rounded-base shadow-lg">

                                <ul class="text-sm text-body font-small divide-y divide-default/60">
                                    @forelse ($majors as $major)
                                        <li class="flex items-center w-full px-4 py-3">
                                            <a href="{{ route('public.jurusan.show', $major->slug) }}"
                                                class="{{ isActiveNavbar('public.jurusan.show') }}">
                                                {{ $major->name }}
                                            </a>
                                        </li>
                                    @empty
                                        <p>Jurusan belum tersedia</p>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('public.galeri.index') }}"
                            class="block py-2 px-3 {{ isActiveNavbar('public.galeri.index') }}">Galeri</a>
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
    </div>
</nav>

<style>
    [x-cloak] {
        display: none;
    }
</style>

{{--
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const header = document.getElementById('header');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('bg-neutral-primary/70');
                header.classList.remove('bg-neutral-primary');
            } else {
                header.classList.add('bg-neutral-primary');
                header.classList.remove('bg-neutral-primary/70');
            }
        });
    })
</script> --}}
