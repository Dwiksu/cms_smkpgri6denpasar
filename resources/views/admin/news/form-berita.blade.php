<x-app-layout>
    <x-slot:metaTitle>Halaman Berita</x-slot:metaTitle>
    <x-slot:metaDesc>Ini halaman cuma buat berita aja</x-slot:metaDesc>
    <x-slot:title>Berita</x-slot:title>

    <div class="space-y-6">

        <div>
            <h1 class="text-3xl font-bold">Tambah Berita</h1>
            <p class="text-gray-500">Tambah berita dan pengumuman.</p>
        </div>

        <div>
            <div class="rounded-xl border border-default bg-neutral-primary-soft shadow-xs  text-card-foreground">
                <div class="p-6">
                    <div class="space-y-2">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Gambar</label>
                        <x-image-upload name="hero_background" :value="$hero->background_image ?? ''" folder="hero" aspect="video" />
                    </div>
                    <div class="mb-5">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Judul <span
                                class="text-red-500">*</span></label>
                        <input id="hero-title" type="text"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Judul berita" required />
                    </div>
                    <div class="grid sm:grid-cols-3 gap-4">
                        <div class="mb-5 col-span-2">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Kategori <span
                                    class="text-red-500">*</span></label>
                            <select name="" id=""
                                class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                                <option value="">Berita</option>
                                <option value="">Pengumuman</option>
                                <option value="">Prestasi</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Tanggal Publikasi</label>

                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    @svg('lucide-calendar', 'w-4 h-4')
                                </div>
                                <input type="date" value="{{ now()->format('Y-m-d') }}"
                                    class="block w-full ps-9 pe-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand px-3 py-2.5 shadow-xs placeholder:text-body"
                                    placeholder="Select date" readonly>
                            </div>

                        </div>
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Ringkasan <span
                                class="text-red-500">*</span></label>
                        <textarea type="text"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Ringkasan singkat berita" rows="3"></textarea>
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Konten</label>
                        <textarea type="text" id="konten-berita-textarea"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Konten berita" rows="5"></textarea>
                    </div>

                    <button type="submit"                         class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        @svg('lucide-save', 'h-4 w-4 me-1.5')
                        Simpan Berita</button>
                </div>
            </div>
        </div>

    </div>

    {{-- CKEditor --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#konten-berita-textarea'))
            .catch(error => {
                console.error(error);
            });
    </script>

</x-app-layout>
