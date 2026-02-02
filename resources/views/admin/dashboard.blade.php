<x-app-layout>
    <x-slot:metaTitle>Halaman Dashboard</x-slot:metaTitle>
    <x-slot:metaDesc>Ini halaman cuma buat Dashboard aja</x-slot:metaDesc>
    <x-slot:title>Dashboard</x-slot:title>

    <div class="space-y-8">

        {{-- Header --}}
        <div>
            <h1 class="text-3xl font-bold">Dashboard</h1>
            <p class="text-gray-500">Selamat datang di Admin Panel SMK.</p>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach ($stats as $stat)
                <a href="{{ $stat['href'] }}">
                    <div
                        class="rounded-xl border border-default bg-neutral-primary-soft shadow-x hover:bg-neutral-secondary-medium">
                        <div class="p-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl {{ $stat['color'] }}">
                                    @svg('lucide-' . $stat['icon'], 'h-5 w-5 text-white')
                                </div>
                                <div>
                                    <p class="text-2xl font-bold">{{ $stat['count'] }}</p>
                                    <p class="text-sm text-gray-500">{{ $stat['name'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Quick Actions --}}
        <div>
            <h2 class="text-xl font-semibold mb-4">Aksi Cepat</h2>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($quickActions as $action)
                    <a href="{{ $action['href'] }}">
                        <div
                            class="h-full rounded-xl border border-default bg-neutral-primary-soft shadow-x hover:bg-neutral-secondary-medium">
                            <div class="p-4">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-200 mb-2">
                                    @svg('lucide-' . $action['icon'], 'h-5 w-5 text-blue-700')
                                </div>
                                <h3 class="text-lg font-semibold">{{ $action['name'] }}</h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $action['description'] }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Recent Activity --}}
        <div class="grid lg:grid-cols-2 gap-6">

            {{-- Recent News --}}
            <div class="rounded-xl border border-default bg-neutral-primary-soft shadow-x">
                <div class="flex items-center justify-between p-4">
                    <h3 class="font-semibold">Berita Terbaru</h3>
                    <a href="/admin/berita" class="text-sm text-primary flex items-center gap-1">
                        Lihat Semua
                        <x-lucide-arrow-right class="h-4 w-4" />
                    </a>
                </div>

                <div class="p-4 space-y-3">
                    @foreach (array_slice($news, 0, 5) as $item)
                        <div class="flex items-center gap-3 border-b border-gray last:border-0 pb-2">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                                class="w-12 h-12 rounded object-cover">

                            <div class="flex-1 min-w-0">
                                <p class="font-medium truncate">{{ $item['title'] }}</p>
                                <p class="text-sm text-gray-500">
                                    {{ $item['category']['name'] ?? 'Tidak ada kategori' }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Upcoming Events --}}
            <div class="rounded-xl border border-default bg-neutral-primary-soft shadow-x">
                <div class="flex items-center justify-between p-4">
                    <h3 class="font-semibold">Agenda Mendatang</h3>
                    <a href="/admin/kalender" class="text-sm text-primary flex items-center gap-1">
                        Lihat Semua
                        <x-lucide-arrow-right class="h-4 w-4" />
                    </a>
                </div>

                <div class="p-4 space-y-3">
                    @foreach (array_slice($events, 0, 5) as $event)
                        <div class="flex items-center gap-3 border-b border-gray last:border-0 pb-2">
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded bg-muted text-sm font-medium">
                                {{ \Carbon\Carbon::parse($event['start_date'])->day }}
                            </div>

                            <div class="flex-1 min-w-0">
                                <p class="font-medium truncate">{{ $event['title'] }}</p>
                                <p class="text-sm text-gray-500 capitalize">
                                    {{ $event['category'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>


</x-app-layout>
