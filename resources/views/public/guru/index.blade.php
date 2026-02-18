<x-app>
    <x-slot:title>Profil Guru</x-slot:title>

    <div class="min-h-screen">
        {{-- HERO --}}
        <section class="relative aspect-5/1 bg-white w-full flex overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                style="background-image:url('{{ asset('assets/guru.jpeg') }}')">
                <div class="absolute inset-0 bg-linear-to-r from-sky-600/90 to-sky-600/70"></div>
            </div>

            <div class="py-8 px-4 max-w-screen-xl mx-auto w-full lg:py-16 lg:px-8 relative z-10 flex items-end">
                <div>
                    <h1 class="mb-4 text-4xl font-bold tracking-tight text-white md:text-5xl lg:text-6xl">
                        Profil Guru
                    </h1>
                    <p class="text-lg font-normal text-white lg:text-xl">
                        Tenaga pendidik profesional yang berdedikasi mencetak generasi unggul dan berkarakter.
                    </p>
                </div>
            </div>
        </section>

        <section class="py-6 bg-white backdrop-blur-lg sticky top-0 z-20 shadow-sm">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
                <form method="GET" class="flex justify-end sm:flex-row gap-4">

                    {{-- FILTER JURUSAN --}}
                    <select name="filter" onchange="this.form.submit()"
                        class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm
                       focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20 sm:w-56">

                        <option value="all">Semua Jurusan</option>

                        @foreach ($majors as $major)
                            <option value="{{ $major->id }}" {{ request('filter') == $major->id ? 'selected' : '' }}>
                                {{ $major->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </section>

        {{-- CONTENT --}}
        <section class="py-14">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">

                {{-- GRID GURU --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($teachers as $teacher)
                        <div
                            class="bg-white rounded-2xl shadow-md hover:shadow-xl transition
                       flex flex-col items-center px-6 pt-6 pb-8">

                            <div class="w-full flex justify-center mb-6">
                                <img src="{{ asset($teacher->photo) }}" alt="{{ $teacher->name }}"
                                    class="h-[420px] w-[360px] object-cover rounded-xl bg-gray-100">
                            </div>

                            <h3 class="text-lg font-bold text-gray-900 text-center capitalize">
                                {{ $teacher->name }}
                            </h3>

                            <p class="mt-1 text-sm text-gray-500 text-center capitalize">
                                {{ $teacher->position ?? '-' }}
                            </p>

                            <p class="mt-1 text-sm text-slate-400 text-center capitalize">
                                {{ $teacher->major->name ?? '-' }}
                            </p>
                        </div>

                        {{-- PAGINATION --}}
                        @if ($teachers->hasPages())
                            <div class="mt-16 flex justify-center">
                                {{ $teachers->appends(request()->input())->links() }}
                            </div>
                        @endif

                    @empty
                        <div class="col-span-full text-center text-gray-400 py-20">
                            Data guru belum tersedia
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
</x-app>
