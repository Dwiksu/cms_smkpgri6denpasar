<x-app-layout>
    <x-slot:title>Berita</x-slot:title>

    <div class="space-y-6">

        <div>
            <h1 class="text-3xl font-bold">{{ isset($news) ? 'Edit' : 'Tambah' }} Berita</h1>
            <p class="text-gray-500 mt-1">{{ isset($news) ? 'Update' : 'Tambah' }} berita dan pengumuman.</p>
        </div>

        <div>
            <div class="rounded-xl border border-default bg-neutral-primary-soft shadow-xs  text-card-foreground">
                <form class="p-6"
                    action="{{ isset($news) ? route('admin.berita.update', $news->id) : route('admin.berita.store') }}"
                    method="POST" data-delay-submit>
                    @csrf

                    @if (isset($news))
                        @method('PUT')
                    @endif

                    <div class="space-y-2 mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Gambar <span
                                class="text-red-500">*</span></label>
                        <x-image-upload name="image" :value="$news->image ?? ''" folder="hero" aspect="video" />
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Judul <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="title" data-error-input
                            value="{{ old('title', $news->title ?? '') }}"
                            class="bg-neutral-secondary-medium border {{ errorBorder('title') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Judul berita" />
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid sm:grid-cols-3 gap-4">
                        <div class="mb-5 col-span-2">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Kategori <span
                                    class="text-red-500">*</span></label>
                            <select name="category" id="" value="{{ old('category', $news->category ?? '') }}"
                                class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                                <option value="berita"
                                    {{ old('category', $news->category ?? '') == 'berita' ? 'selected' : '' }}>
                                    Berita
                                </option>

                                <option value="pengumuman"
                                    {{ old('category', $news->category ?? '') == 'pengumuman' ? 'selected' : '' }}>
                                    Pengumuman
                                </option>

                                <option value="prestasi"
                                    {{ old('category', $news->category ?? '') == 'prestasi' ? 'selected' : '' }}>
                                    Prestasi
                                </option>

                                <option value="kegiatan"
                                    {{ old('category', $news->category ?? '') == 'kegiatan' ? 'selected' : '' }}>
                                    Kegiatan
                                </option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Tanggal Publikasi</label>

                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    @svg('lucide-calendar', 'w-4 h-4')
                                </div>
                                <input type="date"
                                    value="{{ old(
                                        'published_at',
                                        isset($news) ? \Carbon\Carbon::parse($news->published_at)->format('Y-m-d') : now()->format('Y-m-d'),
                                    ) }}"
                                    name="published_at"
                                    class="block w-full ps-9 pe-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand px-3 shadow-xs placeholder:text-body"
                                    placeholder="Select date" readonly>
                            </div>

                        </div>
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Ringkasan <span
                                class="text-red-500">*</span></label>
                        <textarea type="text" name="excerpt" data-error-input=""
                            class="bg-neutral-secondary-medium border {{ errorBorder('excerpt') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Ringkasan singkat berita" rows="3">{{ old('excerpt', $news->excerpt ?? '') }}</textarea>
                        @error('excerpt')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Konten <span
                                class="text-red-500">*</span></label>
                        <textarea type="text" id="konten-berita-textarea" name="content" 
                            class="bg-neutral-secondary-medium border {{ errorBorder('content') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Konten berita" rows="5">{{ old('content', $news->content ?? '') }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        @svg('lucide-save', 'h-4 w-4 me-1.5')
                        {{ isset($news) ? 'Update' : 'Tambah' }} Berita</button>
                </form>
            </div>
        </div>

    </div>

    {{-- CKEditor --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#konten-berita-textarea'), {
                ckfinder: {
                    uploadUrl: "{{ route('admin.berita.store.content.image') }}?_token={{ csrf_token() }}"
                },
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'link', '|',
                    'bulletedList', 'numberedList', 'blockQuote', '|',
                    'undo', 'redo', '|',
                    'uploadImage', 'insertTable'
                ],
                mediaEmbed: {
                    previewsInData: true
                }
            }).then(editor => {
                editor.model.document.on('change:data', () => {
                    const textarea = document.querySelector('#konten-berita-textarea');

                    textarea.classList.remove(
                        "bg-red-50",
                        "border-red-100",
                        "focus:border-red-300",
                        "focus:ring-red-300"
                    );

                    textarea.classList.add("border-default-medium");
                });
            }).catch(console.error);
    </script>

</x-app-layout>
