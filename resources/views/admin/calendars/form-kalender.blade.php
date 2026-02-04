<x-app-layout>
    <x-slot:metaTitle>Halaman Kalender</x-slot:metaTitle>
    <x-slot:metaDesc>Ini halaman cuma buat kalender aja</x-slot:metaDesc>
    <x-slot:title>Kalender</x-slot:title>

    <div class="space-y-6">

        <div>
            <h1 class="text-3xl font-bold">{{ isset($event) ? 'Edit' : 'Tambah' }} Agenda</h1>
            <p class="text-gray-500 mt-1">{{ isset($event) ? 'Edit' : 'Tambah' }} agenda baru.</p>
        </div>

        <div>
            <div class="rounded-xl border border-default bg-neutral-primary-soft shadow-xs  text-card-foreground">
                <form class="p-6"
                    action="{{ isset($event) ? route('admin.kalender.update', $event->id) : route('admin.kalender.store') }}"
                    method="POST" data-delay-submit>
                    @csrf

                    @if (isset($event))
                        @method('PUT')
                    @endif

                    <div class="mb-5">
                        <label for="calender-name" class="block mb-2.5 text-sm font-medium text-heading">Judul <span
                                class="text-red-500">*</span></label>
                        <input id="calender-name" name="title" type="text"
                            value="{{ old('title', $event->title ?? '') }}"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            required />
                    </div>
                    <div class="mb-5">
                        <label for="category-calender"
                            class="block mb-2.5 text-sm font-medium text-heading">Kategori</label>
                        <select name="category" id="teacher-jurusan"
                            class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                            <option value="akademik"
                                {{ old('category', $event->category ?? '') == 'akademik' ? 'selected' : '' }}>
                                Akademik
                            </option>

                            <option value="kegiatan">
                                {{ old('category', $event->category ?? '') == 'kegiatan' ? 'selected' : '' }}
                                Kegiatan
                            </option>

                            <option value="libur">
                                {{ old('category', $event->category ?? '') == 'libur' ? 'selected' : '' }}
                                Libur
                            </option>

                            <option value="ujian">
                                {{ old('category', $event->category ?? '') == 'ujian' ? 'selected' : '' }}
                                Ujian
                            </option>

                        </select>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Tanggal Mulai <span
                                    class="text-red-500">*</span></label>

                            <div class="relative">
                                <input type="date" name="start_date" id="start_date"
                                    value="{{ old('start_date', isset($event) ? \Carbon\Carbon::parse($event->start_date)->format('Y-m-d') : '') }}"
                                    class="block w-full pe-3 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand px-3 py-2.5 shadow-xs placeholder:text-body"
                                    placeholder="Select date">
                            </div>

                        </div>
                        <div class="mb-5">
                            <label class="block mb-2.5 text-sm font-medium text-heading">Tanggal Selesai</label>
                            <div class="relative">
                                <input type="date" name="end_date" id="end_date" value="{{ old('end_date', isset($event) ? \Carbon\Carbon::parse($event->end_date)->format('Y-m-d') : '') }}"
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
                            required>{{ old('description', $event->description ?? '') }}</textarea>
                    </div>

                    <button type="submit"
                        class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        @svg('lucide-save', 'h-4 w-4 me-1.5')
                        {{ isset($event) ? 'Update' : 'Tambah' }} Agenda</button>
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
