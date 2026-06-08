<x-app-layout>
    <x-slot:title>Profil Guru</x-slot:title>

    <div class="space-y-6" x-data="teacherTable()" x-init="fetchData()">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="font-display text-3xl font-bold">Kelola Guru</h1>
                <p class="text-gray-500">Tambah, edit, atau hapus data guru.</p>
            </div>
            <a href="{{ route('admin.profil.create') }}"
                class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                @svg('lucide-plus', 'h-4 w-4 me-1.5')
                Tambah Guru</a>
        </div>
        {{-- Search --}}
        <div class="max-w-md relative">
            <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    @svg('lucide-search', 'w-4 h-4 text-body')
                </div>
                <input type="search" id="search" x-model="search" @input.debounce.500ms="resetPage()"
                    class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                    placeholder="Cari guru..." />
            </div>
        </div>

        {{-- Teacher List --}}
        <div class="overflow-x-auto rounded-xl border border-default bg-white shadow-xs">
            <table class="w-full text-sm text-left text-heading">
                <thead class="bg-neutral-primary-soft text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Foto</th>
                        <th class="px-4 py-3">Nama Guru</th>
                        <th class="px-4 py-3">Jabatan</th>
                        <th class="px-4 py-3">Mata Pelajaran</th>
                        <th class="px-4 py-3">Jurusan</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-default">
                    <!-- SKELETON -->
                    <template x-if="loading">
                        <template x-for="i in perPage" :key="i">
                            <tr>
                                <td class="px-4 py-3">
                                    <div class="w-10 h-10 bg-gray-200 rounded-full animate-pulse"></div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="h-4 w-3/4 bg-gray-200 rounded animate-pulse"></div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="h-5 w-20 bg-gray-200 rounded-full animate-pulse"></div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="h-4 w-24 bg-gray-200 rounded animate-pulse"></div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="h-4 w-24 bg-gray-200 rounded animate-pulse"></div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="h-4 w-24 bg-gray-200 rounded animate-pulse"></div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="h-8 w-16 bg-gray-200 rounded animate-pulse mx-auto"></div>
                                </td>
                            </tr>
                        </template>
                    </template>
                    <template x-if="!loading">
                        <template x-for="item in items" :key="item.id">
                            <tr class="hover:bg-neutral-secondary-soft transition">
                                {{-- Foto --}}
                                <td class="px-4 py-3">
                                    <img :src="item.photo" :alt="item.name"
                                        class="w-10 h-10 rounded-full object-cover border" />
                                </td>

                                {{-- Nama --}}
                                <td class="px-4 py-3 font-semibold capitalize" x-text="item.name">
                                </td>

                                {{-- Jabatan --}}
                                <td class="px-4 py-3 text-gray-600 capitalize" x-text="item.position">
                                </td>

                                {{-- Subject --}}
                                <td class="px-4 py-3 text-blue-600 capitalize" x-text="item.subject">
                                </td>

                                {{-- Jurusan --}}
                                <td class="px-4 py-3 text-purple-600 capitalize" x-text="item.major?.name ?? 'Umum'">
                                    {{-- {{ $item->major->name ?? 'Umum' }} --}}
                                </td>

                                {{-- Aksi --}}
                                <td class="px-4 py-3">
                                    <div class="flex justify-center gap-2">
                                        <a :href="`/cp-smkpgri-6/profil/${item.id}/edit`"
                                            class="bg-amber-400 hover:bg-amber-300 text-white rounded p-2">
                                            @svg('lucide-pencil', 'h-4 w-4')
                                        </a>

                                        <button type="button" @click="deleteItem(item.id)"
                                            class="bg-red-500 hover:bg-red-400 text-white p-2 rounded shadow-sm">
                                            @svg('lucide-trash-2', 'h-4 w-4')
                                        </button>

                                        {{-- <form action="{{ route('admin.profil.destroy', $item) }}" method="POST"
                                            class="delete-form" data-confirm="Hapus guru {{ $item->name }}?">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-400 text-white rounded p-2">
                                                @svg('lucide-trash-2', 'h-4 w-4')
                                            </button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </template>
                    <tr x-show="!loading && items.length === 0">
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                            Tidak ada data guru.
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 px-4 py-3">

                <!-- KIRI: Per Page -->
                <div class="flex items-center gap-2">
                    {{-- <span class="text-sm text-body">Show</span>
                    <select x-model.number="perPage" @change="resetPage()" class="border rounded px-2 py-1 text-sm">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                    <span class="text-sm text-body">entries</span> --}}
                </div>

                <!-- TENGAH: Showing info -->
                <span class="text-sm text-body text-center">
                    Showing
                    <span class="font-semibold text-heading" x-text="pagination.from ?? 0"></span>
                    to
                    <span class="font-semibold text-heading" x-text="pagination.to ?? 0"></span>
                    of
                    <span class="font-semibold text-heading" x-text="pagination.total ?? 0"></span>
                    Entries
                </span>

                <!-- KANAN: Pagination -->
                <nav aria-label="Pagination" class="px-4 py-3">
                    <ul class="flex -space-x-px text-sm">

                        <!-- Previous -->
                        <li>
                            <button @click="goToPage(pagination.current_page - 1)" :disabled="!pagination.prev_page_url"
                                class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-s-base text-sm px-3 h-9 focus:outline-none">
                                Previous
                            </button>
                        </li>

                        <!-- Page Numbers -->
                        <template x-for="link in pagination.links.slice(1, -1)" :key="link.label">
                            <li>
                                <button @click="goToPage(link.label)" x-text="link.label"
                                    :class="link.active ?
                                        'bg-neutral-tertiary-medium text-fg-brand' :
                                        'bg-neutral-secondary-medium text-body hover:bg-neutral-tertiary-medium'"
                                    class="flex items-center justify-center box-border border border-default-medium hover:text-heading font-medium text-sm w-9 h-9 focus:outline-none">
                                </button>
                            </li>
                        </template>

                        <!-- Next -->
                        <li>
                            <button @click="goToPage(pagination.current_page + 1)" :disabled="!pagination.next_page_url"
                                class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-e-base text-sm px-3 h-9 focus:outline-none">
                                Next
                            </button>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script>
        function teacherTable() {
            return {
                search: '',
                page: 1,
                perPage: 5,
                items: [],
                pagination: {},
                loading: false,

                fetchData() {
                    this.loading = true

                    fetch(`?search=${encodeURIComponent(this.search)}&page=${this.page}&per_page=${this.perPage}`, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(r => r.json())
                        .then(r => {
                            this.items = r.data
                            this.pagination = r
                        })
                        .finally(() => {
                            this.loading = false
                            console.log(this.items)
                        })
                },

                deleteItem(id) {
                    Swal.fire({
                        title: "Yakin ingin menghapus?",
                        text: "Data ini tidak bisa dikembalikan!",
                        icon: "warning",
                        cancelButtonColor: "#d33",
                        showCancelButton: true,
                        confirmButtonText: "Ya, hapus!",
                        confirmButtonColor: "#2578C6",
                        cancelButtonText: "Batal",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/admin/profil/${id}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document
                                            .querySelector('meta[name="csrf-token"]').content,
                                        'X-Requested-With': 'XMLHttpRequest',
                                        'Accept': 'application/json'
                                    }
                                })
                                .then(r => r.json())
                                .then(r => {
                                    if (r.success) {
                                        Swal.fire("Terhapus!", r.message, "success")

                                        // jika halaman jadi kosong, mundur 1 page
                                        if (this.items.length === 1 && this.page > 1) {
                                            this.page--
                                        }

                                        this.fetchData()
                                    } else {
                                        Swal.fire("Gagal!", r.message ?? "Terjadi kesalahan", "error")
                                    }
                                })
                                .catch(() => {
                                    Swal.fire("Error!", "Gagal menghapus data", "error")
                                })
                        }
                    });


                },

                resetPage() {
                    this.page = 1
                    this.fetchData()
                },

                nextPage() {
                    if (this.pagination.next_page_url) {
                        this.page++
                        this.fetchData()
                    }
                },

                goToPage(page) {
                    if (!page || page === this.page) return
                    this.page = Number(page)
                    this.fetchData()
                },

                prevPage() {
                    if (this.pagination.prev_page_url) {
                        this.page--
                        this.fetchData()
                    }
                },
            }
        }
    </script>
</x-app-layout>
