@props([
    'name',
    'value' => '',
    'folder' => 'general', // Folder tujuan di storage
    'accept' => 'image/*',
    'maxSize' => 2, // MB
    'aspectRatio' => 'auto',
    'label' => null,
])

@php
    $aspectClass = match ($aspectRatio) {
        'square' => 'aspect-square',
        'video' => 'aspect-video',
        default => 'min-h-32',
    };
@endphp

<div x-data="imageUploadLocal({
    initialValue: '{{ $value }}',
    endpoint: '{{ route('upload.image') }}',
    folder: '{{ $folder }}',
    maxSize: {{ $maxSize }},
    csrfToken: '{{ csrf_token() }}'
})" x-modelable="value" class="{{ $attributes->get('class') }} space-y-2"
    {{ $attributes->except(['name', 'value', 'folder', 'class']) }}>
    @if ($label)
        <label class="text-sm font-medium leading-none">{{ $label }}</label>
    @endif

    <input type="hidden" :name="'{{ $name }}'" :value="value">

    <input type="file" x-ref="fileInput" accept="{{ $accept }}" class="hidden" @change="handleFileSelect">

    <template x-if="value">
        <div class="relative rounded-lg overflow-hidden border {{ $aspectClass }}">
            <img :src="value" alt="Preview" class="w-full max-h-96 object-contain">

            <div
                class="absolute inset-0 bg-black/0 hover:bg-black/30 transition-colors flex items-center justify-center opacity-0 hover:opacity-100">
                <div class="flex gap-2">
                    <button type="button" @click="$refs.fileInput.click()" :disabled="isUploading"
                        class="bg-white/90 text-black hover:bg-white text-xs px-3 py-1.5 rounded-md shadow font-medium transition-colors">
                        Ganti
                    </button>
                    <button type="button" @click="removeImage" :disabled="isUploading"
                        class="bg-red-500 text-white hover:bg-red-600 p-1.5 rounded-md shadow transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </template>

    <template x-if="!value">
        <div @click="$refs.fileInput.click()" @dragover.prevent="isDragging = true"
            @dragleave.prevent="isDragging = false" @drop.prevent="handleDrop($event)"
            :class="{
                'border-blue-500 bg-blue-50': isDragging,
                'border-gray-300 hover:border-gray-400': !isDragging,
                'opacity-50 cursor-not-allowed': isUploading
            }"
            class="border-2 border-dashed rounded-lg flex flex-col items-center justify-center p-6 cursor-pointer transition-colors {{ $aspectClass }}">
            <template x-if="isUploading">
                <div class="flex flex-col items-center">
                    <svg class="animate-spin h-8 w-8 text-gray-400 mb-2" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <p class="text-sm text-gray-500">Mengupload...</p>
                </div>
            </template>

            <template x-if="!isUploading">
                <div class="flex flex-col items-center text-center">
                    <div class="p-3 bg-gray-100 rounded-full mb-2">
                        <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <p class="text-sm font-medium">Klik atau drop gambar</p>
                    <p class="text-xs text-gray-500 mt-1">Maks {{ $maxSize }}MB</p>
                </div>
            </template>
        </div>
    </template>

    <template x-if="error">
        <p class="text-sm text-red-500 mt-1" x-text="error"></p>
    </template>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('imageUploadLocal', ({
            initialValue,
            endpoint,
            folder,
            maxSize,
            csrfToken
        }) => ({
            value: initialValue,
            isUploading: false,
            isDragging: false,
            error: null,

            async uploadFile(file) {
                this.error = null;

                if (file.size > maxSize * 1024 * 1024) {
                    this.error = `Ukuran file terlalu besar (Maks ${maxSize}MB)`;
                    return;
                }
                if (!file.type.startsWith('image/')) {
                    this.error = 'File harus berupa gambar';
                    return;
                }

                this.isUploading = true;
                const formData = new FormData();
                formData.append('file', file);
                formData.append('folder', folder);

                try {
                    const response = await fetch(endpoint, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                        },
                        body: formData
                    });

                    if (!response.ok) throw new Error('Upload gagal');

                    const data = await response.json();
                    this.value = data.url; // URL dari Laravel Storage
                } catch (err) {
                    console.error(err);
                    this.error = 'Gagal mengupload gambar. Coba lagi.';
                } finally {
                    this.isUploading = false;
                }
            },

            handleFileSelect(e) {
                const file = e.target.files[0];
                if (file) this.uploadFile(file);
                e.target.value = '';
            },

            handleDrop(e) {
                this.isDragging = false;
                const file = e.dataTransfer.files[0];
                if (file) this.uploadFile(file);
            },

            removeImage() {
                this.value = '';
                // Opsional: Bisa panggil endpoint delete file di sini jika ingin menghapus fisik file
            }
        }));
    });
</script>
