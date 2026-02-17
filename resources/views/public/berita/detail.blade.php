<x-app>
    <x-slot:title>{{ $detail->title }}</x-slot:title>

    <div class="min-h-screen bg-white" x-data="{
        shareTitle: '{{ $detail->title }}',
        shareUrl: window.location.href,
        async handleNativeShare() {
            if (navigator.share) {
                try {
                    await navigator.share({ title: this.shareTitle, url: this.shareUrl });
                } catch (err) { console.log('Share cancelled') }
            } else {
                alert('Browser Anda tidak mendukung fitur berbagi langsung.');
            }
        }
    }">
        {{-- Hero Header Image --}}
        <section class="relative h-[45vh] md:h-[60vh] overflow-hidden">
            <img src="{{ $detail->image ?? '/placeholder.svg' }}" alt="{{ $detail->title }}"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>

            <div class="absolute bottom-0 left-0 right-0 p-6 md:p-12">
                <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
                    <span
                        class="{{ $detail->category_color }} text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-4 inline-block shadow-lg">
                        {{ $detail->category }}
                    </span>

                    <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight max-w-5xl">
                        {{ $detail->title }}
                    </h1>

                    {{-- Meta Info --}}
                    <div class="flex flex-wrap items-center gap-6 text-slate-200 text-sm font-medium">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>{{ $detail->published_at->translatedFormat('d F Y') }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>{{ $detail->author ?? 'Admin' }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ max(1, ceil(str_word_count(strip_tags($detail->content)) / 200)) }} menit
                                baca</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Article Content --}}
        <section class="py-12 bg-slate-50">
            <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
                <div class="grid lg:grid-cols-3 gap-12">

                    {{-- Main Article --}}
                    <div class="lg:col-span-2">
                        <a href="{{ route('public.berita.index') }}"
                            class="group inline-flex items-center text-slate-500 hover:text-sky-600 font-bold mb-8 transition-colors">
                            <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke Berita
                        </a>

                        <article class="bg-white p-6 md:p-10 rounded-3xl shadow-sm border border-slate-100">
                            {{-- Excerpt --}}
                            <p
                                class="text-xl text-slate-600 mb-10 leading-relaxed font-medium border-l-4 border-sky-500 pl-6 italic">
                                {{ $detail->excerpt }}
                            </p>

                            {{-- Content --}}
                            <div
                                class="prose prose-slate prose-sky max-w-none
                                    prose-headings:font-extrabold prose-p:leading-relaxed prose-img:rounded-3xl">
                                {!! $detail->content !!}
                            </div>

                            {{-- Social Share --}}
                            <div class="mt-12 pt-8 border-t border-slate-100 flex flex-wrap items-center gap-4">
                                <span class="text-sm font-bold text-slate-400 uppercase tracking-widest">Bagikan:</span>

                                <button @click="handleNativeShare()"
                                    class="p-3 bg-slate-100 hover:bg-sky-100 hover:text-sky-600 rounded-2xl transition-all">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                    </svg>
                                </button>

                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                    target="_blank"
                                    class="p-3 bg-slate-100 hover:bg-[#1877F2] hover:text-white rounded-2xl transition-all">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                </a>

                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($detail->title) }}"
                                    target="_blank"
                                    class="p-3 bg-slate-100 hover:bg-[#1DA1F2] hover:text-white rounded-2xl transition-all">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </div>

                    {{-- Sidebar: Related detail --}}
                    <aside class="lg:col-span-1">
                        <div class="sticky top-24">
                            <div class="flex items-center gap-2 mb-6">
                                <span class="w-2 h-8 bg-sky-600 rounded-full"></span>
                                <h3 class="text-xl font-bold text-slate-800">Berita Terkait</h3>
                            </div>

                            <div class="space-y-6">
                                @forelse($relatedNews as $item)
                                    <a href="{{ route('public.berita.show', $item->slug) }}"
                                        class="group block bg-white p-4 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
                                        <div class="flex flex-col gap-3">
                                            <div
                                                class="flex items-center gap-2 text-[10px] font-bold text-slate-400 uppercase">
                                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                {{ $item->published_at->translatedFormat('d M Y') }}
                                            </div>
                                            <h4
                                                class="text-slate-800 font-bold group-hover:text-sky-600 transition-colors line-clamp-2">
                                                {{ $item->title }}
                                            </h4>
                                        </div>
                                    </a>
                                @empty
                                    <p class="text-slate-400 text-sm italic">Tidak ada berita terkait lainnya.</p>
                                @endforelse
                            </div>

                            {{-- Newsletter / Call to Action (Optional Sidebar) --}}
                            <div class="mt-10 p-6 bg-sky-600 rounded-3xl text-white shadow-lg shadow-sky-200">
                                <h4 class="font-bold text-lg mb-2">Ingin info terbaru?</h4>
                                <p class="text-sky-100 text-sm mb-4">Ikuti terus portal informasi sekolah kami untuk
                                    mendapatkan berita ter-update.</p>
                                <a href="{{ route('public.berita.index') }}"
                                    class="block text-center py-3 bg-white text-sky-600 font-bold rounded-xl text-sm hover:bg-sky-50 transition-colors">
                                    Lihat Semua Berita
                                </a>
                            </div>
                        </div>
                    </aside>

                </div>
            </div>
        </section>
    </div>
</x-app>
