@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}"
        class="flex flex-col sm:flex-row items-center justify-between w-full gap-4 sm:gap-6">

        {{-- Teks Info Pagination --}}
        <div class="text-center sm:text-left whitespace-nowrap flex-shrink-0">
            <p class="text-sm text-slate-500">
                Menampilkan
                @if ($paginator->firstItem())
                    <span class="font-semibold text-slate-800">{{ $paginator->firstItem() }}</span>
                    -
                    <span class="font-semibold text-slate-800">{{ $paginator->lastItem() }}</span>
                @else
                    <span class="font-semibold text-slate-800">{{ $paginator->count() }}</span>
                @endif
                dari
                <span class="font-semibold text-slate-800">{{ $paginator->total() }}</span>
                berita
            </p>
        </div>

        {{-- Tombol Pagination --}}
        <div class="w-full sm:w-auto max-w-full  sm:overflow-visible pb-2 sm:pb-0 text-center">
            <ul class="inline-flex items-center gap-1.5">

                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li>
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}"
                            class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 bg-slate-50 text-slate-300 cursor-not-allowed">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            aria-label="{{ __('pagination.previous') }}"
                            class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-sky-50 hover:text-sky-600 hover:border-sky-300 transition-all duration-300 shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li>
                            <span aria-disabled="true"
                                class="w-10 h-10 flex items-center justify-center text-slate-400 font-medium tracking-widest">
                                {{ $element }}
                            </span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li aria-current="page">
                                    <span
                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-sky-600 text-white font-bold shadow-md shadow-sky-200 scale-105">
                                        {{ $page }}
                                    </span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}"
                                        class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 font-medium hover:bg-sky-50 hover:text-sky-600 hover:border-sky-300 transition-all duration-300 shadow-sm">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            aria-label="{{ __('pagination.next') }}"
                            class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-sky-50 hover:text-sky-600 hover:border-sky-300 transition-all duration-300 shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                @else
                    <li>
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}"
                            class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 bg-slate-50 text-slate-300 cursor-not-allowed">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif
