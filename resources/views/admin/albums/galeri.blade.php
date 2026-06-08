<x-app-layout>
    <x-slot:title>Galeri</x-slot:title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div class="space-y-6" x-data="{
        album: modalAlbum(),
        photo: modalPhoto(),
        caption: modalCaption()
    }">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="font-display text-3xl font-bold">Kelola Galeri</h1>
                <p class="text-gray-500">Kelola album dan foto galeri sekolah.</p>
            </div>
            <button type="button" @click="album.openCreate()"
                class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                @svg('lucide-plus', 'h-4 w-4 me-1.5')
                Tambah Album</b>
        </div>

        <div class="space-y-8">
            @if (count($albums) > 0)
                @foreach ($albums as $album)
                    <div class="rounded-lg border border-default bg-white shadow-sm" x-data="{ showAll: false }">
                        <div class="space-y-1.5 p-6 flex flex-row items-start justify-between gap-4">
                            <div class="flex gap-4">
                                <img src={{ $album['cover_image'] }} alt={{ $album['name'] }}
                                    class="w-24 h-24 object-cover rounded-lg" />
                                <div>
                                    <CardTitle class="text-xl font-semibold leading-none tracking-tight">
                                        {{ $album['name'] }}</CardTitle>
                                    @if ($album['description'])
                                        <p class="text-sm text-gray-500 mt-1">{{ $album['description'] }}</p>
                                    @endif
                                    <div
                                        class="bg-brand-softer text-xs font-medium px-1.5 py-0.5 rounded-full inline-flex items-center mt-2">
                                        @svg('lucide-image', 'h-3 w-3 mr-1')
                                        {{ count($album['photos']) }} foto
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button type="button" @click="photo.openCreate({{ json_encode($album) }})"
                                    class="bg-disabled box-border border border-gray-200 inline-flex items-center  hover:bg-amber-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                    @svg('lucide-plus', 'h-4 w-4 me-1') Tambah Foto</button>
                                <button type="button" @click="album.openEdit({{ json_encode($album) }})"
                                    class="bg-disabled box-border border border-gray-200 inline-flex items-center  hover:bg-amber-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                    @svg('lucide-pencil', 'h-4 w-4')</button>

                                <form action="{{ route('admin.galeri.destroy', $album) }}" method="POST"
                                    class="delete-form" data-confirm="Hapus galeri {{ $album->name }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white bg-red-500 box-border border border-fg-disabled inline-flex items-center  hover:bg-red-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                        @svg('lucide-trash-2', 'h-4 w-4')</button>
                                </form>
                            </div>
                        </div>
                        <div class="p-6 pt-0">
                            @if (count($album['photos']) > 0)
                                <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-2">
                                    @foreach ($album['photos'] as $index => $photo)
                                        <div class="relative group aspect-square"
                                            x-show="showAll || {{ $index }} < 6" x-transition>
                                            <img src="{{ $photo['url'] }}" alt="{{ $photo['caption'] ?? 'Photo' }}"
                                                class="w-full h-full object-cover rounded" />
                                            <div x-show="showAll || {{ $index }} !== 5"
                                                class="absolute inset-0 bg-gray-800/50 opacity-0 group-hover:opacity-100 transition-opacity rounded flex items-center justify-center gap-1">
                                                <button type="button"
                                                    @click="caption.openEdit({{ json_encode($photo) }})"
                                                    class="bg-disabled box-border border border-gray-200 inline-flex items-center  hover:bg-disabled/90 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                                    @svg('lucide-pencil', 'h-3 w-3')</button>

                                                <form action="{{ route('admin.photo.destroy', $photo) }}"
                                                    method="POST" class="delete-form"
                                                    data-confirm="Hapus foto pada album {{ $photo->album->name }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-white bg-red-500 box-border border border-fg-disabled inline-flex items-center  hover:bg-red-500/90 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                                        @svg('lucide-trash-2', 'h-3 w-3')</button>
                                                </form>
                                            </div>
                                            @if ($index === 5 && count($album['photos']) > 6)
                                                <div x-show="!showAll" @click="showAll = true"
                                                    class="absolute inset-0 bg-black/70 text-white flex items-center justify-center text-2xl font-semibold rounded cursor-pointer z-20">
                                                    +{{ count($album['photos']) - 6 }}
                                                </div>
                                            @endif
                                            @if (isset($photo['caption']))
                                                <div
                                                    class="absolute bottom-0 left-0 right-0 bg-gray-800/70 text-white text-xs p-1 truncate rounded-b">
                                                    {{ $photo['caption'] }}
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                @if (count($album['photos']) > 6)
                                    <div class="mt-3 text-center" x-show="showAll">
                                        <button type="button" @click="showAll = false"
                                            class="text-sm text-gray-500 hover:underline">
                                            Tampilkan lebih sedikit
                                        </button>
                                    </div>
                                @endif
                            @else
                                <p class="text-sm text-gray-500 text-center py-4">
                                    Belum ada foto dalam album ini. Klik "Tambah Foto" untuk menambahkan.
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-12">
                    <Images class="h-12 w-12 text-gray-500 mx-auto mb-4" />
                    <p class="text-gray-500">Belum ada album. Buat album baru untuk memulai.</p>
                </div>
            @endif
        </div>
        <div x-show="album.open" class="fixed inset-0 w-full h-full bg-black/50 flex items-center justify-center"
            x-cloak>
            <div
                class="rounded-xl border border-default bg-neutral-primary-soft shadow-xs text-card-foreground w-full max-w-md">
                <div class="flex flex-col p-6">
                    <p class="text-2xl font-semibold tracking-tight"
                        x-text="album.isEdit ? 'Edit Album' : 'Tambah Album'">
                    </p>
                    <p class="text-sm text-gray-500"
                        x-text="album.isEdit ? 'Ubah informasi album di bawah ini.' : 'Isi formulir untuk membuat album baru.' ">
                    </p>
                </div>
                <form class="p-6 pt-0" :action="album.formAction" method="POST" data-delay-submit>
                    @csrf
                    <template x-if="album.isEdit">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" x-model="album.form.id">
                    </template>
                    <div class="space-y-2">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Foto Sampul <span
                                class="text-red-500">*</span></label>
                        <x-image-upload name="cover_image" folder="album/cover" aspect="video"
                            x-model="album.form.cover_image" />
                        @error('cover_image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Nama Album <span
                                class="text-red-500">*</span></label>
                        <input id="hero-title" type="text" name="name" data-error-input
                            class="bg-neutral-secondary-medium border {{ errorBorder('name') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Nama Album" x-model="album.form.name" />
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Deskripsi</label>
                        <textarea type="text" name="description" data-error-input
                            class="bg-neutral-secondary-medium border {{ errorBorder('description') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Deskripsi album" rows="3" x-model="album.form.description"></textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-2">
                        <button type="button" @click="album.closeModal()"
                            class="bg-disabled box-border border border-transparent inline-flex items-center  hover:bg-amber-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                            Batal</button>
                        <button type="submit"
                            class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                            Simpan</button>
                    </div>
                </form>
            </div>

        </div>
        <div x-show="photo.open" class="fixed inset-0 w-full h-full bg-black/50 flex items-center justify-center"
            x-cloak>
            <div
                class="rounded-xl border border-default bg-neutral-primary-soft shadow-xs text-card-foreground w-full max-w-md">
                <div class="flex flex-col p-6">
                    <p class="text-2xl font-semibold tracking-tight">
                        Tambah Foto ke Album
                    </p>
                    <p class="text-sm text-gray-500">
                        Upload foto-foto untuk ditambahkan ke album "<span x-text="photo.album_name"></span>".
                    </p>
                </div>
                <form class="p-6 pt-0" :action="photo.formAction" method="POST" data-delay-submit>
                    @csrf
                    <input type="hidden" name="gallery_album_id" x-model="photo.form.gallery_album_id">
                    <div class="space-y-2">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Foto
                            <span class="text-red-500">*</span></label>
                        <x-multiple-image-upload name="url" folder="album/photo" aspect="video" />
                        @error('url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-2">
                        <button type="button" @click="photo.closeModal()"
                            class="bg-disabled box-border border border-transparent inline-flex items-center  hover:bg-amber-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                            Batal</button>
                        <button type="submit"
                            class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                            Tambah</button>
                    </div>
                </form>
            </div>

        </div>
        <div x-show="caption.open" class="fixed inset-0 w-full h-full bg-black/50 flex items-center justify-center"
            x-cloak>
            <div
                class="rounded-xl border border-default bg-neutral-primary-soft shadow-xs text-card-foreground w-full max-w-md">
                <div class="flex flex-col p-6">
                    <p class="text-2xl font-semibold tracking-tight">
                        Edit Caption Foto
                    </p>
                </div>
                <form class="p-6 pt-0" :action="caption.formAction" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="gallery_album_id" x-model="caption.form.gallery_album_id">
                    <input type="hidden" name="url" x-model="caption.form.url">
                    <img :src="caption.form.url" alt="" class="w-full max-h-48 object-contain rounded" />
                    <div class="my-5">
                        <label for="caption" class="block mb-2.5 text-sm font-medium text-heading">Caption</label>
                        <input id="caption" type="text" name="caption"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            x-model="caption.form.caption" />
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" @click="caption.closeModal()"
                            class="bg-disabled box-border border border-transparent inline-flex items-center  hover:bg-amber-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                            Batal</button>
                        <button type="submit"
                            class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                            Tambah</button>
                    </div>
                </form>
            </div>

        </div>
    </div>



    <script>
        function modalAlbum() {
            return {
                open: false,
                isEdit: false,

                formAction: '',
                form: {
                    id: null,
                    cover_image: '',
                    name: '',
                    description: ''
                },

                openCreate() {
                    this.isEdit = false
                    this.formAction = "{{ route('admin.galeri.create') }}"

                    this.form = {
                        id: null,
                        cover_image: '',
                        name: '',
                        description: ''
                    }

                    this.open = true
                },

                openEdit(item) {
                    this.isEdit = true
                    this.formAction = `/cp-smkpgri-6/galeri/update/${item.id}`

                    this.form = {
                        ...item
                    }

                    this.open = true
                },

                closeModal() {
                    this.open = false
                    this.form = {
                        ...initialState
                    }
                }
            }
        }

        function modalPhoto() {
            return {
                open: false,
                album_name: '',

                formAction: '',
                form: {
                    gallery_album_id: null,
                    url: '',
                },

                openCreate(album) {
                    this.album_name = album.name
                    this.formAction = "{{ route('admin.photo.create') }}"

                    this.form = {
                        gallery_album_id: album.id,
                        url: '',
                    }

                    this.open = true
                },

                closeModal() {
                    this.open = false
                    this.form = {
                        ...initialState
                    }
                }
            }
        }

        function modalCaption() {
            return {
                open: false,

                formAction: '',
                form: {
                    gallery_album_id: null,
                    url: '',
                    caption: '',
                },

                openEdit(photo) {
                    this.formAction = "/cp-smkpgri-6/galeri/photo/update/" + photo.id

                    this.form = {
                        gallery_album_id: photo.gallery_album_id,
                        url: photo.url,
                        caption: photo.caption,
                    }

                    this.open = true
                },

                closeModal() {
                    this.open = false
                    this.form = {
                        ...initialState
                    }
                }
            }
        }
    </script>


</x-app-layout>
