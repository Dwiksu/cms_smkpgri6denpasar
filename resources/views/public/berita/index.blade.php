<x-app>
    <x-slot:title>Berita</x-slot:title>



    <div class="min-h-screen">
        <section id="hero" class="bg-white aspect-auto min-h-[300px] md:min-h-0 md:aspect-5/1 w-full relative flex overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                style="background-image: url('assets/berita.jpg');">
                <div class="absolute inset-0 bg-linear-to-r from-sky-600/90 to-sky-600/70"></div>
            </div>
            <div class="py-8 px-4 max-w-screen-xl mx-auto w-full lg:py-16 lg:px-8 relative z-10 flex items-end">
                <div>
                    <h1 class="mb-4 text-4xl font-bold tracking-tight text-white md:text-5xl lg:text-6xl">
                        Berita & Pengumuman </h1>
                    <p class="text-lg font-normal text-white lg:text-xl">
                        Dapatkan informasi terbaru seputar kegiatan, pengumuman, dan prestasi sekolah.</p>
                </div>
            </div>
        </section>

        <section class="py-6 bg-white backdrop-blur-lg sticky top-0 z-20 shadow-sm">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
                <form action="{{ route('public.berita.index') }}" method="GET"
                    class="flex flex-col sm:flex-row gap-4">
                    <div class="relative flex-1">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari berita..."
                            class="w-full pl-10 pr-4 py-2 rounded-xl border-slate-200 focus:ring-sky-500 focus:border-sky-500 text-sm">
                    </div>

                    <div class="flex gap-2">
                        <select name="category" onchange="this.form.submit()"
                            class="w-full sm:w-48 py-2 rounded-xl border-slate-200 text-sm focus:ring-sky-500 capitalize">
                            <option value="all">Semua Kategori</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                                    {{ ucfirst($cat) }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit"
                            class="bg-sky-600 text-white px-6 py-2 rounded-xl font-bold hover:bg-sky-700 transition-colors shadow-md shadow-sky-200">
                            Cari
                        </button>
                    </div>
                </form>
            </div>
        </section>

        {{-- News Grid --}}
        <section class="py-12 bg-white">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
                @if ($news->count() > 0)
                    {{-- Featured News (Hanya muncul di halaman 1 dan jika tidak sedang mencari) --}}
                    @if ($news->onFirstPage() && !request('search') && !request('category'))
                        @php $featured = $news->first(); @endphp
                        <div class="mb-12" data-aos="fade-up">
                            <a href="{{ route('public.berita.show', $featured->slug) }}" class="group block">
                                <div
                                    class="bg-white rounded-3xl overflow-hidden shadow-xl border border-slate-100 flex flex-col md:flex-row transition-all duration-500 hover:shadow-2xl">
                                    <div class="md:w-1/2 aspect-video md:aspect-auto overflow-hidden relative">
                                        <img src="{{ $featured->image ?? '/placeholder.svg' }}"
                                            alt="{{ $featured->title }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">

                                        <span
                                            class="absolute bottom-4 right-4 {{ $featured->category_color }} text-2xs uppercase font-medium px-2 py-0.5 rounded-md shadow-sm">
                                            {{ $featured->category }}
                                        </span>
                                    </div>
                                    <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
                                        <div
                                            class="flex items-center gap-4 text-xs text-slate-400 mb-4 font-semibold uppercase tracking-wider">
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                {{ $featured->published_at->translatedFormat('d F Y') }}
                                            </span>
                                            <span>•</span>
                                            <span>{{ ceil(str_word_count(strip_tags($featured->content)) / 200) }}
                                                MENIT BACA</span>
                                        </div>
                                        <h2
                                            class="text-3xl font-bold text-slate-900 group-hover:text-sky-600 transition-colors mb-4 leading-tight">
                                            {{ $featured->title }}
                                        </h2>
                                        <p class="text-slate-500 mb-6 line-clamp-3 leading-relaxed">
                                            {{ $featured->excerpt }}</p>
                                        <span
                                            class="text-sky-600 font-bold inline-flex items-center gap-2 group-hover:gap-4 transition-all">
                                            Baca Selengkapnya <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                    {{-- Rest of News --}}
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($news as $item)
                            {{-- Skip featured if on first page --}}
                            @if ($news->onFirstPage() && !request('search') && !request('category') && $loop->first)
                                @continue
                            @endif

                            <a href="{{ route('public.berita.show', $item->slug) }}"
                                class="group flex flex-col h-full bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300" data-aos="fade-up">
                                <div class="aspect-video overflow-hidden relative">
                                    <img src="{{ $item->image ?? '/placeholder.svg' }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                                    <span
                                        class="absolute bottom-4 right-4 {{ $item->category_color }} text-2xs uppercase font-medium px-2 py-0.5 rounded-md shadow-sm">
                                        {{ $item->category }}
                                    </span>
                                </div>
                                <div class="p-6 flex flex-col flex-1">
                                    <div
                                        class="flex items-center gap-3 text-[10px] text-slate-400 font-bold uppercase mb-3">
                                        <span>{{ $item->published_at->translatedFormat('d M Y') }}</span>
                                        <span>•</span>
                                        <span class="flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ ceil(str_word_count(strip_tags($item->content)) / 200) }} MIN
                                        </span>
                                    </div>
                                    <h3
                                        class="text-lg font-bold text-slate-900 group-hover:text-sky-600 transition-colors mb-2 line-clamp-2">
                                        {{ $item->title }}
                                    </h3>
                                    <p class="text-slate-500 text-sm line-clamp-3 leading-relaxed mb-4">
                                        {{ $item->excerpt }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    {{-- Pagination (Laravel Style) --}}
                    <div class="mt-16 w-full max-w-full overflow-x-auto pb-4 md:overflow-visible md:pb-0 md:flex md:justify-center">
                        <div class="w-max mx-auto md:w-auto md:mx-0">
                            {{ $news->appends(request()->input())->links() }}
                        </div>
                    </div>
                @else
                    <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-slate-200">
                        <p class="text-slate-500 text-lg">Tidak ada berita yang ditemukan untuk kata kunci ini.</p>
                        <a href="{{ route('public.berita.index') }}"
                            class="text-sky-600 font-bold mt-4 inline-block hover:underline">Lihat semua berita</a>
                    </div>
                @endif
            </div>
        </section>
    </div>
</x-app>
