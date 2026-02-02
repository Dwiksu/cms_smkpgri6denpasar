<x-header>
    <x-slot:metaDesc>{{ $metaDesc }}</x-slot:metaDesc>
    <x-slot:metaTitle>{{ $metaTitle }}</x-slot:metaTitle>
    {{ $title }}
</x-header>

<x-sidebar></x-sidebar>

<main class="flex-1 p-8 sm:ml-64 bg-gray-50 min-h-screen">
    <div class="space-y-8">
        {{ $slot }}
    </div>
</main>
<x-footer></x-footer>
