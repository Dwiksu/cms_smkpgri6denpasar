<x-app>
    <x-slot:title>{{ $major->name }}</x-slot:title>

    <div class="min-h-screen" x-data="{ activeTab: 'overview' }">

        <section id="hero" class="bg-white aspect-5/1 w-full relative flex overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                style="background-image: url({{ asset($major->image) }});">
                <div class="absolute inset-0 bg-linear-to-r from-sky-600/90 to-sky-600/70"></div>
            </div>
            <div class="py-8 px-4 max-w-screen-xl mx-auto w-full lg:py-16 lg:px-8 relative z-10 flex items-end">
                <div>
                    <h1 class="mb-4 text-4xl font-bold tracking-tight text-white md:text-5xl lg:text-6xl">
                        {{ $major->name }}</h1>
                    <p class="text-lg font-normal text-white lg:text-xl">
                        {{ $major->description }}</p>
                </div>
            </div>
        </section>

        <section class="py-12 bg-slate-50">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">

                <div class="flex flex-wrap gap-2 mb-8 bg-slate-200/50 p-1 rounded-lg w-fit">
                    <template x-for="tab in ['overview', 'curriculum', 'careers', 'gallery']">
                        <button @click="activeTab = tab"
                            :class="activeTab === tab ? 'bg-white shadow-sm text-sky-600' :
                                'text-slate-600 hover:text-slate-900'"
                            class="px-6 py-2 rounded-md font-medium transition-all capitalize"
                            x-text="tab === 'overview' ? 'Overview' : (tab === 'curriculum' ? 'Kurikulum' : (tab === 'careers' ? 'Karir' : 'Galeri'))">
                        </button>
                    </template>
                </div>

                <div x-show="activeTab === 'overview'" class="space-y-8" x-transition>
                    <div class="grid lg:grid-cols-3 gap-8">
                        <div class="lg:col-span-2">
                            <h2 class="text-2xl font-bold mb-4 text-slate-800">Tentang Jurusan</h2>
                            <div class="prose prose-slate max-w-none">
                                {!! $major->full_description !!}
                            </div>
                            @if (count($teachers) > 0)
                                <div class="mt-12" x-intersect="$el.classList.add('animate-fade-up')">
                                    <h3 class="text-2xl font-bold mb-6 text-slate-800 flex items-center gap-2">
                                        <svg class="h-6 w-6 text-sky-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        Guru Pengajar
                                    </h3>

                                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                                        @foreach ($teachers as $teacher)
                                            <div
                                                class="group bg-white rounded-2xl p-6 text-center border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                                                <div class="relative inline-block mb-4">
                                                    <img src="{{ $teacher->photo ?? '/placeholder-user.svg' }}"
                                                        alt="{{ $teacher->name }}"
                                                        class="w-24 h-24 rounded-full mx-auto object-cover border-4 border-sky-50 shadow-md group-hover:border-sky-200 transition-colors" />
                                                    <div
                                                        class="absolute -bottom-1 -right-1 bg-emerald-500 w-6 h-6 rounded-full border-2 border-white flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                                            <path fill-rule="evenodd"
                                                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </div>

                                                <h4
                                                    class="font-bold text-slate-800 leading-tight mb-1 group-hover:text-sky-600 transition-colors">
                                                    {{ $teacher->name }}
                                                </h4>
                                                <p class="text-sm text-slate-500">
                                                    {{ $teacher->subject ?? 'Guru Produktif' }}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="lg:relative">
                            <div class="sticky top-24 bg-white p-6 rounded-2xl shadow-xl border border-slate-100">
                                <div
                                    class="h-14 w-14 flex items-center justify-center rounded-2xl bg-sky-600 text-white mb-4 shadow-lg shadow-sky-200">
                                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                                        <p class="font-semibold">{{ count($major->subjects) }} Mata Pelajaran</p>
                                    </div>
                                    <a href="/kontak"
                                        class="block text-center bg-sky-600 text-white py-3 rounded-xl font-semibold hover:bg-sky-700 transition-colors shadow-md">
                                        Hubungi Kami
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (count($major->achievements) > 0)
                        <div>
                            <h3 class="text-xl font-bold mb-4 flex items-center gap-2 text-slate-800">
                                <svg class="h-5 w-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                Prestasi Jurusan
                            </h3>
                            <div class="grid sm:grid-cols-2 gap-4">
                                @foreach ($major->achievements as $achievement)
                                    <div
                                        class="bg-white p-4 rounded-xl shadow-sm flex items-center gap-3 border border-slate-100">
                                        <svg class="h-5 w-5 text-emerald-500 flex-shrink-0" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="text-slate-700">{{ $achievement }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div x-show="activeTab === 'curriculum'" x-transition>
                    <div class="max-w-3xl" x-data="{ selected: null }">
                        <h2 class="text-2xl font-bold mb-4 flex items-center gap-2">
                            <svg class="h-6 w-6 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            Kurikulum & Kompetensi
                        </h2>
                        <p class="text-slate-600 mb-8">Klik pada mata pelajaran untuk melihat detail kompetensi yang
                            akan dipelajari.</p>

                        <div class="space-y-3">
                            @forelse($major->subjects as $index => $item)
                                <div class="border border-slate-200 rounded-2xl bg-white overflow-hidden shadow-sm transition-all duration-300"
                                    :class="selected === {{ $index }} ?
                                        'ring-2 ring-sky-500 border-transparent shadow-md' : ''">

                                    <button
                                        @click="selected !== {{ $index }} ? selected = {{ $index }} : selected = null"
                                        class="w-full flex items-center justify-between p-5 text-left focus:outline-none">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-sky-50 text-sky-600 font-bold text-sm">
                                                {{ $loop->iteration }}
                                            </div>
                                            <span class="font-bold text-slate-800">{{ $item['name'] }}</span>
                                        </div>

                                        <svg class="h-5 w-5 text-slate-400 transition-transform duration-300"
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
                                        <div class="p-5 pt-0 border-t border-slate-50">
                                            <div
                                                class="text-slate-600 leading-relaxed bg-slate-50 p-4 rounded-xl text-sm">
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

                <div x-show="activeTab === 'careers'" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-4">
                    <div class="max-w-3xl">
                        <h2 class="text-2xl font-bold mb-4 flex items-center gap-2 text-slate-800">
                            <svg class="h-6 w-6 text-sky-600" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Prospek Karir
                        </h2>
                        <p class="text-slate-600 mb-6">
                            Lulusan jurusan <strong>{{ $major->name }}</strong> dibekali keahlian yang relevan dengan
                            industri saat ini. Berikut adalah peluang karir yang dapat Anda raih:
                        </p>

                        @if (count($major->careers) > 0)
                            <div class="grid sm:grid-cols-2 gap-4">
                                @foreach ($major->careers as $career)
                                    <div
                                        class="group bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4 hover:border-sky-200 hover:shadow-md transition-all duration-300">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 bg-emerald-50 rounded-full flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                                            <svg class="h-6 w-6 text-emerald-600 group-hover:text-inherit"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <span
                                            class="font-semibold text-slate-700 group-hover:text-sky-600 transition-colors">
                                            {{ $career }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="bg-slate-100 p-8 rounded-2xl text-center">
                                <p class="text-slate-500 italic">Belum ada data prospek karir yang tersedia untuk
                                    jurusan ini.</p>
                            </div>
                        @endif

                        <div class="mt-10 p-6 bg-sky-50 rounded-2xl border border-sky-100">
                            <h4 class="font-bold text-sky-900 mb-2">💡 Tips Karir</h4>
                            <p class="text-sm text-sky-800/80">
                                Selain bekerja di perusahaan, lulusan kami juga didorong untuk membangun bisnis mandiri
                                (Wirausaha) sesuai dengan kompetensi keahlian yang ditekuni.
                            </p>
                        </div>
                    </div>
                </div>

                <div x-show="activeTab === 'gallery'" x-transition>
                    <h2 class="text-2xl font-bold mb-6">Galeri Jurusan</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @forelse ($major->gallery ?? [] as $img)
                            <div class="aspect-video rounded-xl overflow-hidden group shadow-md">
                                <img src="{{ $img }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                            </div>
                        @empty
                            <p class="text-slate-500">Belum ada foto galeri.</p>
                        @endforelse
                    </div>
                </div>

            </div>
        </section>

        <section class="py-16 bg-white">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
                <h2 class="text-2xl font-bold mb-8">Jurusan Lainnya</h2>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($otherMajors as $m)
                        <a href="{{ route('public.jurusan.show', $m->slug) }}" class="swiper-slide mb-1">
                            <article class="bg-white rounded-lg shadow c-hover group">
                                <div class="w-full h-48 rounded-t-lg overflow-hidden">
                                    <img src="{{ asset($m->image) }}" alt="{{ $m->name }}" loading="lazy"
                                        class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110"">
                                </div>
                                <div class="flex flex-col space-y-1.5 p-6">
                                    <div
                                        class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-gray-200 hover:bg-secondary/80 w-fit mb-2">
                                        {{ $m->short_name }}</div>
                                    <h3 class="font-semibold tracking-tight text-lg">{{ $m->name }}</h3>
                                </div>
                                <div class="p-6 pt-0">
                                    <p class="text-sm text-body line-clamp-2">{{ $m->description }}
                                    </p>
                                </div>
                            </article>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

</x-app>
