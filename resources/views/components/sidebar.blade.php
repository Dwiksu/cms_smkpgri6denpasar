<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
    class="text-heading bg-transparent box-border border border-transparent hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-base ms-3 mt-3 text-sm p-2 focus:outline-none inline-flex sm:hidden">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
        viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h10" />
    </svg>
</button>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div
        class="h-full px-3 py-4 overflow-y-auto flex flex-col
            bg-linear-to-b
            from-sky-700
            to-sky-600 border-e border-cyan/30">
        <a href="https://flowbite.com/" class="flex items-center px-5 py-3">
            <img src="{{ asset('assets/logo_smk_pgri_6.png') }}" class="h-8 me-2" alt="SMK PGRI 6 DPS LOGO" />
            <span class="self-center text-xl text-neutral-tertiary font-bold whitespace-nowrap">Admin Panel</span>
        </a>
        <ul class="space-y-2 font-medium border-t border-cyan/40 pt-4 mt-4">
            <li>
                <a href="{{ route('dashboard.admin') }}"
                    class="flex items-center px-2 py-1.5 rounded-base {{ isActiveSidebar('dashboard.admin') }}">
                    <svg class="w-5 h-5 transition duration-75 group-hover:text-cyan-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('beranda.admin') }}"
                    class="flex items-center px-2 py-1.5 rounded-base {{ isActiveSidebar('beranda.admin') }}">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-cyan-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Konten Beranda</span>
                </a>
            </li>
            <li>
                <a href="{{ route('berita.admin') }}"
                    class="flex items-center px-2 py-1.5 rounded-base {{ isActiveSidebar('berita.admin') }}">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-cyan-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7h1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Berita</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kategori-berita.admin') }}"
                    class="flex items-center px-2 py-1.5 rounded-base {{ isActiveSidebar('kategori-berita.admin') }}">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-cyan-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Kategori Berita</span>
                </a>
            </li>
            <li>
                <a href="{{ route('jurusan.admin') }}"
                    class="flex items-center px-2 py-1.5 rounded-base {{ isActiveSidebar('jurusan.admin') }}">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-cyan-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M3.78552 9.5 12.7855 14l9-4.5-9-4.5-8.99998 4.5Zm0 0V17m3-6v6.2222c0 .3483 2 1.7778 5.99998 1.7778 4 0 6-1.3738 6-1.7778V11" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Jurusan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profil.admin') }}"
                    class="flex items-center px-2 py-1.5 rounded-base {{ isActiveSidebar('profil.admin') }}">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-cyan-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Profil Guru</span>
                </a>
            </li>
            <li>
                <a href="{{ route('galeri.admin') }}"
                    class="flex items-center px-2 py-1.5 rounded-base {{ isActiveSidebar('galeri.admin') }}">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-cyan-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m3 16 5-7 6 6.5m6.5 2.5L16 13l-4.286 6M14 10h.01M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Galeri</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kalender.admin') }}"
                    class="flex items-center px-2 py-1.5 rounded-base {{ isActiveSidebar('kalender.admin') }}">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-cyan-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Kalender</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pengaturan.admin') }}"
                    class="flex items-center px-2 py-1.5 rounded-base {{ isActiveSidebar('pengaturan.admin') }}">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-cyan-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Pengaturan</span>
                </a>
            </li>
        </ul>
        <ul class="mt-auto space-y-2 font-medium border-t border-white/30 pt-4 pb-2">
            <li>
                <a href="#" class="flex items-center px-2 py-1.5 rounded-base {{ isActiveSidebar('#') }}">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-cyan-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Lihat Website</span>
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center px-2 py-1.5 rounded-base text-neutral-tertiary hover:bg-gray-200 hover:text-cyan-600 transition">
                        <svg class="w-6 h-6 transition duration-75 group-hover:text-cyan-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                        </svg>
                        <span class="flex-1 ms-2 text-start whitespace-nowrap">Logout</span>
                    </button>
                </form>
            </li>

        </ul>
    </div>
</aside>
