<x-app>
    <x-slot:title>{{ $major->name }}</x-slot:title>

    <div class="min-h-screen" x-data="{ activeTab: 'overview' }">

        <section id="hero"
            class="bg-white aspect-auto min-h-[300px] md:min-h-0 md:aspect-5/1 w-full relative flex overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                style="background-image: url({{ asset($major->image) }});">
                <div class="absolute inset-0 bg-linear-to-r from-sky-600/90 to-sky-600/70"></div>
            </div>
            <div class="py-12 px-4 max-w-screen-xl mx-auto w-full lg:py-16 lg:px-8 relative z-10 flex items-end">
                <div>
                    <h1 class="mb-3 text-3xl font-bold tracking-tight text-white sm:text-4xl md:text-5xl lg:text-6xl">
                        {{ $major->name }}</h1>
                    <p class="text-base font-normal text-white sm:text-lg lg:text-xl">
                        {{ $major->description }}</p>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-12 bg-slate-50">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">

                <div
                    class="flex overflow-x-auto md:flex-wrap gap-2 mb-8 bg-slate-200/50 p-1 rounded-lg w-full md:w-fit pb-2 md:pb-1">
                    <template x-for="tab in ['overview', 'curriculum', 'careers', 'gallery']">
                        <button @click="activeTab = tab"
                            :class="activeTab === tab ? 'bg-white shadow-sm text-sky-600' :
                                'text-slate-600 hover:text-slate-900'"
                            class="whitespace-nowrap px-5 md:px-6 py-2 rounded-md text-sm md:text-base font-medium transition-all capitalize"
                            x-text="tab === 'overview' ? 'Overview' : (tab === 'curriculum' ? 'Kurikulum' : (tab === 'careers' ? 'Karir' : 'Galeri'))">
                        </button>
                    </template>
                </div>

                <div x-show="activeTab === 'overview'" class="space-y-8" x-transition>
                    <div class="flex flex-col-reverse lg:grid lg:grid-cols-3 gap-8">

                        <div class="lg:col-span-2">
                            <h2 class="text-2xl font-bold mb-4 text-slate-800">Tentang Jurusan</h2>
                            <div class="prose prose-slate max-w-none text-justify sm:text-left leading-relaxed">
                                {!! $major->full_description !!}
                            </div>

                            @if (count($teachers ?? []) > 0)
                                <div class="mt-12" x-intersect="$el.classList.add('animate-fade-up')">
                                    <h3
                                        class="text-xl md:text-2xl font-bold mb-6 text-slate-800 flex items-center gap-2">
                                        <svg class="h-6 w-6 text-sky-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        Guru Pengajar
                                    </h3>

                                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                                        @foreach ($teachers ?? [] as $teacher)
                                            <div
                                                class="bg-white rounded-xl border border-slate-200 p-4 md:p-5 transition hover:-translate-y-1 hover:shadow-lg">
                                                {{-- Foto --}}
                                                <div class="flex justify-center mb-3 md:mb-4">
                                                    <img src="{{ $teacher->photo ?? '/placeholder-user.svg' }}"
                                                        alt="{{ $teacher->name }}"
                                                        class="h-20 w-20 md:h-24 md:w-24 rounded-full object-cover bg-slate-100">
                                                </div>
                                                {{-- Nama --}}
                                                <h4
                                                    class="text-center text-sm font-semibold text-slate-800 leading-snug capitalize">
                                                    {{ $teacher->name }}
                                                </h4>
                                                {{-- Mapel --}}
                                                <p
                                                    class="mt-1 text-center text-[11px] md:text-xs text-slate-500 capitalize line-clamp-2">
                                                    {{ $teacher->subject ?? 'Guru Produktif' }}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="w-full max-w-md mx-auto lg:max-w-none lg:relative mb-4 lg:mb-0">
                            <div
                                class="relative lg:sticky top-auto lg:top-24 bg-white p-6 rounded-2xl shadow-xl border border-slate-100">
                                <div
                                    class="h-12 w-12 md:h-14 md:w-14 flex items-center justify-center rounded-2xl bg-sky-600 text-white mb-4 shadow-lg shadow-sky-200">
                                    <svg class="h-6 w-6 md:h-7 md:w-7" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold mb-4">Informasi Jurusan</h3>
                                <div class="space-y-4 mb-6">
                                    <div>
                                        <p class="text-sm text-slate-500">Kode Jurusan</p>
                                        <p class="font-semibold">{{ $major->short_name }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-slate-500">Jumlah Kurikulum</p>
                                        <p class="font-semibold">{{ count($major->subjects ?? []) }} Mata Pelajaran</p>
                                    </div>
                                    <a href="/kontak"
                                        class="block text-center bg-sky-600 text-white py-3 rounded-xl font-semibold hover:bg-sky-700 transition-colors shadow-md">
                                        Hubungi Kami
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (count($major->achievements ?? []) > 0)
                        <div class="mt-8 md:mt-0">
                            <h3 class="text-xl font-bold mb-4 flex items-center gap-2 text-slate-800">
                                <svg class="h-5 w-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                Prestasi Jurusan
                            </h3>
                            <div class="grid sm:grid-cols-2 gap-3 md:gap-4">
                                @foreach ($major->achievements ?? [] as $achievement)
                                    <div
                                        class="bg-white p-3 md:p-4 rounded-xl shadow-sm flex items-start md:items-center gap-3 border border-slate-100">
                                        <svg class="h-5 w-5 text-emerald-500 flex-shrink-0 mt-0.5 md:mt-0"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span
                                            class="text-sm md:text-base text-slate-700 leading-tight">{{ $achievement }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div x-show="activeTab === 'curriculum'" x-transition style="display: none;">
                    <div class="max-w-3xl" x-data="{ selected: null }">
                        <h2 class="text-xl md:text-2xl font-bold mb-3 md:mb-4 flex items-center gap-2">
                            <svg class="h-6 w-6 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            Kurikulum & Kompetensi
                        </h2>
                        <p class="text-sm md:text-base text-slate-600 mb-6 md:mb-8">Klik pada mata pelajaran untuk
                            melihat detail kompetensi yang
                            akan dipelajari.</p>

                        <div class="space-y-3">
                            @forelse($major->subjects ?? [] as $index => $item)
                                <div class="border border-slate-200 rounded-2xl bg-white overflow-hidden shadow-sm transition-all duration-300"
                                    :class="selected === {{ $index }} ?
                                        'ring-2 ring-sky-500 border-transparent shadow-md' : ''">

                                    <button
                                        @click="selected !== {{ $index }} ? selected = {{ $index }} : selected = null"
                                        class="w-full flex items-center justify-between p-4 md:p-5 text-left focus:outline-none">
                                        <div class="flex items-center gap-3 md:gap-4">
                                            <div
                                                class="flex h-8 w-8 md:h-10 md:w-10 flex-shrink-0 items-center justify-center rounded-lg md:rounded-xl bg-sky-50 text-sky-600 font-bold text-sm">
                                                {{ $loop->iteration }}
                                            </div>
                                            <span
                                                class="font-bold text-sm md:text-base text-slate-800 pr-2">{{ $item['name'] }}</span>
                                        </div>

                                        <svg class="h-5 w-5 text-slate-400 flex-shrink-0 transition-transform duration-300"
                                            :class="selected === {{ $index }} ? 'rotate-180 text-sky-600' : ''"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>

                                    <div class="relative overflow-hidden transition-all max-h-0 duration-500"
                                        x-ref="container{{ $index }}"
                                        :style="selected === {{ $index }} ? 'max-height: ' + $refs
                                            .container{{ $index }}.scrollHeight + 'px' : ''">
                                        <div class="p-4 md:p-5 pt-0 border-t border-slate-50">
                                            <div
                                                class="text-slate-600 leading-relaxed bg-slate-50 p-3 md:p-4 rounded-xl text-xs md:text-sm">
                                                {{ $item['description'] ?? 'Deskripsi kurikulum belum tersedia untuk mata pelajaran ini.' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-slate-500 italic">Belum ada data kurikulum.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div x-show="activeTab === 'careers'" style="display: none;"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-4">
                    <div class="max-w-3xl">
                        <h2 class="text-xl md:text-2xl font-bold mb-4 flex items-center gap-2 text-slate-800">
                            <svg class="h-6 w-6 text-sky-600" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Prospek Karir
                        </h2>
                        <p class="text-sm md:text-base text-slate-600 mb-6 text-justify sm:text-left">
                            Lulusan jurusan <strong>{{ $major->name }}</strong> dibekali keahlian yang relevan dengan
                            industri saat ini. Berikut adalah peluang karir yang dapat Anda raih:
                        </p>

                        @if (count($major->careers ?? []) > 0)
                            <div class="grid sm:grid-cols-2 gap-3 md:gap-4">
                                @foreach ($major->careers ?? [] as $career)
                                    <div
                                        class="group bg-white p-4 md:p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-3 md:gap-4 hover:border-sky-200 hover:shadow-md transition-all duration-300">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 bg-emerald-50 rounded-full flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                                            <svg class="h-5 w-5 md:h-6 md:w-6 text-emerald-600 group-hover:text-inherit"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <span
                                            class="font-semibold text-sm md:text-base text-slate-700 group-hover:text-sky-600 transition-colors">
                                            {{ $career }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="bg-slate-100 p-6 md:p-8 rounded-2xl text-center">
                                <p class="text-slate-500 italic text-sm md:text-base">Belum ada data prospek karir yang
                                    tersedia untuk
                                    jurusan ini.</p>
                            </div>
                        @endif

                        <div class="mt-8 md:mt-10 p-5 md:p-6 bg-sky-50 rounded-2xl border border-sky-100">
                            <h4 class="font-bold text-sky-900 mb-2">💡 Tips Karir</h4>
                            <p class="text-xs md:text-sm text-sky-800/80 leading-relaxed text-justify sm:text-left">
                                Selain bekerja di perusahaan, lulusan kami juga didorong untuk membangun bisnis mandiri
                                (Wirausaha) sesuai dengan kompetensi keahlian yang ditekuni.
                            </p>
                        </div>
                    </div>
                </div>

                <div x-show="activeTab === 'gallery'" style="display: none;" x-transition>
                    <h2 class="text-xl md:text-2xl font-bold mb-4 md:mb-6">Galeri Jurusan</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-4">
                        @forelse ($major->gallery ?? [] as $img)
                            <div class="aspect-video rounded-xl overflow-hidden group shadow-md bg-slate-200">
                                <img src="{{ $img }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                            </div>
                        @empty
                            <p class="text-slate-500 col-span-2 md:col-span-3">Belum ada foto galeri.</p>
                        @endforelse
                    </div>
                </div>

            </div>
        </section>

        <section class="py-12 md:py-16 bg-white">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
                <h2 class="text-xl md:text-2xl font-bold mb-6 md:mb-8">Jurusan Lainnya</h2>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($otherMajors as $m)
                        <a href="{{ route('public.jurusan.show', $m->slug) }}" class="swiper-slide mb-1 block">
                            <article
                                class="bg-white rounded-lg shadow c-hover group h-full border border-slate-100 overflow-hidden flex flex-col">
                                <div class="w-full h-40 md:h-48 overflow-hidden bg-slate-100">
                                    <img src="{{ asset($m->image) }}" alt="{{ $m->name }}" loading="lazy"
                                        class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110">
                                </div>
                                <div class="flex flex-col space-y-1.5 p-5 md:p-6 flex-grow">
                                    <div
                                        class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-[10px] md:text-xs font-semibold transition-colors focus:outline-none border-transparent bg-slate-100 text-slate-700 w-fit mb-2">
                                        {{ $m->short_name }}
                                    </div>
                                    <h3 class="font-semibold tracking-tight text-base md:text-lg leading-tight">
                                        {{ $m->name }}</h3>
                                    <p class="text-xs md:text-sm text-slate-500 line-clamp-2 mt-2 leading-relaxed">
                                        {{ $m->description }}</p>
                                </div>
                            </article>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

</x-app>
