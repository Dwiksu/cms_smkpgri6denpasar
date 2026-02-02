<x-app-layout>
    <x-slot:metaTitle>Halaman Kalender</x-slot:metaTitle>
    <x-slot:metaDesc>Ini halaman cuma buat kalender aja</x-slot:metaDesc>
    <x-slot:title>Kalender</x-slot:title>

    <div class="space-y-6">

        <div>
            <h1 class="text-3xl font-bold">Tambah Agenda</h1>
            <p class="text-gray-500">Tambah agenda baru.</p>
        </div>

        <div>
            <div class="rounded-xl border border-default bg-neutral-primary-soft shadow-xs  text-card-foreground">
                <form class="p-6" action="" method="POST">
                    @csrf

                    <div class="mb-5">
                        <label for="teacher-name" class="block mb-2.5 text-sm font-medium text-heading">Judul <span
                                class="text-red-500">*</span></label>
                        <input id="teacher-name" name="name" type="text"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            required />
                    </div>
                    <div class="mb-5">
                        <label for="teacher-jurusan"
                            class="block mb-2.5 text-sm font-medium text-heading">Kategori</label>
                        <select name="major" id="teacher-jurusan"
                            class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                            <option value="1">Akademik</option>
                            <option value="2">Kegiatan</option>
                            <option value="3">Libur</option>
                            <option value="4">Ujian</option>
                        </select>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Tanggal Mulai <span
                                    class="text-red-500">*</span></label>

                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    @svg('lucide-calendar', 'w-4 h-4')
                                </div>
                                <input type="date"
                                    class="block w-full ps-9 pe-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand px-3 py-2.5 shadow-xs placeholder:text-body"
                                    placeholder="Select date" readonly>
                            </div>

                        </div>
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Tanggal Selesai</label>

                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    @svg('lucide-calendar', 'w-4 h-4')
                                </div>
                                <input type="date"
                                    class="block w-full ps-9 pe-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand px-3 py-2.5 shadow-xs placeholder:text-body"
                                    placeholder="Select date" readonly>
                            </div>

                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="teacher-pendidikan"
                            class="block mb-2.5 text-sm font-medium text-heading">Deskripsi</label>
                        <textarea id="teacher-pendidikan" name="description" rows="4"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            required></textarea>
                    </div>

                    <button type="submit"
                        class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        @svg('lucide-save', 'h-4 w-4 me-1.5')
                        Simpan Berita</button>
            </div>
        </div>
    </div>

    </div>

</x-app-layout>
