<x-app-layout>
    <x-slot:metaTitle>Halaman Jurusan</x-slot:metaTitle>
    <x-slot:metaDesc>Ini halaman cuma buat jurusan aja</x-slot:metaDesc>
    <x-slot:title>Jurusan</x-slot:title>

    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="font-display text-3xl font-bold">Kelola Jurusan</h1>
                <p class="text-gray-500">Tambah, edit, atau hapus program keahlian.</p>
            </div>
            <a href="{{ route('jurusan.create.admin') }}"
                class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                @svg('lucide-plus', 'h-4 w-4 me-1.5')
                Tambah Jurusan</a>
        </div>

        {{-- Search --}}
        <div class="max-w-md relative">
            <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    @svg('lucide-search', 'w-4 h-4 text-body')
                </div>
                <input type="search" id="search"
                    class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                    placeholder="Cari jurusan..." required />
            </div>
        </div>
        {{--  Majors List  --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @if (count($majors) > 0)
                @foreach ($majors as $item)
                    <div class="rounded-lg border border-default bg-white shadow-sm overflow-hidden">
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-32 object-cover" />
                        <div class="p-4">
                            <div class="flex items-start justify-between gap-2">
                                <div>
                                    <Badge variant="secondary" class="mb-2">{{ $item['short_name'] }}</Badge>
                                    <h3 class="font-semibold">{{ $item['name'] }}</h3>
                                    <p class="text-sm text-gray-500 line-clamp-2 mt-1">{{ $item['description'] }}</p>
                                </div>
                            </div>
                            <div class="flex gap-2 mt-4">
                                <button type="button" size="sm" class="justify-center flex-1 bg-disabled box-border border border-gray-200 inline-flex items-center  hover:bg-amber-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                    @svg('lucide-pencil', 'w-4 h-4 mr-1')
                                    Edit
                                </button>
                                <button type="button"
                                    class="text-white bg-red-500 box-border border border-fg-disabled inline-flex items-center  hover:bg-red-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                    @svg('lucide-trash-2', 'h-4 w-4')</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-gray-500 py-8 col-span-full">Tidak ada jurusan ditemukan.</p>
            @endif
        </div>
    </div>
</x-app-layout>
