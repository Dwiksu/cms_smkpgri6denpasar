<x-app-layout>
    <x-slot:metaTitle>Halaman Profil Guru</x-slot:metaTitle>
    <x-slot:metaDesc>Ini halaman cuma buat profil guru aja</x-slot:metaDesc>
    <x-slot:title>Profil Guru</x-slot:title>

    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="font-display text-3xl font-bold">Kelola Guru</h1>
                <p class="text-gray-500">Tambah, edit, atau hapus data guru.</p>
            </div>
            <a href="{{ route('form.profil.admin') }}"
                class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                @svg('lucide-plus', 'h-4 w-4 me-1.5')
                Tambah Guru</a>
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
                    placeholder="Cari guru..." />
            </div>
        </div>

        {{-- Teacher List --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @forelse ($teachers as $item)
                <div class="rounded-lg border border-default bg-white shadow-sm">
                    <div class="p-4 text-center">
                        <img src="{{ $item['photo'] }}" alt="{{ $item['name'] }}"
                            class="w-20 h-20 rounded-full mx-auto mb-3 object-cover" />
                        <h3 class="font-semibold">{{ $item['name'] }}</h3>
                        <p class="text-sm text-blue-600">{{ $item['position'] }}</p>
                        <p class="text-sm text-gray-500">{{ $item['subject'] }}</p>
                        <div class="flex gap-2 mt-4 justify-center">
                            <button type="button"
                                class="bg-disabled box-border border border-gray-200 inline-flex items-center  hover:bg-amber-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                @svg('lucide-pencil', 'h-4 w-4')</button>
                            <button type="button"
                                class="text-white bg-red-500 box-border border border-fg-disabled inline-flex items-center  hover:bg-red-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                @svg('lucide-trash-2', 'h-4 w-4')</button>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted-foreground py-8">Tidak ada guru ditemukan.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
