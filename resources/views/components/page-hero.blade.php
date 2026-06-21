@props([
    'title'       => '',
    'subtitle'    => '',
    'breadcrumbs' => [],
    'titleClass'  => 'text-4xl sm:text-5xl lg:text-6xl',
])

@if(count($breadcrumbs) > 0)
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {"@@type":"ListItem","position":1,"name":"Beranda","item":"{{ url('/') }}"}
    @foreach($breadcrumbs as $i => $crumb)
    ,{"@@type":"ListItem","position":{{ $i + 2 }},"name":"{{ $crumb['label'] }}"@if(isset($crumb['url'])),"item":"{{ $crumb['url'] }}"@endif}
    @endforeach
  ]
}
</script>
@endif

<section class="inner-page-hero relative overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-175 h-64 bg-cyan-500/10 rounded-full blur-[130px] -z-10" aria-hidden="true"></div>
    <div class="absolute bottom-0 right-1/4 w-64 h-64 bg-violet-500/10 rounded-full blur-[100px] -z-10" aria-hidden="true"></div>

    <div class="max-w-7xl mx-auto px-5 sm:px-8">

        {{-- Breadcrumb --}}
        <nav aria-label="Breadcrumb" class="mb-6">
            <ol class="flex flex-wrap items-center gap-1.5 text-sm text-ink-500">
                <li>
                    <a href="{{ route('home') }}" class="hover:text-cyan-600 transition-colors">Beranda</a>
                </li>
                @foreach($breadcrumbs as $i => $crumb)
                <li aria-hidden="true">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </li>
                <li @if($i === array_key_last($breadcrumbs) && strlen($crumb['label']) > 40) class="max-w-[180px] sm:max-w-xs truncate" @endif>
                    @if(isset($crumb['url']))
                        <a href="{{ $crumb['url'] }}" class="hover:text-cyan-600 transition-colors">{{ $crumb['label'] }}</a>
                    @else
                        <span class="text-ink-900 font-medium">{{ Str::limit($crumb['label'], 40) }}</span>
                    @endif
                </li>
                @endforeach
            </ol>
        </nav>

        {{-- Heading --}}
        <h1 class="font-display font-700 {{ $titleClass }} leading-[1.15] mb-4 reveal">{!! $title !!}</h1>

        @if($subtitle)
        <p class="text-ink-500 text-base sm:text-lg max-w-2xl leading-relaxed reveal">{{ $subtitle }}</p>
        @endif

    </div>
</section>
