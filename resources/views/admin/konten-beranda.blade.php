<x-app-layout>
    <x-slot:metaTitle>Halaman Konten Beranda</x-slot:metaTitle>
    <x-slot:metaDesc>Ini halaman cuma buat konten beranda aja</x-slot:metaDesc>
    <x-slot:title>Konten Beranda</x-slot:title>

    <div class="space-y-6" x-data="{ tab: 'hero' }">

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
                <form class="p-6 pt-0" action="{{ route('admin.beranda.hero') }}" method="POST">
                    @csrf
                    <div class="space-y-2">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Gambar
                            Background</label>
                        <x-image-upload name="background_image" :value="$hero->background_image ?? ''" folder="beranda/hero" aspect="video" />
                    </div>
                    <div class="mb-5">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Judul</label>
                        <input id="hero-title" type="text" name="title" value="{{ old('title', $hero->title ?? '') }}"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="SMK PGRI 6 Denpasar" />
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Subtitle</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle', $hero->subtitle ?? '') }}"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Mencetak Generasi Unggul dan Berkarakter" />
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Tagline</label>
                        <input type="text" name="tagline" value="{{ old('tagline', $hero->tagline ?? '') }}"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Siap Kerja, Cerdas, dan Kompetitif" />
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Teks Tombol CTA</label>
                            <input type="text" name="cta_text" value="{{ old('cta_text', $hero->cta_text ?? '') }}"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Daftar Sekarang" />
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Link Tombol CTA</label>
                            <input type="text" name="cta_link" value="{{ old('cta_link', $hero->cta_link ?? '') }}"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="/pendaftaran" />
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
                <form class="p-6 pt-0" action="{{ route('admin.beranda.about') }}" method="POST">
                    @csrf
                    <div class="space-y-2">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Gambar
                            Background</label>
                        <x-image-upload name="image" :value="$about->image ?? ''" folder="beranda/about" aspect="video" />
                    </div>
                    <div class="mb-5">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Judul
                            Section</label>
                        <input type="text" name="title" value="{{ old('title', $about->title ?? '') }}"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Tentang Sekolah Kami" />
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Deskripsi</label>
                        <input type="text" name="description" value="{{ old('description', $about->description ?? '') }}"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Deskripsi tentang sekolah" />
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Sejarah Sekolah</label>
                        <input type="text" name="history" value="{{ old('title', $about->history ?? '') }}"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Sejarah sekolah" />
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Visi</label>
                        <input type="text" name="vision" value="{{ old('title', $about->vision ?? '') }}"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Visi sekolah" />
                    </div>
                    <div x-data="missionField()" class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Misi</label>
                        <template x-for="(mission, index) in missions" :key="index">
                            <div class="flex gap-2 mb-2">
                                <input type="text" :name="'mission[' + index + ']'" x-model="missions[index]"
                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                    :placeholder="'Misi ' + (index + 1)">

                                <button type="button" @click="removeMission(index)"
                                    class="bg-red-500 text-white px-3 rounded">
                                    @svg('lucide-trash-2', 'h-4 w-4')
                                </button>
                            </div>
                        </template>

                        <button type="button" @click="addMission"
                            class="bg-gray-200 box-border border border-transparent inline-flex items-center  hover:bg-gray-300 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                            @svg('lucide-plus', 'h-4 w-4 me-2')
                            Tambah Misi
                        </button>
                    </div>
                    <div x-data="schoolValues()" class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Nilai-Nilai Sekolah</label>

                        <template x-for="(value, index) in values" :key="index">
                            <div class="flex gap-2 mb-2">

                                <input type="text" :name="'values[' + index + '][name]'" x-model="values[index][name]"
                                    placeholder="Nama nilai"
                                    class="w-1/3 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block px-3 py-2.5 shadow-xs placeholder:text-body">

                                <input type="text" :name="'values[' + index + '][description]'"
                                    x-model="values[index][description]" placeholder="Deskripsi nilai"
                                    class="flex-1 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body">

                                <button type="button" @click="removeValue(index)"
                                    class="bg-red-500 text-white px-3 rounded">
                                    @svg('lucide-trash-2', 'h-4 w-4')
                                </button>

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
                <form class="p-6 pt-0" action="{{ route('admin.beranda.principal') }}" method="POST">
                    @csrf
                    <div class="space-y-2">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Foto</label>
                        <x-image-upload name="photo" :value="$principal->photo ?? ''" folder="beranda/principal" aspect="video" />
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Nama Kepala Sekolah</label>
                            <input type="text" name="name" value="{{ old('name', $principal->name ?? '') }}"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Nama Kepala Sekolah" />
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">NIP</label>
                            <input type="text" name="nip" value="{{ old('nip', $principal->nip ?? '') }}"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="1965051..." />
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Jabatan</label>
                            <input type="text" name="position" value="{{ old('position', $principal->position ?? '') }}"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Kepala Sekolah" />
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Periode</label>
                            <input type="text" name="period" value="{{ old('period', $principal->period ?? '') }}"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="2020 - Sekarang" />
                        </div>
                    </div>
                    {{-- <div class="mb-5" x-data="{ principalProfile: @js($principal->photo ?? '') }">
                        <label class="block mb-2.5 text-sm font-medium text-heading">URL Foto</label>
                        <input type="text" x-model="principalProfile"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="https://..." />
                        <div class="mt-2" x-show="principalProfile" x-transition>
                            <img :src="principalProfile" alt="Preview"
                                class="mt-2 w-32 h-32 object-cover rounded-full"
                                x-on:error="$el.style.display = 'none'" x-on:load="$el.style.display = 'block'" />
                        </div>
                    </div> --}}
                    <div class="mb-5">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Teks
                            Sambutan</label>
                        <textarea id="sambutan-textarea" rows="4" name="message"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Teks sambutan sekolah...">{{ old('message', $principal->message ?? '') }}</textarea>
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

                <form class="p-6 pt-0 space-y-4" method="POST" action="{{ route('admin.beranda.stats') }}">
                    @csrf
                    @foreach ($stats as $stat)
                        <div class="grid sm:grid-cols-3 gap-4">

                            {{-- KEY (hidden, jangan diubah admin) --}}
                            <input type="hidden" name="stats[{{ $stat->key }}][key]" value="{{ old('key', $stat->key ?? '') }}">

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
                            </div>
                        </div>
                    @endforeach

                    <button type="submit" class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        @svg('lucide-save', 'h-4 w-4 me-1.5')
                        Simpan Statistik
                    </button>
                </form>
            </div>
        </div>
        </form>
        <div x-show="tab==='info'" x-transition>
            <div class="rounded-xl border border-default bg-neutral-primary-soft shadow-xs text-card-foreground">
                <div class="flex flex-col p-6">
                    <h3 class="text-2xl font-semibold tracking-tight">Informasi Sekolah</h3>
                    <p class="text-sm text-gray-500">Edit informasi kontak dan sosial media sekolah.
                    </p>
                </div>
                <form class="p-6 pt-0" method="POST" action="{{ route('admin.beranda.school') }}">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Nama Singkat</label>
                            <input type="text" name="short_name" value="{{ old('short_name', $school->short_name ?? '') }}"
                                class="bg-neutral-secondary-medium read-only:bg-neutral-secondary border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="SMK PGRI 6 Denpasar" />
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Nama Lengkap</label>
                            <input type="text" name="full_name" value="{{ old('full_name', $school->full_name ?? '') }}"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Sekolah Menengah Kejuruan PGRI 6 Denpasar" />
                        </div>
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Alamat</label>
                        <textarea type="text" name="address"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Alamat..." rows="3">{{ old('address', $school->address ?? '') }}</textarea>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Telepon</label>
                            <input type="text" name="phone" value="{{ old('phone', $school->phone ?? '') }}"
                                class="bg-neutral-secondary-medium read-only:bg-neutral-secondary border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="0361-123456" />
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Email</label>
                            <input type="text" name="email" value="{{ old('email', $school->email ?? '') }}"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="email@smkpgri6denpasar.sch.id" />
                        </div>
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Website</label>
                        <input type="text" name="website" value="{{ old('website', $school->website ?? '') }}"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="https://smkpgri6denpasar.sch.id" />
                    </div>
                    <div class="border-t border-default pt-4">
                        <h4 class="font-medium mb-4">Sosial Media</h4>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="mb-5">
                                <label class="block mb-2.5 text-sm font-medium text-heading">Facebook</label>
                                <input type="text" name="facebook" value="{{ old('facebook', $school->facebook ?? '') }}"
                                    class="bg-neutral-secondary-medium read-only:bg-neutral-secondary border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                    value="https://www.facebook.com/smkpgri6denpasar" />
                            </div>
                            <div class="mb-5">
                                <label class="block mb-2.5 text-sm font-medium text-heading">Instagram</label>
                                <input type="text" name="instagram" value="{{ old('instagram', $school->instagram ?? '') }}"
                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                    value="https://www.instagram.com/smkpgri6denpasar" />
                            </div>
                        </div>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="mb-5">
                                <label class="block mb-2.5 text-sm font-medium text-heading">YoutTube</label>
                                <input type="text" name="youtube" value="{{ old('youtube', $school->youtube ?? '') }}"
                                    class="bg-neutral-secondary-medium read-only:bg-neutral-secondary border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                    value="" />
                            </div>
                            <div class="mb-5">
                                <label class="block mb-2.5 text-sm font-medium text-heading">Twitter</label>
                                <input type="text" name="twitter" value="{{ old('twitter', $school->twitter ?? '') }}"
                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                    value="https://www.twitter.com/smkpgri6denpasar" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Link Map</label>
                        <input type="text" name="map_embed" value="{{ old('map_embed', $school->map_embed ?? '') }}"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="https://maps.google.com/?q=SMK PGRI 6 Denpasar" />
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
                missions: @json($about->mission ?? ['']),

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
                values: @json($about->values ?? [['name' => '', 'description' => '']]),

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
            .create(document.querySelector('#sambutan-textarea'))
            .catch(error => {
                console.error(error);
            });
    </script>

</x-app-layout>
