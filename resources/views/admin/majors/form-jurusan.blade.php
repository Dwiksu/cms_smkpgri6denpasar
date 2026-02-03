<x-app-layout>
    <x-slot:metaTitle>Halaman Jurusan</x-slot:metaTitle>
    <x-slot:metaDesc>Ini halaman cuma buat jurusan aja</x-slot:metaDesc>
    <x-slot:title>Jurusan</x-slot:title>

    <div class="space-y-6">

        <div>
            <h1 class="text-3xl font-bold">Tambah Jurusan</h1>
            <p class="text-gray-500">Tambahkan jurusan baru ke dalam sistem.</p>
        </div>

        <div>
            <div class="rounded-xl border border-default bg-neutral-primary-soft shadow-xs text-card-foreground">
                <form class="p-6" action="{{ route('admin.jurusan.store') }}" method="POST">
                    @csrf
                    <div class="space-y-2">
                        <label for="background_jurusan" class="block mb-2.5 text-sm font-medium text-heading">Gambar
                            Background</label>
                        <x-image-upload name="image" :value="$major->image ?? ''" folder="major" aspect="video" />
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Nama Jurusan</label>
                            <input type="text" name="name"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Teknik Sepeda Motor" />
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Kode Singkat</label>
                            <input type="text" name="short_name"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="TSM" />
                        </div>
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Deskripsi Singkat</label>
                        <input type="text" name="description"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Deskripsi singkat jurusan" />
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Deskripsi Lengkap</label>
                        <textarea type="text" id="major-description-textarea" name="full_description"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Deskripsi Lengkap Jurusan"></textarea>
                    </div>
                    <div x-data="curriculumField()" class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Kurikulum</label>
                        <template x-for="(k, index) in kurikulum" :key="index">
                            <div class="flex gap-2 mb-2">
                                <input type="text" :name="'curriculum[' + index + ']'" x-model="kurikulum[index]"
                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                    :placeholder="'Kurikulum ' + (index + 1)">

                                <button type="button" @click="removeKurikulum(index)"
                                    class="bg-red-500 text-white px-3 rounded">
                                    @svg('lucide-trash-2', 'h-4 w-4')
                                </button>
                            </div>
                        </template>

                        <button type="button" @click="addKurikulum"
                            class="bg-gray-200 box-border border border-transparent inline-flex items-center  hover:bg-gray-300 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                            @svg('lucide-plus', 'h-4 w-4 me-2')
                            Tambah Kurikulum
                        </button>
                    </div>
                    <div x-data="prospectusField()" class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Prospek Karir</label>
                        <template x-for="(p, index) in prospek" :key="index">
                            <div class="flex gap-2 mb-2">
                                <input type="text" :name="'careers[' + index + ']'" x-model="prospek[index]"
                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                    :placeholder="'Prospek Karir ' + (index + 1)">
                                <button type="button" @click="removeProspek(index)"
                                    class="bg-red-500 text-white px-3 rounded">
                                    @svg('lucide-trash-2', 'h-4 w-4')
                                </button>
                            </div>
                        </template>

                        <button type="button" @click="addProspek"
                            class="bg-gray-200 box-border border border-transparent inline-flex items-center  hover:bg-gray-300 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                            @svg('lucide-plus', 'h-4 w-4 me-2')
                            Tambah Karir
                        </button>
                    </div>
                    <div x-data="prestationField()" class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Prestasi</label>

                        <template x-for="(p, index) in prestasi" :key="index">
                            <div class="flex gap-2 mb-2">

                                <input type="text" :name="'achievements[' + index + '][name]'" x-model="prestasi[index]"
                                    :placeholder="'Prestasi ' + (index + 1)"
                                    class="w-full bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block px-3 py-2.5 shadow-xs placeholder:text-body">

                                <button type="button" @click="removePrestasi(index)"
                                    class="bg-red-500 text-white px-3 rounded">
                                    @svg('lucide-trash-2', 'h-4 w-4')
                                </button>

                            </div>
                        </template>

                        <button type="button" @click="addPrestasi"
                            class="bg-gray-200 box-border border border-transparent inline-flex items-center  hover:bg-gray-300 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                            @svg('lucide-plus', 'h-4 w-4 me-2')
                            Tambah Prestasi
                        </button>
                    </div>

                    <div class="space-y-2">
                        <label for="background_jurusan"
                            class="block mb-2.5 text-sm font-medium text-heading">Galeri</label>
                        <x-multiple-image-upload name="gallery" :value="$major->gallery ?? ''" folder="jurusan"
                            aspect="video" />
                    </div>

                    <button type="submit"
                        class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        @svg('lucide-save', 'h-4 w-4 me-1.5')
                        Simpan Jurusan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function prestationField() {
            return {
                prestasi: @json(old('prestasi', $major->achievements ?? [''])),

                addPrestasi() {
                    this.prestasi.push('');
                },

                removePrestasi(index) {
                    this.prestasi.splice(index, 1);
                }
            }
        }

        function prospectusField() {
            return {
                prospek: @json(old('prospek',$major->careers ?? [''])),

                addProspek() {
                    this.prospek.push('');
                },

                removeProspek(index) {
                    this.prospek.splice(index, 1);
                }
            }
        }

        function curriculumField() {
            return {
                kurikulum: @json(old('kurikulum', $major->curriculum ?? [''])),

                addKurikulum() {
                    this.kurikulum.push('');
                },

                removeKurikulum(index) {
                    this.kurikulum.splice(index, 1);
                }
            }
        }
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#major-description-textarea'))
            .catch(error => {
                console.error(error);
            });
    </script>

</x-app-layout>
