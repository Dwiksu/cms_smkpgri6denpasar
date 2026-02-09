<x-header>
    <x-slot:metaTitle>{{ $metaTitle ?? '' }}</x-slot:metaTitle>
    <x-slot:metaDesc>{{ $metaDesc ?? '' }}</x-slot:metaDesc>
    {{ $title ?? '' }}
</x-header>

<x-navbar></x-navbar>

<main class="flex-1 h-[800rem] bg-gray-50 min-h-screen">
    <div class="space-y-8">
        {{ $slot }}
    </div>
</main>
<x-footer></x-footer>
