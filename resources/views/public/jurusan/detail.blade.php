<x-app>
    <x-slot:title>{{ $major->name }}</x-slot:title>

    <section id="hero" class="bg-white aspect-5/1 w-full relative flex overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url({{ asset($major->image) }});">
            <div class="absolute inset-0 bg-linear-to-r from-sky-600/90 to-sky-600/70"></div>
        </div>
        <div class="py-8 px-4 max-w-screen-xl mx-auto w-full lg:py-16 lg:px-8 relative z-10 flex items-end">
            <div>
                <h1 class="mb-4 text-4xl font-bold tracking-tight text-white md:text-5xl lg:text-6xl">
                    {{ $major->name }}</h1>
                <p class="text-lg font-normal text-white lg:text-xl">
                    {{ $major->description }}</p>
            </div>
        </div>
    </section>
</x-app>
