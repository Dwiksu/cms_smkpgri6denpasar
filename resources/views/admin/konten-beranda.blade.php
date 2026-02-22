<x-app-layout>
    <x-slot:title>Konten Beranda</x-slot:title>

    <div class="space-y-6" x-data="{ tab: '{{ session('tab') ?? 'hero' }}' }">

        <div>
            <h1 class="text-3xl font-bold">Kelola Konten Beranda</h1>
            <p class="text-gray-500">Edit konten yang ditampilkan di halaman utama website.</p>
        </div>

        {{-- TAB BUTTON --}}
        <div class="grid grid-cols-2 md:grid-cols-5 gap-2 bg-gray-100 p-1 rounded-lg text-sm text-gray-500">
            <button @click="tab='hero'" :class="tab === 'hero' ? 'bg-white shadow text-black' : ''"
                class="p-2 rounded">
                Hero
            </button>

            <button @click="tab='about'" :class="tab === 'about' ? 'bg-white shadow text-black' : ''"
                class="p-2 rounded">
                Tentang
            </button>

            <button @click="tab='principal'" :class="tab === 'principal' ? 'bg-white shadow text-black' : ''"
                class="p-2 rounded">
                Sambutan
            </button>

            <button @click="tab='stats'" :class="tab === 'stats' ? 'bg-white shadow text-black' : ''"
                class="p-2 rounded">
                Statistik
            </button>

            <button @click="tab='info'" :class="tab === 'info' ? 'bg-white shadow text-black' : ''"
                class="p-2 rounded">
                Info Sekolah
            </button>
        </div>

        <div x-show="tab==='hero'" x-transition>
            <div class="rounded-xl border border-default bg-neutral-primary-soft shadow-xs  text-card-foreground">
                <div class="flex flex-col p-6">
                    <p class="text-2xl font-semibold tracking-tight">Hero Section</p>
                    <p class="text-sm text-gray-500">Edit banner utama dan tagline di halaman beranda.
                    </p>
                </div>
                <form class="p-6 pt-0" action="{{ route('admin.beranda.hero') }}" method="POST" data-delay-submit>
                    @csrf
                    <div class="space-y-2 mb-5">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Gambar
                            Background <span class="text-red-500">*</span></label>
                        <x-image-upload name="hero[background_image]" :value="$hero->background_image ?? ''" folder="beranda/hero"
                            aspect="video" />
                        @error('hero.background_image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Judul <span
                                class="text-red-500">*</span></label>
                        <input id="hero-title" type="text" name="hero[title]" data-error-input
                            value="{{ old('hero.title', $hero->title ?? '') }}"
                            class="bg-neutral-secondary-medium border {{ errorBorder('hero.title') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="SMK PGRI 6 Denpasar" />
                        @error('hero.title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Subtitle <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="hero[subtitle]" data-error-input
                                value="{{ old('hero.subtitle', $hero->subtitle ?? '') }}"
                                class="bg-neutral-secondary-medium border {{ errorBorder('hero.subtitle') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Mencetak Generasi Unggul dan Berkarakter" />
                            @error('hero.subtitle')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Tagline</label>
                            <input type="text" name="hero[tagline]"
                                value="{{ old('hero.tagline', $hero->tagline ?? '') }}"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Siap Kerja, Cerdas, dan Kompetitif" />
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        @svg('lucide-save', 'h-4 w-4 me-1.5')
                        Simpan Hero</button>
                </form>
            </div>
        </div>
        <div x-show="tab==='about'" x-transition>
            <div class="rounded-xl border border-default bg-neutral-primary-soft shadow-xs text-card-foreground">
                <div class="flex flex-col p-6">
                    <h3 class="text-2xl font-semibold tracking-tight">Tentang Sekolah</h3>
                    <p class="text-sm text-gray-500">Edit informasi visi, misi, sejarah, dan nilai-nilai sekolah.
                    </p>
                </div>
                <form class="p-6 pt-0" action="{{ route('admin.beranda.about') }}" method="POST" data-delay-submit>
                    @csrf
                    <div class="space-y-2 mb-5">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Gambar
                            Background</label>
                        <x-image-upload name="about[image]" :value="$about->image ?? ''" folder="beranda/about" aspect="video" />
                        @error('about.image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Judul
                            Section <span class="text-red-500">*</span></label>
                        <input type="text" name="about[title]" data-error-input
                            value="{{ old('about.title', $about->title ?? '') }}"
                            class="bg-neutral-secondary-medium border {{ errorBorder('about.title') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Tentang Sekolah Kami" />
                        @error('about.title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Deskripsi <span
                                class="text-red-500">*</span></label>
                        <textarea rows="4" name="about[description]" data-error-input
                            class="bg-neutral-secondary-medium border {{ errorBorder('about.description') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Deskripsi tentang sekolah">{{ old('about.description', $about->description ?? '') }}</textarea>
                        @error('about.description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Sejarah Sekolah</label>
                        <textarea rows="4" name="about[history]" data-error-input
                            class="bg-neutral-secondary-medium border {{ errorBorder('about.history') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Sejarah sekolah">{{ old('about.history', $about->history ?? '') }}</textarea>
                        @error('about.history')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Visi <span
                                class="text-red-500">*</span></label>
                        <textarea rows="4" name="about[vision]" data-error-input
                            class="bg-neutral-secondary-medium border {{ errorBorder('about.vision') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Visi sekolah">{{ old('about.vision', $about->vision ?? '') }}</textarea>
                        @error('about.vision')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div x-data="missionField()" class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Misi <span
                                class="text-red-500">*</span></label>
                        <template x-for="(mission, index) in missions" :key="index">
                            <div class="flex gap-2 mb-2">
                                <input type="text" :name="'about[mission][' + index + ']'"
                                    x-model="missions[index]"
                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                    :placeholder="'Misi ' + (index + 1)">
                                <button type="button" @click="removeMission(index)"
                                    class="bg-red-500 text-white px-3 rounded">
                                    @svg('lucide-trash-2', 'h-4 w-4')
                                </button>
                            </div>
                        </template>
                        @error('about.mission.*')
                            <p class="my-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <button type="button" @click="addMission"
                            class="bg-gray-200 box-border border border-transparent inline-flex items-center  hover:bg-gray-300 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                            @svg('lucide-plus', 'h-4 w-4 me-2')
                            Tambah Misi
                        </button>
                    </div>
                    <div x-data="schoolValues()" class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Nilai-Nilai Sekolah</label>

                        <template x-for="(value, index) in values" :key="index">
                            <div class="flex flex-col gap-1 mb-3">

                                <div class="flex gap-2">
                                    <input type="text" :name="'about[values][' + index + '][name]'"
                                        x-model="values[index].name" placeholder="Nama nilai"
                                        class="w-1/3 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block px-3 py-2.5 shadow-xs placeholder:text-body" />

                                    <input type="text" :name="'about[values][' + index + '][description]'"
                                        x-model="values[index].description" placeholder="Deskripsi nilai"
                                        class="flex-1 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" />

                                    <button type="button" @click="removeValue(index)"
                                        class="bg-red-500 text-white px-3 rounded">
                                        @svg('lucide-trash-2', 'h-4 w-4')
                                    </button>
                                </div>
                            </div>
                        </template>


                        <button type="button" @click="addValue"
                            class="bg-gray-200 box-border border border-transparent inline-flex items-center  hover:bg-gray-300 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                            @svg('lucide-plus', 'h-4 w-4 me-2')
                            Tambah Nilai
                        </button>
                    </div>

                    <button type="submit"
                        class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        @svg('lucide-save', 'h-4 w-4 me-1.5')
                        Simpan Tentang Sekolah</button>
                </form>
            </div>
        </div>
        <div x-show="tab==='principal'" x-transition>
            <div class="rounded-xl border border-default bg-neutral-primary-soft shadow-xs text-card-foreground">
                <div class="flex flex-col p-6">
                    <h3 class="text-2xl font-semibold tracking-tight">Sambutan Kepala Sekolah</h3>
                    <p class="text-sm text-gray-500">Edit informasi dan sambutan kepala sekolah.</p>
                </div>
                <form class="p-6 pt-0" action="{{ route('admin.beranda.principal') }}" method="POST"
                    data-delay-submit>
                    @csrf
                    <div class="space-y-2 mb-5">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Foto <span
                                class="text-red-500">*</span></label>
                        <x-image-upload name="principal[photo]" :value="$principal->photo ?? ''" folder="beranda/principal"
                            aspect="video" />
                        @error('principal.photo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Nama Kepala Sekolah <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="principal[name]" data-error-input
                            value="{{ old('principal.name', $principal->name ?? '') }}"
                            class="bg-neutral-secondary-medium border {{ errorBorder('principal.name') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Nama Kepala Sekolah" />
                        @error('principal.name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Teks
                            Sambutan <span class="text-red-500">*</span></label>
                        <textarea id="sambutan-textarea" rows="4" name="principal[message]" data-error-input
                            class="bg-neutral-secondary-medium border {{ errorBorder('principal.position') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Teks sambutan sekolah...">{{ old('principal.message', $principal->message ?? '') }}</textarea>
                        @error('principal.message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        @svg('lucide-save', 'h-4 w-4 me-1.5')
                        Simpan Sambutan</button>
                </form>
            </div>
        </div>
        <div x-show="tab==='stats'" x-transition>
            <div class="rounded-xl border border-default bg-neutral-primary-soft shadow-xs text-card-foreground">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold">Statistik Sekolah</h3>
                    <p class="text-sm text-gray-500">Edit label & nilai statistik</p>
                </div>

                <form class="p-6 pt-0 space-y-4" method="POST" action="{{ route('admin.beranda.stats') }}"
                    data-delay-submit>
                    @csrf
                    @foreach ($stats as $stat)
                        <div class="grid sm:grid-cols-3 gap-4">

                            {{-- KEY (hidden, jangan diubah admin) --}}
                            <input type="hidden" name="stats[{{ $stat->key }}][key]"
                                value="{{ old('key', $stat->key ?? '') }}">

                            {{-- LABEL --}}
                            <div class="mb-5">
                                <label class="block mb-2.5 text-sm font-medium text-heading">Label</label>
                                <input type="text" name="stats[{{ $stat->key }}][label]"
                                    value="{{ old('label', $stat->label ?? '') }}"
                                    class="bg-neutral-secondary-medium read-only:bg-neutral-secondary border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                    readonly disabled>
                            </div>

                            {{-- VALUE --}}
                            <div class="mb-5 col-span-2">
                                <label class="block mb-2.5 text-sm font-medium text-heading">Value</label>
                                <input type="number" min="0" name="stats[{{ $stat->key }}][value]"
                                    value="{{ old('value', $stat->value ?? '') }}"
                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                                @error('stats.*.value')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    @endforeach

                    <button type="submit"
                        class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        @svg('lucide-save', 'h-4 w-4 me-1.5')
                        Simpan Statistik
                    </button>
                </form>
            </div>
        </div>
        <div x-show="tab==='info'" x-transition>
            <div class="rounded-xl border border-default bg-neutral-primary-soft shadow-xs text-card-foreground">
                <div class="flex flex-col p-6">
                    <h3 class="text-2xl font-semibold tracking-tight">Informasi Sekolah</h3>
                    <p class="text-sm text-gray-500">Edit informasi kontak dan sosial media sekolah.
                    </p>
                </div>
                <form class="p-6 pt-0" method="POST" action="{{ route('admin.beranda.school') }}"
                    data-delay-submit>
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Nama Singkat <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="short_name" data-error-input
                                value="{{ old('short_name', $school->short_name ?? '') }}"
                                class="bg-neutral-secondary-medium read-only:bg-neutral-secondary border {{ errorBorder('short_name') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="SMK PGRI 6 Denpasar" />
                            @error('short_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Nama Lengkap <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="full_name" data-error-input
                                value="{{ old('full_name', $school->full_name ?? '') }}"
                                class="bg-neutral-secondary-medium border {{ errorBorder('full_name') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Sekolah Menengah Kejuruan PGRI 6 Denpasar" />
                            @error('full_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Alamat <span
                                class="text-red-500">*</span></label>
                        <textarea type="text" name="address" data-error-input
                            class="bg-neutral-secondary-medium border {{ errorBorder('address') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Alamat..." rows="3">{{ old('address', $school->address ?? '') }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Telepon</label>
                            <input type="text" name="office_phone" data-error-input
                                value="{{ old('office_phone', $school->office_phone ?? '') }}"
                                class="bg-neutral-secondary-medium read-only:bg-neutral-secondary border {{ errorBorder('office_phone') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="0361-123456" />
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">WhatsApp Phone</label>
                            <input type="text" name="whatsapp_phone"
                                value="{{ old('whatsapp_phone', $school->whatsapp_phone ?? '') }}"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base
                       focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs"
                                placeholder="6281234567890" />
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Email</label>
                            <input type="text" name="email" data-error-input
                                value="{{ old('email', $school->email ?? '') }}"
                                class="bg-neutral-secondary-medium border {{ errorBorder('email') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="email@smkpgri6denpasar.sch.id" />
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Website</label>
                            <input type="text" name="website"
                                value="{{ old('website', $school->website ?? '') }}"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="https://..." />
                        </div>
                    </div>

                    <div class="border-t border-default pt-4">
                        <h4 class="font-medium mb-4">Sosial Media</h4>

                        <!-- FACEBOOK & INSTAGRAM -->
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="mb-5">
                                <label class="block mb-2.5 text-sm font-medium text-heading">Facebook</label>
                                <input type="text" name="facebook"
                                    value="{{ old('facebook', $school->facebook ?? '') }}"
                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base
                       focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs"
                                    placeholder="https://www.facebook.com/..." />
                            </div>

                            <div class="mb-5">
                                <label class="block mb-2.5 text-sm font-medium text-heading">Instagram</label>
                                <input type="text" name="instagram"
                                    value="{{ old('instagram', $school->instagram ?? '') }}"
                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base
                       focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs"
                                    placeholder="https://www.instagram.com/..." />
                            </div>
                        </div>

                        <!-- YOUTUBE & TIKTOK -->
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="mb-5">
                                <label class="block mb-2.5 text-sm font-medium text-heading">YouTube</label>
                                <input type="text" name="youtube"
                                    value="{{ old('youtube', $school->youtube ?? '') }}"
                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base
                       focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs"
                                    placeholder="https://www.youtube.com/..." />
                            </div>

                            <div class="mb-5">
                                <label class="block mb-2.5 text-sm font-medium text-heading">TikTok</label>
                                <input type="text" name="tiktok"
                                    value="{{ old('tiktok', $school->tiktok ?? '') }}"
                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base
                       focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs"
                                    placeholder="https://www.tiktok.com/@..." />
                            </div>
                        </div>

                        <!-- PPDB -->
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Link PPDB</label>
                            <input type="text" name="ppdb_link"
                                value="{{ old('ppdb_link', $school->ppdb_link ?? '') }}"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base
                   focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs"
                                placeholder="https://ppdb.smkpgri6denpasar.sch.id" />
                        </div>
                    </div>

                    <button type="submit"
                        class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        @svg('lucide-save', 'h-4 w-4 me-1.5')
                        Simpan Info Sekolah</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function missionField() {
            return {
                missions: @json(old('mission', $about->mission ?? [''])),

                addMission() {
                    this.missions.push('');
                },

                removeMission(index) {
                    this.missions.splice(index, 1);
                }
            }
        }

        function schoolValues() {
            return {
                values: @json(old('values', $values ?? [['name' => '', 'description' => '']])),

                addValue() {
                    this.values.push({
                        name: '',
                        description: ''
                    });
                },

                removeValue(index) {
                    this.values.splice(index, 1);
                }
            }
        }
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#sambutan-textarea'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'link', '|',
                    'bulletedList', 'numberedList', 'blockQuote', '|',
                    'undo', 'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });
    </script>

</x-app-layout>
