@props([
    'name',
    'values' => [], // Array URL
    'folder' => 'general',
    'maxFiles' => 10,
    'maxSize' => 5,
    'label' => null,
])

<div x-data="multipleImageUploadLocal({
    initialValues: {{ json_encode($values) }},
    endpoint: '{{ route('upload.image') }}',
    folder: '{{ $folder }}',
    maxFiles: {{ $maxFiles }},
    maxSize: {{ $maxSize }},
    csrfToken: '{{ csrf_token() }}'
})" class="space-y-4">
    @if ($label)
        <label class="text-sm font-medium leading-none">{{ $label }}</label>
    @endif

    <input type="file" x-ref="fileInput" accept="image/*" multiple class="hidden" @change="handleFileSelect">

    <template x-for="(url, index) in values" :key="index">
        <input type="hidden" :name="`{{ $name }}[]`" :value="url">
    </template>

    <template x-if="values.length === 0">
        <input type="hidden" :name="`{{ $name }}`" value="">
    </template>

    <template x-if="values.length > 0">
        <div class="grid grid-cols-3 sm:grid-cols-4 gap-3">
            <template x-for="(url, index) in values" :key="index">
                <div class="relative aspect-square group">
                    <img :src="url" class="w-full h-full object-cover rounded-lg border bg-gray-50">
                    <button type="button" @click="removeImage(index)"
                        class="absolute top-1 right-1 bg-red-500 text-white rounded-md p-1 opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
            </template>
        </div>
    </template>

    <div @click="$refs.fileInput.click()" @dragover.prevent="isDragging = true" @dragleave.prevent="isDragging = false"
        @drop.prevent="handleDrop($event)"
        :class="{
            'border-blue-500 bg-blue-50': isDragging,
            'border-gray-300 hover:border-gray-400': !isDragging,
            'opacity-50 pointer-events-none': isUploading
        }"
        class="border-2 border-dashed rounded-lg flex flex-col items-center justify-center p-6 cursor-pointer transition-colors">
        <template x-if="isUploading">
            <div class="flex flex-col items-center">
                <svg class="animate-spin h-8 w-8 text-gray-400 mb-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
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
            <div class="flex flex-col items-center">
                <svg class="h-8 w-8 text-gray-400 mb-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <rect width="18" height="18" x="3" y="3" rx="2" ry="2" stroke-width="2" />
                    <circle cx="9" cy="9" r="2" stroke-width="2" />
                    <path stroke-width="2" d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                </svg>
                <p class="text-sm font-medium">Klik untuk tambah gambar</p>
                <p class="text-xs text-gray-500 mt-1">
                    <span x-text="values.length"></span>/<span x-text="maxFiles"></span> gambar • Maks <span
                        x-text="maxSize"></span>MB
                </p>
            </div>
        </template>
    </div>

    <template x-if="error">
        <p class="text-sm text-red-500 mt-1" x-text="error"></p>
    </template>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('multipleImageUploadLocal', ({
            initialValues,
            endpoint,
            folder,
            maxFiles,
            maxSize,
            csrfToken
        }) => ({
            values: initialValues || [],
            isUploading: false,
            error: null,
            isDragging: false,
            maxFiles: maxFiles,

            async uploadFiles(files) {
                this.error = null;
                if (this.values.length + files.length > this.maxFiles) {
                    this.error = `Maksimal ${this.maxFiles} gambar`;
                    return;
                }

                this.isUploading = true;

                // Upload parallel
                const uploadPromises = Array.from(files).map(async (file) => {
                    if (file.size > maxSize * 1024 * 1024) return null;
                    if (!file.type.startsWith('image/')) return null;

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
                        if (!response.ok) throw new Error();
                        const data = await response.json();
                        return data.url;
                    } catch (e) {
                        console.error(e);
                        return null;
                    }
                });

                try {
                    const results = await Promise.all(uploadPromises);
                    const successfulUploads = results.filter(url => url !== null);

                    if (successfulUploads.length > 0) {
                        this.values = [...this.values, ...successfulUploads];
                    } else if (files.length > 0) {
                        this.error = "Gagal mengupload gambar";
                    }
                } finally {
                    this.isUploading = false;
                }
            },

            handleFileSelect(e) {
                if (e.target.files.length > 0) this.uploadFiles(e.target.files);
                e.target.value = '';
            },

            handleDrop(e) {
                this.isDragging = false;
                if (e.dataTransfer.files.length > 0) this.uploadFiles(e.dataTransfer.files);
            },

            removeImage(index) {
                this.values = this.values.filter((_, i) => i !== index);
            }
        }));
    });
</script>
