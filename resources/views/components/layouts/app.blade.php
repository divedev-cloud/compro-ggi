<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>PT Gagasan Gemilang Indonesia — Konsultan Pengembangan Ekonomi Lokal</title>
<meta name="description" content="GGI adalah konsultan pengembangan ekonomi lokal yang fokus pada UMKM, Koperasi, BUMDes, BUMD, dan ekonomi kreatif. Dari Gagasan Menjadi Gerakan, Dari Gerakan Menjadi Dampak." />
<link rel="stylesheet" href="{{ asset('style.css') }}" />
<link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}" />
@vite(['resources/css/app.css'])
</head>
<body class="font-body antialiased">

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
