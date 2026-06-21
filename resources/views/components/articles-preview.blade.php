@php
    $latestArticles = \App\Models\Article::where('status', 'published')
        ->with('author')
        ->latest('published_at')
        ->take(3)
        ->get();
@endphp

@if($latestArticles->isNotEmpty())
<section id="artikel" class="section-pad relative overflow-hidden">
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-cyan-500/10 rounded-full blur-[130px] -z-10" aria-hidden="true"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-violet-500/10 rounded-full blur-[120px] -z-10" aria-hidden="true"></div>

    <div class="max-w-7xl mx-auto px-5 sm:px-8 relative">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 lg:mb-16 reveal">
            <div class="max-w-2xl">
                <span class="pill mb-4 inline-flex items-center gap-2">
                    <span class="pill-dot"></span>Dari Lapangan
                </span>
                <h2 class="font-display font-700 text-3xl sm:text-4xl lg:text-5xl leading-tight">
                    Artikel <span class="text-gradient-aurora">Terbaru</span>
                </h2>
            </div>
            <a href="{{ route('artikel.index') }}"
               class="inline-flex items-center justify-start md:justify-end gap-2 text-sm font-semibold text-cyan-600 hover:text-cyan-700 transition-colors group">
                Lihat Semua Artikel
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="transition-transform group-hover:translate-x-1">
                    <path d="M5 12h14M13 6l6 6-6 6"/>
                </svg>
            </a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @foreach($latestArticles as $i => $article)
            <article class="glass-card group overflow-hidden flex flex-col reveal-scale transition-all duration-300 hover:shadow-glow-cyan hover:-translate-y-1" data-delay="{{ $i * 80 }}" data-tilt>

                {{-- Thumbnail --}}
                <a href="{{ route('artikel.show', $article->slug) }}" class="block aspect-[16/9] overflow-hidden bg-gradient-to-br from-cyan-900/5 to-violet-900/5 flex-shrink-0 relative">
                    @if($article->thumbnail)
                    <img src="{{ asset('storage/' . $article->thumbnail) }}"
                         alt="{{ $article->title }}"
                         loading="lazy"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    @else
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-cyan-600/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-ink-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                </a>

                {{-- Body Konten --}}
                <div class="p-6 sm:p-7 flex flex-col flex-1">
                    <div class="flex items-center gap-3 mb-4 flex-wrap">
                        <span class="text-[0.65rem] sm:text-xs font-bold text-cyan-700 bg-cyan-500/10 px-3 py-1.5 rounded-full uppercase tracking-wider">Artikel</span>
                        <span class="text-ink-400 text-xs flex items-center gap-1.5">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                            </svg>
                            {{ $article->published_at?->format('d M Y') }}
                        </span>
                        @if($article->author?->full_name ?? $article->author?->name)
                        <span class="text-ink-400 text-xs flex items-center gap-1.5">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            {{ $article->author?->full_name ?? $article->author?->name }}
                        </span>
                        @endif
                    </div>

                    <h3 class="font-display font-600 text-lg sm:text-xl text-ink-900 mb-3 line-clamp-2">
                        <a href="{{ route('artikel.show', $article->slug) }}" class="group-hover:text-cyan-600 transition-colors">
                            {{ $article->title }}
                        </a>
                    </h3>

                    @if($article->excerpt)
                    <p class="text-ink-500 text-sm leading-relaxed mb-6 line-clamp-2 sm:line-clamp-3">
                        {{ $article->excerpt }}
                    </p>
                    @endif

                    <div class="mt-auto pt-4 border-t border-ink-200/50">
                        <a href="{{ route('artikel.show', $article->slug) }}"
                           class="text-sm font-semibold text-cyan-600 group-hover:text-cyan-700 flex items-center gap-2 transition-colors">
                            Baca Selengkapnya
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300 group-hover:translate-x-1.5">
                                <path d="M5 12h14M13 6l6 6-6 6"/>
                            </svg>
                        </a>
                    </div>
                </div>

            </article>
            @endforeach
        </div>

    </div>
</section>
@endif
