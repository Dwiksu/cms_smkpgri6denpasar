<x-app>
    <x-slot:title>Home</x-slot:title>

    <section id="hero"
        class="bg-white aspect-5/2 pb-10 w-full relative flex items-center justify-center overflow-hidden overlay-bottom">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url({{ asset($hero->background_image) }});">
            <div class="absolute inset-0 bg-linear-to-r from-sky-600/90 to-sky-600/70"></div>
        </div>
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12 relative z-10">
            <h1 class="mb-4 text-xl font-bold tracking-tight text-white md:text-2xl lg:text-3xl">
                {{ $hero->tagline }}</h1>
            <h1 class="mb-4 text-4xl font-bold tracking-tight text-white md:text-5xl lg:text-6xl">
                {{ $hero->title }}</h1>
            <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48">
                {{ $hero->subtitle }}</p>
            <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <a href="{{ $hero->cta_link }}"
                    class="inline-flex justify-center gap-2 items-center py-3 px-7 text-base font-medium text-center bg-amber-300 text-white rounded-full border border-amber-300 hover:bg-transparent hover:text-amber-300 focus:ring-4 focus:ring-gray-100 transition-all duration-300">
                    {{ $hero->cta_text }}
                    @svg('lucide-arrow-right', 'w-5 h-5')
                </a>
                <a href="#jurusan"
                    class="inline-flex justify-center items-center py-3 px-7 text-base font-medium text-center text-white rounded-full border border-gray-300 hover:bg-gray-100 hover:text-gray-900 focus:ring-4 focus:ring-gray-100 transition-all duration-300">
                    Lihat Jurusan
                </a>
            </div>
        </div>
    </section>

    <section id="tentang-kami" class="bg-white py-16">
        <div
            class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <div class="relative">
                <div class="absolute -inset-4 bg-sky-600/5 rounded-3xl -rotate-3"></div>
                <img class="relative rounded-2xl shadow-2xl w-full object-cover aspect-4/3 z-10"
                    src="{{ asset($about->image) }}" alt="dashboard image">
            </div>
            <div class="mt-4 md:mt-0">
                <div>
                    <h6 class="w-fit uppercase mb-2 border-b-2 border-dashed">Tentang Kami</h6>
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-sky-600">{{ $about->title }}</h2>
                </div>
                <p class="mb-6 font-light text-gray-500 md:text-lg">{{ $about->description }}</p>
                <a href="#"
                    class="inline-flex justify-center gap-2 items-center py-3 px-7 text-base font-medium text-center bg-sky-600 text-white rounded-full border border-sky-600 hover:bg-transparent hover:text-sky-600 focus:ring-4 focus:ring-gray-100 transition-all duration-300">
                    Selengkapnya
                    @svg('lucide-arrow-right', 'w-5 h-5')
                </a>
            </div>
        </div>
    </section>

    <section id='stats' class="bg-image">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="space-y-8 grid grid-cols-2 md:grid-cols-4 md:gap-12 md:space-y-0">
                <div class="flex items-center flex-col">
                    <h3 class="mb-2 text-5xl font-extrabold text-sky-600">{{ $stats[0]->value }}</h3>
                    <p class="text-gray-500">{{ $stats[0]->label }}</p>
                </div>
                <div class="flex items-center flex-col">
                    <h3 class="mb-2 text-5xl font-extrabold text-sky-600">{{ $stats[1]->value }}</h3>
                    <p class="text-gray-500">{{ $stats[1]->label }}</p>
                </div>
                <div class="flex items-center flex-col">
                    <h3 class="mb-2 text-5xl font-extrabold text-sky-600">{{ $stats[2]->value }}</h3>
                    <p class="text-gray-500">{{ $stats[2]->label }}</p>
                </div>
                <div class="flex items-center flex-col">
                    <h3 class="mb-2 text-5xl font-extrabold text-sky-600">{{ $stats[3]->value }}</h3>
                    <p class="text-gray-500">{{ $stats[3]->label }}</p>
                </div>

            </div>
        </div>
    </section>

    <section id="jurusan" class="py-16 bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mx-auto text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-sky-600">Bidang Jurusan
                    Kami</h2>
                <p class="text-gray-500 sm:text-md dark:text-gray-400">Pilih program keahlian yang sesuai dengan minat
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
                        @foreach ($majors as $major)
                            <a href="#" class="swiper-slide mb-1">
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
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>


        </div>
    </section>

    <section id="pilih" class="bg-image">
        <div
            class="gap-6 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-3 sm:py-16 lg:px-6">
            <div class="mt-4 md:mt-0">
                <div>
                    <h6 class="w-fit uppercase mb-2 border-b-2 border-dashed">KENAPA PILIH</h6>
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-sky-600">SMK PGRI 6 DENPASAR?</h2>
                </div>
                <p class="mb-6 font-light text-gray-500 md:text-lg">Lorem, ipsum dolor sit amet consectetur adipisicing
                    elit. Ea tempora odit, iste neque ullam consectetur veniam nesciunt ex vel ratione qui iure soluta,
                    dicta fuga maiores repellendus accusantium laudantium veritatis blanditiis. Ratione, id? Asperiores.
                </p>
                <a href="#"
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
                        <p class="text-center text-body">Fokus pada keterampilan yang relevan dengan industri saat ini.
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
                        <p class="text-center text-body">Laboratorium dan ruang praktik modern mendukung pembelajaran.
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
        <div class="gap-6 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 sm:py-16 lg:px-6">
            <h6 class="w-fit uppercase mb-2 border-b-2 border-dashed">Artikel</h6>
            <div>
                <div class="col-span-2">
                    <div class="flex justify-between items-center">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-sky-600">Berita terkini</h2>
                        <div>
                            <a href="#"
                                class="inline-flex justify-center gap-2 items-center py-3 px-7 text-base font-medium text-center bg-transparent text-sky-600 rounded-full border border-sky-600 hover:bg-sky-600 hover:text-white focus:ring-4 focus:ring-gray-100 transition-all duration-300">
                                Lihat Semua
                                @svg('lucide-arrow-right', 'w-5 h-5')
                            </a>
                        </div>
                    </div>
                    <div class="mt-8 grid grid-cols-3 gap-4">
                        @foreach ($news as $n)
                            <a href="/berita/{{ $n->slug }}">
                                <article class="bg-white rounded-lg shadow c-hover group">
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="ulasan" class="py-16 bg-image">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mx-auto text-center mb-8 lg:mb-16">
                <h6 class="w-fit uppercase mb-2 mx-auto border-b-2 border-dashed">Kata Mereka</h6>
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-sky-600">Apa Kata Alumni & Orang Tua</h2>
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
                            <p class="text-gray-600 mb-6 italic">"Lorem ipsum dolor sit amet consectetur adipisicing
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
                            <p class="text-gray-600 mb-6 italic">"Lorem ipsum dolor sit amet, consectetur adipisicing
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
                            <p class="text-gray-600 mb-6 italic">"Lorem, ipsum dolor sit amet consectetur adipisicing
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
                            <p class="text-gray-600 mb-6 italic">"Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Ut sit, delectus voluptatum repellat fugiat ad magnam facere amet necessitatibus
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
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
            <div class="text-center mb-12 fade-in-section">
                <h2 class="text-3xl md:text-4xl font-extrabold text-sky-600 mb-4">Galeri Sekolah</h2>
                <p class="text-gray-600">Momen-momen berharga dalam kegiatan belajar dan aktivitas siswa.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 auto-rows-[200px]">
                @foreach ($galleries as $gallery)
                    <a href="galeri/{{ $gallery->slug }}"
                        class="relative overflow-hidden rounded-xl {{ $loop->first ? 'col-span-2 row-span-2' : '' }} group cursor-pointer">
                        <img src="{{ $gallery->cover_image }}" alt="Kegiatan"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black/50 opacity-0 transition duration-300 flex items-center justify-center hover:opacity-100">
                            <span
                                class="text-white font-bold {{ $loop->first ? 'text-lg' : 'text-sm' }}">{{ $gallery->name }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="galeri"
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
