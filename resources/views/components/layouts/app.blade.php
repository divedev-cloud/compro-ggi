@props([
    'title'       => 'PT Gagasan Gemilang Indonesia — Konsultan Pengembangan Ekonomi Lokal',
    'description' => 'GGI adalah konsultan pengembangan ekonomi lokal yang fokus pada UMKM, Koperasi, BUMDes, BUMD, dan ekonomi kreatif. Dari Gagasan Menjadi Gerakan, Dari Gerakan Menjadi Dampak.',
    'canonical'   => null,
    'ogImage'     => null,
])
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}" />
@if($canonical)
<link rel="canonical" href="{{ $canonical }}" />
@else
<link rel="canonical" href="{{ url()->current() }}" />
@endif

<meta name="google-site-verification" content="kzpncin2b7OeALBCOEjgqM1ajZItJ8pHEz1ufvdLb6M" />

{{-- Open Graph --}}
<meta property="og:type" content="website" />
<meta property="og:site_name" content="PT Gagasan Gemilang Indonesia" />
<meta property="og:title" content="{{ $title }}" />
<meta property="og:description" content="{{ $description }}" />
<meta property="og:url" content="{{ $canonical ?? url()->current() }}" />
@if($ogImage)
<meta property="og:image" content="{{ $ogImage }}" />
@else
<meta property="og:image" content="{{ asset('assets/logo.png') }}" />
@endif

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $title }}" />
<meta name="twitter:description" content="{{ $description }}" />

{{-- Schema.org Organization (global) --}}
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Organization",
  "name": "PT Gagasan Gemilang Indonesia",
  "alternateName": "GGI",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('assets/logo.png') }}",
  "description": "Konsultan pengembangan ekonomi lokal untuk UMKM, Koperasi, BUMDes, BUMD, dan ekonomi kreatif.",
  "foundingDate": "2012",
  "address": {
    "@@type": "PostalAddress",
    "streetAddress": "Bulus Wetan RT 02, Sumber Agung",
    "addressLocality": "Jetis",
    "addressRegion": "Bantul, D.I. Yogyakarta",
    "addressCountry": "ID"
  },
  "contactPoint": {
    "@@type": "ContactPoint",
    "telephone": "+62-853-3377-9893",
    "contactType": "customer service",
    "email": "info@gagasangemilangindonesia.com",
    "areaServed": "ID",
    "availableLanguage": "Indonesian"
  },
  "sameAs": []
}
</script>

{{-- Additional page-specific schema --}}
@stack('schema')

<link rel="stylesheet" href="{{ asset('style.css') }}" />
<link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}" />
@vite(['resources/css/app.css'])
</head>
<body class="font-body antialiased" {{ request()->routeIs('home') ? '' : 'data-inner-page="true"' }}>

<x-loader />

<div class="bg-aurora" aria-hidden="true"></div>
<div class="bg-grain" aria-hidden="true"></div>
<div class="cursor-glow" id="cursor-glow" aria-hidden="true"></div>

<x-navbar />

<main class="relative z-10">
    {{ $slot }}
</main>

<x-footer />

<button id="back-to-top" aria-label="Kembali ke atas">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
</button>

<script src="{{ asset('script.js') }}"></script>
</body>
</html>
