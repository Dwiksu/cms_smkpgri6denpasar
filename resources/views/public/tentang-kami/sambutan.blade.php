<x-app>
    <x-slot:title>Sambutan Kepala Sekolah</x-slot:title>

    <section id="hero"
        class="bg-white min-h-[250px] md:min-h-0 md:aspect-[5/1] w-full relative flex overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('assets/guru.jpeg');">
            <div class="absolute inset-0 bg-gradient-to-r from-sky-600/90 to-sky-600/70"></div>
        </div>
        <div class="py-12 px-4 max-w-screen-xl mx-auto w-full lg:py-16 lg:px-8 relative z-10 flex items-end">
            <div>
                <h1 class="mb-3 text-3xl font-bold tracking-tight text-white sm:text-4xl md:text-5xl lg:text-6xl">
                    Sambutan Kepala Sekolah
                </h1>
                <p class="text-base font-normal text-white sm:text-lg lg:text-xl">
                    Pesan dan harapan dari pimpinan sekolah untuk seluruh civitas akademika.
                </p>
            </div>
        </div>
    </section>

    <section id="sambutan">
        <div
            class="flex flex-col gap-8 py-8 px-4 mx-auto max-w-screen-xl md:grid md:grid-cols-4 xl:gap-16 sm:py-16 lg:px-6">

            <div class="w-full max-w-xs mx-auto md:max-w-none md:sticky md:top-32 h-fit">
                <div class="relative text-center">
                    <div class="absolute -inset-4 bg-sky-600/5 rounded-3xl -rotate-3"></div>

                    <img class="relative rounded-2xl shadow-2xl w-full object-cover aspect-[3/4] z-10"
                        src="{{ asset($principal->photo) }}" alt="Kepala Sekolah">

                    <div class="relative z-10 mt-5 space-y-1">
                        <h4 class="text-xl md:text-lg font-semibold text-gray-900">
                            {{ $principal->name }}
                        </h4>
                        <p class="text-base md:text-sm font-medium text-gray-600">
                            Kepala Sekolah
                        </p>
                    </div>
                </div>
            </div>

            <div class="md:col-span-3">
                <div class="text-body">
                    <h2 class="text-2xl mt-8 md:mt-0 sm:text-3xl font-bold text-sky-600 mb-6 text-center md:text-left">
                        Kata Sambutan
                    </h2>

                    <div class="text-gray-700 leading-relaxed space-y-4 text-justify sm:text-left">
                        {!! $principal->message !!}
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-app>
