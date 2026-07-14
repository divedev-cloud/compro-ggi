<x-layouts.app :title="$article->title . ' | GGI'" :description="$article->excerpt ?: strip_tags(substr($article->content, 0, 160))" :canonical="url('/artikel/' . $article->slug)" :ogImage="$article->thumbnail ? asset('storage/' . $article->thumbnail) : null">
    @push('schema')
        <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Article",
      "headline": "{{ addslashes($article->title) }}",
      "datePublished": "{{ $article->published_at?->toIso8601String() }}",
      "dateModified": "{{ $article->updated_at->toIso8601String() }}",
      "author": { "@@type": "Person", "name": "{{ addslashes($article->author?->full_name ?? $article->author?->name ?? 'GGI') }}" },
      "publisher": { "@@type": "Organization", "name": "PT Gagasan Gemilang Indonesia" }
    }
    </script>
    @endpush

    <x-page-hero :title="$article->title" :breadcrumbs="[['label' => 'Artikel', 'url' => route('artikel.index')], ['label' => $article->title]]" titleClass="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl" />

    <section class="section-pad pt-0">
        <div class="max-w-7xl mx-auto px-5 sm:px-8">

            {{-- Grid: konten kiri + sidebar kanan (desktop) --}}
            <div class="lg:grid lg:grid-cols-[1fr_300px] xl:grid-cols-[1fr_320px] lg:gap-12 xl:gap-16">

                {{-- ── Konten utama ───────────────────────────────── --}}
                <div class="min-w-0">

                    {{-- Meta bar --}}
                    <div
                        class="flex flex-wrap items-center gap-x-10 gap-y-2 text-xs sm:text-sm text-ink-500 mb-8 pb-6 border-b border-ink-100">
                        @if($article->category)
                        <span class="inline-flex items-center gap-1.5 whitespace-nowrap text-violet-600 bg-violet-50/50 px-2.5 py-1 rounded-md font-medium border border-violet-100">
                            {{ $article->category->name }}
                        </span>
                        @endif
                        <span class="inline-flex items-center gap-1.5 whitespace-nowrap">
                            <svg class="w-3.5 h-3.5 text-cyan-600 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ $article->published_at?->format('d M Y') }}
                        </span>
                        <span class="inline-flex items-center gap-1.5 whitespace-nowrap">
                            <svg class="ml-2 w-3.5 h-3.5 text-cyan-600 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            {{ $article->author?->full_name ?? $article->author?->name ?? 'Tim GGI' }}
                        </span>
                        <span class="inline-flex items-center gap-1.5 whitespace-nowrap">
                            <svg class="ml-2 w-3.5 h-3.5 text-cyan-600 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $readingTime }} menit baca
                        </span>
                    </div>

                    {{-- Thumbnail besar --}}
                    @if ($article->thumbnail)
                        <div class="rounded-2xl overflow-hidden mb-10 reveal">
                            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                                class="w-full object-cover max-h-[480px]">
                        </div>
                    @endif

                    {{-- Konten artikel — tanpa reveal agar tidak tersembunyi di artikel panjang --}}
                    <div class="article-content">
                        {!! $article->content !!}
                    </div>

                    {{-- Navigasi bawah --}}
                    <div class="mt-14 pt-8 border-t border-ink-100 flex items-center justify-between reveal">
                        <a href="{{ route('artikel.index') }}"
                            class="inline-flex items-center gap-2 text-sm font-semibold text-ink-600 hover:text-cyan-600 transition-colors">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 12H5M12 6l-6 6 6 6" />
                            </svg>
                            Kembali ke Daftar Artikel
                        </a>
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-ink-400">Bagikan:</span>
                            <a href="https://wa.me/?text={{ urlencode($article->title . ' — ' . url('/artikel/' . $article->slug)) }}"
                                target="_blank" rel="noopener"
                                class="w-8 h-8 flex items-center justify-center rounded-full bg-emerald-50 text-emerald-600 hover:bg-emerald-100 transition-colors"
                                aria-label="Bagikan via WhatsApp">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>

                {{-- ── Sidebar: Artikel Lainnya ────────────────────── --}}
                @if ($otherArticles->isNotEmpty())
                    <aside class="mt-14 lg:mt-0">
                        <div class="lg:sticky lg:top-28 space-y-5">

                            <div class="flex items-center gap-3 mb-6">
                                <span class="pill"><span class="pill-dot"></span>Baca Juga</span>
                            </div>

                            {{-- Kartu artikel 1 kolom --}}
                            @foreach ($otherArticles as $other)
                                <article
                                    class="glass-card group overflow-hidden flex gap-4 p-4 hover:-translate-y-0.5 transition-all duration-300">

                                    {{-- Thumbnail kecil --}}
                                    <a href="{{ route('artikel.show', $other->slug) }}"
                                        class="flex-shrink-0 w-20 h-20 rounded-xl overflow-hidden bg-gradient-to-br from-cyan-500/10 to-violet-500/10">
                                        @if ($other->thumbnail)
                                            <img src="{{ asset('storage/' . $other->thumbnail) }}"
                                                alt="{{ $other->title }}" loading="lazy"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <svg class="w-6 h-6 text-cyan-600/30" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </a>

                                    {{-- Info --}}
                                    <div class="flex-1 min-w-0">
                                        <span class="text-[0.65rem] text-ink-400 flex items-center gap-1 mb-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="10" />
                                                <polyline points="12 6 12 12 16 14" />
                                            </svg>
                                            {{ $other->published_at?->format('d M Y') }}
                                        </span>
                                        <h3
                                            class="font-display font-600 text-sm text-ink-900 line-clamp-3 group-hover:text-cyan-600 transition-colors leading-snug">
                                            <a
                                                href="{{ route('artikel.show', $other->slug) }}">{{ $other->title }}</a>
                                        </h3>
                                    </div>

                                </article>
                            @endforeach

                            <a href="{{ route('artikel.index') }}"
                                class="flex items-center justify-center gap-2 w-full py-2.5 text-sm font-semibold text-cyan-600 hover:text-cyan-700 border border-cyan-200 hover:border-cyan-400 rounded-xl hover:bg-cyan-50/50 transition-all duration-200">
                                Lihat Semua Artikel
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M5 12h14M13 6l6 6-6 6" />
                                </svg>
                            </a>

                        </div>
                    </aside>
                @endif

            </div>
        </div>
    </section>

</x-layouts.app>
