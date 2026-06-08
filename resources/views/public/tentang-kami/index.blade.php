<x-app>
    <x-slot:title>Sejarah Kami</x-slot:title>

    <section id="hero"
        class="bg-white aspect-auto min-h-[300px] md:min-h-0 md:aspect-5/1 w-full relative flex overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('assets/sejarah.jpg');">
            <div class="absolute inset-0 bg-linear-to-r from-sky-600/90 to-sky-600/70"></div>
        </div>
        <div class="py-8 px-4 max-w-screen-xl mx-auto w-full lg:py-16 lg:px-8 relative z-10 flex items-end">
            <div>
                <h1 class="mb-4 text-4xl font-bold tracking-tight text-white md:text-5xl lg:text-6xl">
                    Sejarah Kami </h1>
                <p class="text-lg font-normal text-white lg:text-xl">
                    Pesan dan harapan dari pimpinan sekolah untuk seluruh civitas akademika.</p>
            </div>
        </div>
    </section>

    <section class="bg-white py-8">
        <div class="text-base/8 items-center py-8 px-4 mx-auto max-w-screen-xl flex flex-col gap-10 md:block md:gap-0">

            <p class="text-body" data-aos="fade-up">{{ $about->history }}</p>

            <div class="flex flex-col gap-8 xl:gap-16 md:grid md:grid-cols-2 md:py-16 lg:px-6" data-aos="fade-up">
                <div class="relative md:sticky h-fit md:top-48 w-full max-w-md mx-auto md:max-w-none">
                    <div class="relative">
                        <div class="absolute scale-105 inset-0 bg-sky-600/5 rounded-3xl -rotate-3"></div>
                        <img class="relative rounded-2xl shadow-2xl w-full object-cover aspect-4/3 z-10"
                            src="{{ asset('assets/sejarah-2.jpg') }}" alt="dashboard image">
                    </div>
                </div>
                <div class="mt-4 md:mt-0">
                    <div>
                        <h6 class="w-fit text-2xl uppercase mb-2 border-b-2 border-dashed">Visi</h6>
                        <p class="mb-6 text-body">{{ $about->vision }}</p>
                    </div>
                    <div>
                        <h6 class="w-fit text-2xl uppercase mb-2 border-b-2 border-dashed">Misi</h6>
                        <ol class="list-decimal pl-6">
                            @foreach ($about->mission as $mission)
                                <li class="mb-6 text-body">{{ $mission }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>

            <div class="flex flex-col-reverse gap-8 xl:gap-16 md:grid md:grid-cols-2 md:py-16 lg:px-6" data-aos="fade-up">
                <div class="mt-4 md:mt-0">
                    <h6 class="w-fit text-2xl uppercase mb-2 border-b-2 border-dashed">Nilai yang Kami Pegang</h6>
                    <p class="text-body">Prinsip-prinsip utama yang menjadi landasan dalam setiap kegiatan di sekolah
                        kami.</p>
                    <ol class="list-decimal pl-6 mt-4 md:mt-0">
                        @foreach ($schoolValues as $value)
                            <li class="mb-6 text-body"><b>{{ $value->name }}</b> : {{ $value->description }}</li>
                        @endforeach
                    </ol>
                </div>
                <div class="relative md:sticky h-fit md:top-48 w-full max-w-md mx-auto md:max-w-none">
                    <div class="relative">
                        <div class="absolute scale-105 inset-0 bg-sky-600/5 rounded-3xl -rotate-3"></div>
                        <img class="relative rounded-2xl shadow-2xl w-full object-cover aspect-4/3 z-10"
                            src="{{ asset('assets/sejarah-3.jpeg') }}" alt="dashboard image">
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>
