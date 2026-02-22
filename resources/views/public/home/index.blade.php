<x-app>
    <x-slot:title>Beranda</x-slot:title>

    <section id="hero"
        class="relative flex items-center justify-center overflow-hidden overlay-bottom bg-white
        aspect-[3/4] sm:aspect-[4/3] lg:aspect-5/2">

        <div class="absolute inset-0 bg-cover bg-center"
            style="background-image: url({{ asset($hero->background_image) }});">
            <div class="absolute inset-0 bg-gradient-to-r from-sky-600/90 to-sky-600/70"></div>
        </div>

        <div class="relative z-10 px-4 py-10 max-w-screen-xl text-center">
            <h1 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold text-white mb-3">
                {{ $hero->tagline }}
            </h1>

            <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-4">
                {{ $hero->title }}
            </h2>

            <p class="text-base sm:text-lg lg:text-xl text-white mb-8 sm:px-12 xl:px-40">
                {{ $hero->subtitle }}
            </p>

            <div class="flex flex-col items-center sm:flex-row gap-4 justify-center">
                <a href="#tentang-kami"
                    class="w-fit py-3 px-7 rounded-full bg-amber-300 text-white font-medium hover:bg-transparent hover:text-amber-300 border border-amber-300 transition">
                    Lihat Selengkapnya
                </a>
                <a href="#jurusan"
                    class="w-fit py-3 px-7 rounded-full border border-white text-white hover:bg-white hover:text-gray-900 transition">
                    Lihat Jurusan
                </a>
            </div>
        </div>
    </section>

    {{-- ================= TENTANG ================= --}}
    <section id="tentang-kami" class="py-20 bg-white">
        <div class="max-w-screen-xl mx-auto px-4 flex flex-col-reverse md:grid md:grid-cols-2 gap-10 items-center" data-aos="fade-up">
            <div class="relative">
                <div class="absolute scale-105 inset-0 bg-sky-600/5 rounded-3xl -rotate-3"></div>
                <img src="{{ asset($about->image) }}" class="relative rounded-2xl shadow-xl aspect-4/3 object-cover">
            </div>

            <div>
                <h6 class="uppercase border-b-2 border-dashed w-fit mb-2">Tentang Kami</h6>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-sky-600 mb-4">
                    {{ $about->title }}
                </h2>
                <p class="text-gray-500 mb-6 text-justify">
                    {{ $about->description }}
                </p>
                <a href="{{ route('public.tentang.sejarah') }}"
                    class="inline-flex items-center gap-2 px-7 py-3 rounded-full bg-sky-600 text-white border border-sky-600 hover:bg-transparent hover:text-sky-600 transition">
                    Selengkapnya
                </a>
            </div>
        </div>
    </section>

    {{-- ================= STATS ================= --}}
    <section id="stats" class="bg-image py-14">
        <div class="max-w-screen-xl mx-auto px-4" data-aos="fade-up">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-{{ min($statsCount, 4) }} gap-8 text-center">
                @foreach ($stats as $stat)
                    <div>
                        <h3 class="text-4xl sm:text-5xl font-extrabold text-sky-600">
                            {{ $stat->value }}
                        </h3>
                        <p class="text-gray-500">{{ $stat->label }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section id="jurusan" class="py-16 bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6" data-aos="fade-up">
            <div class="max-w-screen-md mx-auto text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-sky-600">Bidang Jurusan
                    Kami</h2>
                <p class="text-gray-500 sm:text-md dark:text-gray-400">Pilih program keahlian yang sesuai dengan
                    minat
                    dan bakat Anda untuk masa depan yang cerah.</p>
            </div>


            <div class="max-w-6xl mx-auto">
                <div class="swiper majorsSwiper">
                    <div class="swiper-wrapper pb-8">
                        <style>
                            .swiper-slide {
                                height: auto;
                            }

                            .swiper-wrapper {
                                transition-timing-function: ease-in-out !important;
                            }

                            .c-hover {
                                transition-property: all;
                                transition-timing-function: cubic-bezier(.4, 0, .2, 1);
                                transition-duration: .3s;
                                animation-duration: .3s;
                            }

                            .c-hover:hover {
                                transform: translate(0, -.25rem) rotate(0) skew(0) skewY(0) scaleX(1) scaleY(1);
                                --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / .1), 0 4px 6px -4px rgb(0 0 0 / .1);
                                box-shadow: 0 0 #0000, 0 0 #0000, var(--tw-shadow);
                            }
                        </style>
                        {{-- {{ dd($majors) }} --}}
                        @foreach ($majors as $major)
                            <a href="{{ route('public.jurusan.show', $major->slug) }}" class="swiper-slide mb-1">
                                <article class="bg-white rounded-lg shadow c-hover group">
                                    <div class="w-full h-48 rounded-t-lg overflow-hidden">
                                        <img src="{{ asset($major->image) }}" alt="{{ $major->name }}" loading="lazy"
                                            class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110"">
                                    </div>
                                    <div class="flex flex-col space-y-1.5 p-6">
                                        <div
                                            class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-gray-200 hover:bg-secondary/80 w-fit mb-2">
                                            {{ $major->short_name }}</div>
                                        <h3 class="font-semibold tracking-tight text-lg">{{ $major->name }}</h3>
                                    </div>
                                    <div class="p-6 pt-0">
                                        <p class="text-sm text-body line-clamp-2">{{ $major->description }}
                                        </p>
                                    </div>
                                </article>
                            </a>
                        @endforeach

                    </div>

                    <!-- Navigation -->
                    <div class="swiper-button-next bg-white border border-sky-600 rounded-full p-2 w-3 h-3">
                        @svg('lucide-chevron-right')</div>
                    <div class="swiper-button-prev bg-white border border-sky-600 rounded-full p-2 w-3 h-3">
                        @svg('lucide-chevron-left')</div>
                </div>
            </div>


        </div>
    </section>

    <section id="pilih" class="bg-image">
        <div
            class="gap-6 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-3 sm:py-16 lg:px-6" data-aos="fade-up">
            <div class="my-4 md:my-0">
                <div>
                    <h6 class="w-fit uppercase mb-2 border-b-2 border-dashed">KENAPA PILIH</h6>
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-sky-600">SMK PGRI 6 DENPASAR?</h2>
                </div>
                <p class="mb-6 font-light text-gray-500 md:text-lg">Lorem, ipsum dolor sit amet consectetur
                    adipisicing
                    elit. Ea tempora odit, iste neque ullam consectetur veniam nesciunt ex vel ratione qui iure
                    soluta,
                    dicta fuga maiores repellendus accusantium laudantium veritatis blanditiis. Ratione, id?
                    Asperiores.
                </p>
                <a href="{{ $ppdb_link ?? '#' }}"
                    class="inline-flex justify-center gap-2 items-center py-3 px-7 text-base font-medium text-center bg-sky-600 text-white rounded-full border border-sky-600 hover:bg-transparent hover:text-sky-600 focus:ring-4 focus:ring-gray-100 transition-all duration-300">
                    Daftar Sekarang
                    @svg('lucide-arrow-right', 'w-5 h-5')
                </a>
            </div>
            <div class="grid grid-cols-2 gap-4 col-span-2">
                <div class="bg-neutral-primary-soft block p-6 border border-default rounded-base shadow-xs">
                    <div
                        class="w-20 h-20 mx-auto mb-4 text-white bg-sky-600 rounded-full justify-center flex items-center">
                        @svg('lucide-menu-square', 'w-12 h-12 ')
                    </div>
                    <div class="p-0">
                        <h5 class="text-center mb-3 text-lg font-semibold tracking-tight text-sky-600 leading-8">
                            Kurikulum Praktis</h5>
                        <p class="text-center text-body">Fokus pada keterampilan yang relevan dengan industri saat
                            ini.
                        </p>
                    </div>
                </div>
                <div class="bg-neutral-primary-soft block p-6 border border-default rounded-base shadow-xs">
                    <div
                        class="w-20 h-20 mx-auto mb-4 text-white bg-sky-600 rounded-full justify-center flex items-center">
                        @svg('lucide-school-2', 'w-12 h-12 ')
                    </div>
                    <div class="p-0">
                        <h5 class="text-center mb-3 text-lg font-semibold tracking-tight text-sky-600 leading-8">
                            Fasilitas Lengkap</h5>
                        <p class="text-center text-body">Laboratorium dan ruang praktik modern mendukung
                            pembelajaran.
                        </p>
                    </div>
                </div>
                <div class="bg-neutral-primary-soft block p-6 border border-default rounded-base shadow-xs">
                    <div
                        class="w-20 h-20 mx-auto mb-4 text-white bg-sky-600 rounded-full justify-center flex items-center">
                        @svg('lucide-graduation-cap', 'w-12 h-12 ')
                    </div>
                    <div class="p-0">
                        <h5 class="text-center mb-3 text-lg font-semibold tracking-tight text-sky-600 leading-8">
                            Jurusan Unggulan</h5>
                        <p class="text-center text-body">Beragam pilihan jurusan sesuai kebutuhan dunia kerja.
                        </p>
                    </div>
                </div>
                <div class="bg-neutral-primary-soft block p-6 border border-default rounded-base shadow-xs">
                    <div
                        class="w-20 h-20 mx-auto mb-4 text-white bg-sky-600 rounded-full justify-center flex items-center">
                        @svg('lucide-user-round-check', 'w-12 h-12 ')
                    </div>
                    <div class="p-0">
                        <h5 class="text-center mb-3 text-lg font-semibold tracking-tight text-sky-600 leading-8">
                            Pengajar Berpengalaman</h5>
                        <p class="text-center text-body">Dapatkan bimbingan dari tenaga pengajar profesional.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="berita" class="bg-white py-16">
        <div class="gap-6 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 sm:py-16 lg:px-6" data-aos="fade-up">
            <h6 class="w-fit uppercase mb-2 border-b-2 border-dashed">Artikel</h6>
            <div>
                <div class="col-span-2">
                    <div class="flex justify-between items-center">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-sky-600">Berita terkini</h2>
                        <div class="hidden md:block">
                            <a href="{{ route('public.berita.index') }}"
                                class="inline-flex justify-center gap-2 items-center py-3 px-7 text-base font-medium text-center bg-transparent text-sky-600 rounded-full border border-sky-600 hover:bg-sky-600 hover:text-white focus:ring-4 focus:ring-gray-100 transition-all duration-300">
                                Lihat Semua
                                @svg('lucide-arrow-right', 'w-5 h-5')
                            </a>
                        </div>
                    </div>
                    <div class="mt-8 grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse ($news as $index => $n)
                            <a href="{{ route('public.berita.show', $n->slug) }}" class="{{ $index > 2 ? 'hidden md:block' : '' }}">
                                <article class="bg-white rounded-lg shadow c-hover group" data-aos="fade-up">
                                    <div class="aspect-video rounded-t-lg overflow-hidden relative">
                                        <img src="{{ asset($n->image) }}" alt="{{ $n->title }}" loading="lazy"
                                            class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110"">
                                        <div
                                            class="text-2xs uppercase font-medium px-2 py-1 rounded-full absolute bottom-4 right-4 {{ $n->category_color }}">
                                            {{ $n->category }}</div>
                                    </div>
                                    <div class="flex flex-col space-y-1.5 p-6">
                                        <div class="text-sm text-body">
                                            {{ $n->published_at_formatted }}</div>
                                        <h3 class="font-semibold tracking-tight text-lg">{{ $n->title }}</h3>
                                    </div>
                                    <div class="p-6 pt-0">
                                        <p class="text-sm text-body line-clamp-2">{{ $n->excerpt }}
                                        </p>
                                    </div>
                                </article>
                            </a>
                        @empty
                            <p class="text-gray-500 text-center w-full col-span-full">Belum ada berita terbaru.</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="text-center
                        mt-8">
                <a href="{{ route('public.berita.index') }}"
                    class="md:hidden inline-flex justify-center gap-2 items-center py-3 px-7 text-base font-medium text-center bg-transparent text-sky-600 rounded-full border border-sky-600 hover:bg-sky-600 hover:text-white focus:ring-4 focus:ring-gray-100 transition-all duration-300">
                    Lihat Semua
                    @svg('lucide-arrow-right', 'w-5 h-5')
                </a>
            </div>
        </div>
    </section>

    <section id="ulasan" class="py-16 bg-image">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6" data-aos="fade-up">
            <div class="max-w-screen-md mx-auto text-center mb-8 lg:mb-16">
                <h6 class="w-fit uppercase mb-2 mx-auto border-b-2 border-dashed">Kata Mereka</h6>
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-sky-600">Apa Kata Alumni & Orang Tua
                </h2>
            </div>


            <div class="max-w-6xl mx-auto">
                <div class="swiper majorsSwiper">
                    <div class="swiper-wrapper pb-8">
                        <div class="swiper-slide bg-white p-8 rounded-2xl shadow-sm hover:shadow-md">
                            <div class="flex text-yellow-400 mb-4">
                                @svg('lucide-star', 'w-4 h-4')
                                @svg('lucide-star', 'w-4 h-4')
                                @svg('lucide-star', 'w-4 h-4')
                                @svg('lucide-star', 'w-4 h-4')
                                @svg('lucide-star', 'w-4 h-4')
                            </div>
                            <p class="text-gray-600 mb-6 italic">"Lorem ipsum dolor sit amet consectetur
                                adipisicing
                                elit. Sunt optio recusandae accusamus quibusdam, distinctio asperiores dolore illo
                                tempora cumque."</p>
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold text-xl">
                                    B
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">Budi Santoso</h4>
                                    <span class="text-sm text-gray-500">Orang Tua Siswa</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide bg-white p-8 rounded-2xl shadow-sm hover:shadow-md">
                            <div class="flex text-yellow-400 mb-4">
                                @svg('lucide-star', 'w-4 h-4')
                                @svg('lucide-star', 'w-4 h-4')
                                @svg('lucide-star', 'w-4 h-4')
                                @svg('lucide-star', 'w-4 h-4')
                                @svg('lucide-star', 'w-4 h-4')
                            </div>
                            <p class="text-gray-600 mb-6 italic">"Lorem ipsum dolor sit amet, consectetur
                                adipisicing
                                elit. Repudiandae, eaque similique. Reiciendis dicta placeat suscipit pariatur eius
                                fugit corporis veritatis voluptatum, accusamus itaque non?"</p>
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold text-xl">
                                    B
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">Siti Aminah</h4>
                                    <span class="text-sm text-gray-500">Alumni 2023</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide bg-white p-8 rounded-2xl shadow-sm hover:shadow-md">
                            <div class="flex text-yellow-400 mb-4">
                                @svg('lucide-star', 'w-4 h-4')
                                @svg('lucide-star', 'w-4 h-4')
                                @svg('lucide-star', 'w-4 h-4')
                                @svg('lucide-star', 'w-4 h-4')
                                @svg('lucide-star', 'w-4 h-4')
                            </div>
                            <p class="text-gray-600 mb-6 italic">"Lorem, ipsum dolor sit amet consectetur
                                adipisicing
                                elit. Amet, adipisci aspernatur impedit quam ex corrupti numquam, laboriosam non ea
                                ratione totam."</p>
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold text-xl">
                                    B
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">El Susilo</h4>
                                    <span class="text-sm text-gray-500">Orang Tua Siswa</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide bg-white p-8 rounded-2xl shadow-sm hover:shadow-md">
                            <div class="flex text-yellow-400 mb-4">
                                @svg('lucide-star', 'w-4 h-4')
                                @svg('lucide-star', 'w-4 h-4')
                                @svg('lucide-star', 'w-4 h-4')
                                @svg('lucide-star', 'w-4 h-4')
                                @svg('lucide-star', 'w-4 h-4')
                            </div>
                            <p class="text-gray-600 mb-6 italic">"Lorem ipsum dolor sit amet, consectetur
                                adipisicing
                                elit. Ut sit, delectus voluptatum repellat fugiat ad magnam facere amet
                                necessitatibus
                                eveniet dolor illo."</p>
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold text-xl">
                                    B
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">Rizky Pratama</h4>
                                    <span class="text-sm text-gray-500">Alumni 2022</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <section id="galeri" class="py-16 bg-white">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12" data-aos="fade-up">
            <div class="text-center mb-12 fade-in-section">
                <h2 class="text-3xl md:text-4xl font-extrabold text-sky-600 mb-4">Galeri Sekolah</h2>
                <p class="text-gray-600">Momen-momen berharga dalam kegiatan belajar dan aktivitas siswa.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 auto-rows-[200px]">
                @forelse ($galleries as $gallery)
                    <a href="{{ route('public.galeri.show', $gallery) }}"
                        class="relative overflow-hidden rounded-xl {{ $loop->first ? 'col-span-2 row-span-2' : '' }} group cursor-pointer">
                        <img src="{{ $gallery->cover_image }}" alt="Kegiatan"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black/50 opacity-0 transition duration-300 flex items-center justify-center hover:opacity-100">
                            <span
                                class="text-white font-bold {{ $loop->first ? 'text-lg' : 'text-sm' }}">{{ $gallery->name }}</span>
                        </div>
                    </a>
                @empty
                    <p class="text-gray-500 text-center w-full col-span-full">Belum ada galeri yang tersedia.</p>
                @endforelse
            </div>
            <div class="text-center
                        mt-8">
                <a href="{{ route('public.galeri.index') }}"
                    class="inline-flex justify-center gap-2 items-center py-3 px-7 text-base font-medium text-center bg-transparent text-sky-600 rounded-full border border-sky-600 hover:bg-sky-600 hover:text-white focus:ring-4 focus:ring-gray-100 transition-all duration-300">
                    Lihat Galeri Lengkap
                    @svg('lucide-arrow-right', 'w-5 h-5')
                </a>
            </div>
        </div>
    </section>

    <script>
        const swiper = new Swiper('.majorsSwiper', {
            slidesPerView: 3,
            slidesPerGroup: 1,
            loop: true,
            spaceBetween: 16,

            speed: 800,

            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                640: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                },
            },
        });
    </script>
</x-app>
