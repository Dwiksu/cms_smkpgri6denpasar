<x-app>
    <x-slot:title>Sambutan Kepala Sekolah</x-slot:title>

    <section id="hero" class="bg-white aspect-5/1 w-full relative flex overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('assets/guru.jpeg');">
            <div class="absolute inset-0 bg-linear-to-r from-sky-600/90 to-sky-600/70"></div>
        </div>
        <div class="py-8 px-4 max-w-screen-xl mx-auto w-full lg:py-16 lg:px-8 relative z-10 flex items-end">
            <div>
                <h1 class="mb-4 text-4xl font-bold tracking-tight text-white md:text-5xl lg:text-6xl">
                    Sambutan Kepala Sekolah </h1>
                <p class="text-lg font-normal text-white lg:text-xl">
            </div>
                Pesan dan harapan dari pimpinan sekolah untuk seluruh civitas akademika.</p>
        </div>
    </section>

    <section id="sambutan">
        <div
            class="gap-8 py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-4 sm:py-16 lg:px-6">
            <div class="sticky top-48 h-fit">
                <div class="relative">
                    <div class="absolute -inset-4 bg-sky-600/5 rounded-3xl -rotate-3"></div>
                    <img class="relative rounded-2xl shadow-2xl w-full object-cover aspect-3/4 z-10"
                        src="{{ asset($principal->photo) }}" alt="dashboard image">
                </div>
            </div>
            <div class="col-span-3">
                <div class="text-body">
                    <h2 class="text-3xl font-bold text-sky-600 mb-8">Kata Sambutan</h2>
                    {!! $principal->message !!}
                </div>
            </div>
        </div>
    </section>
</x-app>
