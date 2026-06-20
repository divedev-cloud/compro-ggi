<header class="navbar" id="navbar">
    <nav class="max-w-7xl mx-auto px-5 sm:px-8 flex items-center justify-between h-20">
        <a href="#home" class="flex items-center gap-3 group">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo GGI" class="h-11 w-auto drop-shadow-[0_4px_14px_rgba(15,27,51,0.12)] transition-transform duration-500 group-hover:scale-105" />
            <span class="hidden sm:flex flex-col leading-tight">
                <span class="font-display font-700 text-sm tracking-wide text-ink-900">GAGASAN GEMILANG</span>
                <span class="text-[0.65rem] tracking-[0.25em] text-cyan-600 font-semibold">INDONESIA</span>
            </span>
        </a>

        <div class="hidden lg:flex items-center gap-9">
            <a href="#about" class="nav-link">Tentang</a>
            {{-- <a href="#services" class="nav-link">Layanan</a> --}}
            <a href="#approach" class="nav-link">Pendekatan</a>
            <a href="#programs" class="nav-link">Program</a>
            <a href="#team" class="nav-link">Tim</a>

            <a href="#partners" class="nav-link">Mitra</a>
            <a href="#contact" class="nav-link">Kontak</a>
        </div>

        <div class="hidden lg:block">
            <a href="#contact" class="btn-primary">
                Hubungi Kami
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
        </div>

        <button id="hamburger" class="hamburger lg:hidden flex flex-col justify-center items-center w-10 h-10" aria-label="Buka menu">
            <span class="hamburger-line line-1"></span>
            <span class="hamburger-line line-2"></span>
            <span class="hamburger-line line-3"></span>
        </button>
    </nav>
</header>

<div class="mobile-menu" id="mobile-menu">
    <a href="#about" class="font-display text-2xl font-600 text-ink-900">Tentang</a>
    <a href="#services" class="font-display text-2xl font-600 text-ink-900">Layanan</a>
    <a href="#approach" class="font-display text-2xl font-600 text-ink-900">Pendekatan</a>
    <a href="#team" class="font-display text-2xl font-600 text-ink-900">Tim</a>
    <a href="#programs" class="font-display text-2xl font-600 text-ink-900">Program</a>
    <a href="#partners" class="font-display text-2xl font-600 text-ink-900">Mitra</a>
    <a href="#contact" class="btn-primary mt-4">Hubungi Kami</a>
</div>
