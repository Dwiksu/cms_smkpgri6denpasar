<x-app-layout>
    <x-slot:title>Profil Guru</x-slot:title>

    <div class="space-y-6">

        <div>
            <h1 class="text-3xl font-bold">{{ isset($teacher) ? 'Edit' : 'Tambah' }} Profil Guru</h1>
            <p class="text-gray-500 mt-1">{{ isset($teacher) ? 'Edit' : 'Tambah' }} profil guru baru.</p>
        </div>

        <div>
            <div class="rounded-xl border border-default bg-neutral-primary-soft shadow-xs  text-card-foreground">
                <form class="p-6"
                    action="{{ isset($teacher) ? route('admin.profil.update', $teacher->id) : route('admin.profil.store') }}"
                    method="POST" data-delay-submit>
                    @csrf

                    @if (isset($teacher))
                        @method('PUT')
                    @endif

                    <div class="space-y-2 mb-5">
                        <label for="hero-title" class="block mb-2.5 text-sm font-medium text-heading">Foto</label>
                        <x-image-upload name="photo" :value="$teacher->photo ?? ''" folder="guru" aspect="video" />
                        @error('photo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label for="teacher-name" class="block mb-2.5 text-sm font-medium text-heading">Nama <span
                                    class="text-red-500">*</span></label>
                            <input id="teacher-name" name="name" type="text" data-error-input
                                value="{{ old('name', $teacher->name ?? '') }}"
                                class="bg-neutral-secondary-medium border {{ errorBorder('name') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" />
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="teacher-jabatan"
                                class="block mb-2.5 text-sm font-medium text-heading">Jabatan</label>
                            <input id="teacher-jabatan" name="position" type="text" data-error-input
                                value="{{ old('position', $teacher->position ?? '') }}"
                                class="bg-neutral-secondary-medium border {{ errorBorder('position') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" />
                            @error('position')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label for="teacher-mapel" class="block mb-2.5 text-sm font-medium text-heading">Mata
                                Pelajaran</label>
                            <input id="teacher-mapel" name="subject" type="text"
                                value="{{ old('subject', $teacher->subject ?? '') }}"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" />
                        </div>
                        <div class="mb-5">
                            <label for="teacher-jurusan"
                                class="block mb-2.5 text-sm font-medium text-heading">Jurusan</label>
                            <select name="major_id" id="teacher-jurusan"
                                class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                                <option value="">Umum</option>
                                @forelse ($majors as $m)
                                    <option value="{{ $m->id }}"
                                        {{ old('major_id', $teacher->major_id ?? '') == $m->id ? 'selected' : '' }}>
                                        {{ $m->name }}
                                    </option>
                                @empty
                                    <p>Tidak ada jurusan</p>
                                @endforelse

                            </select>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        @svg('lucide-save', 'h-4 w-4 me-1.5')
                        {{ isset($teacher) ? 'Update' : 'Tambah' }} Guru</button>
                </form>
            </div>
        </div>
    </div>

    </div>

</x-app-layout>
