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
                <form class="p-6" action="{{ route('admin.kalender.store') }}" method="POST">
                    @csrf

                    <div class="mb-5">
                        <label for="calender-name" class="block mb-2.5 text-sm font-medium text-heading">Judul <span
                                class="text-red-500">*</span></label>
                        <input id="calender-name" name="title" type="text"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            required />
                    </div>
                    <div class="mb-5">
                        <label for="category-calender"
                            class="block mb-2.5 text-sm font-medium text-heading">Kategori</label>
                        <select name="category" id="teacher-jurusan"
                            class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                            <option value="akademik">Akademik</option>
                            <option value="kegiatan">Kegiatan</option>
                            <option value="libur">Libur</option>
                            <option value="ujian">Ujian</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="event-color" class="block mb-2.5 text-sm font-medium text-heading">
                            Warna Agenda
                        </label>

                        <div class="flex items-center gap-3">
                            <input type="color" id="event-color" name="color" value="#2563eb"
                                class="h-10 w-14 rounded-base border border-default-medium bg-neutral-secondary-medium cursor-pointer" />

                            <span class="text-sm text-gray-500">
                                Pilih warna untuk agenda
                            </span>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Tanggal Mulai <span
                                    class="text-red-500">*</span></label>

                            <div class="relative">
                                <input type="date" name="start_date" id="start_date"
                                    class="block w-full pe-3 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand px-3 py-2.5 shadow-xs placeholder:text-body"
                                    placeholder="Select date">
                            </div>

                        </div>
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Tanggal Selesai</label>
                            <div class="relative">
                                <input type="date" name="end_date" id="end_date"
                                    class="block w-full pe-3 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand px-3 py-2.5 shadow-xs placeholder:text-body"
                                    placeholder="Select date">
                            </div>

                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="calender-description"
                            class="block mb-2.5 text-sm font-medium text-heading">Deskripsi</label>
                        <textarea id="description" name="description" rows="4"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            required></textarea>
                    </div>

                    <button type="submit"
                        class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        @svg('lucide-save', 'h-4 w-4 me-1.5')
                        Simpan Agenda</button>
            </div>
        </div>
    </div>

    </div>

    <script>
        const startDate = document.getElementById('start_date');
        const endDate = document.getElementById('end_date');

        startDate.addEventListener('change', function() {
            endDate.min = this.value;

            if (!endDate.value || endDate.value < this.value) {
                endDate.value = this.value;
            }
        });
    </script>


</x-app-layout>
