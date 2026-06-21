<x-layouts.app
    title="Artikel | PT Gagasan Gemilang Indonesia"
    description="Kumpulan artikel, insight, dan cerita dari lapangan oleh tim GGI seputar pengembangan ekonomi lokal, UMKM, koperasi, dan pemberdayaan masyarakat."
    canonical="{{ url('/artikel') }}"
>
    <x-page-hero
        title="Artikel &amp; <span class='text-gradient-aurora'>Insight</span>"
        subtitle="Kumpulan tulisan dari lapangan seputar pengembangan ekonomi lokal, UMKM, koperasi, dan pemberdayaan masyarakat."
        :breadcrumbs="[['label' => 'Artikel']]"
    />

    <section class="section-pad">
        <div class="max-w-7xl mx-auto px-5 sm:px-8">

            @if($articles->isEmpty())
            {{-- Empty state --}}
            <div class="text-center py-20">
                <div class="w-20 h-20 bg-cyan-500/10 rounded-2xl flex items-center justify-center mx-auto mb-5">
                    <svg class="w-9 h-9 text-cyan-600/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h2 class="font-display font-700 text-2xl text-ink-900 mb-2">Belum ada artikel</h2>
                <p class="text-ink-500">Artikel sedang disiapkan. Kunjungi kembali nanti.</p>
                <a href="{{ route('home') }}" class="btn-primary mt-6 inline-flex">
                    Kembali ke Beranda
                </a>
            </div>

            @else
            {{-- Grid artikel --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @foreach($articles as $i => $article)
                <article class="glass-card overflow-hidden flex flex-col reveal-scale" data-delay="{{ ($i % 3) * 80 }}">

                    {{-- Thumbnail --}}
                    <a href="{{ route('artikel.show', $article->slug) }}"
                       class="block aspect-[16/9] overflow-hidden bg-gradient-to-br from-cyan-900/20 to-violet-900/20 flex-shrink-0">
                        @if($article->thumbnail)
                        <img src="{{ asset('storage/' . $article->thumbnail) }}"
                             alt="{{ $article->title }}"
                             class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                        @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-cyan-600/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        @endif
                    </a>

                    {{-- Body --}}
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-xs font-medium text-cyan-600 bg-cyan-500/10 px-2.5 py-1 rounded-full">Artikel</span>
                            <span class="text-ink-400 text-xs">{{ $article->published_at?->format('d M Y') }}</span>
                        </div>
                        <h2 class="font-display font-600 text-lg text-ink-900 mb-2 line-clamp-2 flex-1">
                            <a href="{{ route('artikel.show', $article->slug) }}"
                               class="hover:text-cyan-600 transition-colors">
                                {{ $article->title }}
                            </a>
                        </h2>
                        @if($article->excerpt)
                        <p class="text-ink-500 text-sm leading-relaxed mb-4 line-clamp-2">{{ $article->excerpt }}</p>
                        @endif
                        <a href="{{ route('artikel.show', $article->slug) }}"
                           class="mt-auto text-sm font-semibold text-cyan-600 hover:text-cyan-700 flex items-center gap-1.5 transition-colors">
                            Baca Selengkapnya
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                        </a>
                    </div>

                </article>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if($articles->hasPages())
            <div class="flex justify-center">
                {{ $articles->links() }}
            </div>
            @endif

            @endif

        </div>
    </section>

</x-layouts.app>
