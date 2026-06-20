<header class="navbar" id="navbar">
    <nav class="max-w-7xl mx-auto px-5 sm:px-8 flex items-center justify-between h-20">
        <a href="{{ route('home') }}" class="flex items-center gap-3 group">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo GGI"
                class="h-11 w-auto drop-shadow-[0_4px_14px_rgba(15,27,51,0.12)] transition-transform duration-500 group-hover:scale-105" />
            <span class="hidden sm:flex flex-col leading-tight">
                <span class="font-display font-700 text-sm tracking-wide text-ink-900">GAGASAN GEMILANG</span>
                <span class="text-[0.65rem] tracking-[0.25em] text-cyan-600 font-semibold">INDONESIA</span>
            </span>
        </a>

        <div class="hidden lg:flex items-center gap-10 xl:gap-12">

            <a href="{{ route('home') }}"
                class="nav-link {{ request()->routeIs('home') ? 'text-cyan-600 font-semibold' : '' }}">Beranda</a>

            {{-- Dropdown: Tentang Kami --}}
            <div class="group relative">
                <a href="{{ route('about') }}"
                    class="nav-link flex items-center gap-1 {{ request()->routeIs('about') ? 'text-cyan-600 font-semibold' : '' }}">
                    Tentang Kami
                    {{-- <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                        class="transition-transform duration-200 group-hover:rotate-180" aria-hidden="true">
                        <path d="m6 9 6 6 6-6" />
                    </svg> --}}
                </a>
                <div
                    class="absolute left-1/2 top-full -translate-x-1/2
            w-56 bg-white/95 backdrop-blur-xl
            border border-[#0F1B33]/[0.08]
            rounded-2xl shadow-xl py-2
            opacity-0 invisible
            translate-y-2
            group-hover:opacity-100
            group-hover:visible
            group-hover:translate-y-0
            transition-all duration-200
            z-50">
                    <a href="{{ route('about') }}#about"
                        class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-ink-700 hover:text-cyan-600 hover:bg-[#f4f6fb] rounded-xl mx-1.5 transition-colors">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 21h18M5 21V7l8-4 8 4v14" />
                        </svg>
                        Profil Perusahaan
                    </a>
                    <a href="{{ route('about') }}#visi-misi"
                        class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-ink-700 hover:text-cyan-600 hover:bg-[#f4f6fb] rounded-xl mx-1.5 transition-colors">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 18h6M10 22h4M12 2a7 7 0 0 0-4 12.7V17h8v-2.3A7 7 0 0 0 12 2Z" />
                        </svg>
                        Visi &amp; Misi
                    </a>
                    <a href="{{ route('about') }}#team"
                        class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-ink-700 hover:text-cyan-600 hover:bg-[#f4f6fb] rounded-xl mx-1.5 transition-colors">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        Tim Ahli
                    </a>
                </div>
            </div>

            {{-- Dropdown: Program --}}
            <div class="group relative py-4">
                <a href="{{ route('programs') }}"
                    class="nav-link flex items-center gap-1 {{ request()->routeIs('programs') ? 'text-cyan-600 font-semibold' : '' }}">
                    Program
                    {{-- <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                        class="transition-transform duration-200 group-hover:rotate-180" aria-hidden="true">
                        <path d="m6 9 6 6 6-6" />
                    </svg> --}}
                </a>
                <div
                    class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-64 bg-white/95 backdrop-blur-xl border border-[#0F1B33]/[0.08] rounded-2xl shadow-xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                    <a href="{{ route('programs') }}#pelatihan-wirausaha"
                        class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-ink-700 hover:text-cyan-600 hover:bg-[#f4f6fb] rounded-xl mx-1.5 transition-colors">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9h18M3 9l1.5-5h15L21 9M3 9v10a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V9M9 21V13h6v8" />
                        </svg>
                        Pelatihan Wirausaha
                    </a>
                    <a href="{{ route('programs') }}#sekolah-kepala-desa"
                        class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-ink-700 hover:text-cyan-600 hover:bg-[#f4f6fb] rounded-xl mx-1.5 transition-colors">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 21h18M5 21V7l8-4 8 4v14M9 9h1M9 13h1M14 9h1M14 13h1M9 21v-4h6v4" />
                        </svg>
                        Sekolah Kepala Desa
                    </a>
                    <a href="{{ route('programs') }}#sekolah-kepala-dinas"
                        class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-ink-700 hover:text-cyan-600 hover:bg-[#f4f6fb] rounded-xl mx-1.5 transition-colors">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="4" y="2" width="16" height="20" rx="1" />
                            <path d="M9 22v-4h6v4M9 6h1M14 6h1M9 10h1M14 10h1M9 14h1M14 14h1" />
                        </svg>
                        Sekolah Kepala Dinas
                    </a>
                    <a href="{{ route('programs') }}#business-camp"
                        class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-ink-700 hover:text-cyan-600 hover:bg-[#f4f6fb] rounded-xl mx-1.5 transition-colors">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8 21h8M12 17v4M7 4h10l-1 9a4 4 0 0 1-8 0L7 4Z" />
                        </svg>
                        Business &amp; Creative Camp
                    </a>
                    <a href="{{ route('programs') }}#pendampingan-umkm"
                        class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-ink-700 hover:text-cyan-600 hover:bg-[#f4f6fb] rounded-xl mx-1.5 transition-colors">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                        </svg>
                        Pendampingan UMKM &amp; Koperasi
                    </a>
                    <a href="{{ route('programs') }}#ekonomi-daerah"
                        class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-ink-700 hover:text-cyan-600 hover:bg-[#f4f6fb] rounded-xl mx-1.5 transition-colors">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2 2 7l10 5 10-5-10-5ZM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                        Pengembangan Ekonomi Daerah
                    </a>
                </div>
            </div>

            <a href="{{ route('home') }}#partners" class="nav-link">Mitra</a>
            <a href="{{ route('contact.page') }}"
                class="nav-link {{ request()->routeIs('contact.page') ? 'text-cyan-600 font-semibold' : '' }}">Kontak</a>
        </div>

        <div class="hidden lg:block">
            <a href="{{ route('contact.page') }}" class="btn-primary">
                Hubungi Kami
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14M13 6l6 6-6 6" />
                </svg>
            </a>
        </div>

        <button id="hamburger" class="hamburger lg:hidden flex flex-col justify-center items-center w-10 h-10"
            aria-label="Buka menu">
            <span class="hamburger-line line-1"></span>
            <span class="hamburger-line line-2"></span>
            <span class="hamburger-line line-3"></span>
        </button>
    </nav>
</header>

<div class="mobile-menu" id="mobile-menu">
    <a href="{{ route('home') }}" class="font-display text-2xl font-600 text-ink-900">Beranda</a>
    <a href="{{ route('about') }}" class="font-display text-2xl font-600 text-ink-900">Tentang Kami</a>
    <a href="{{ route('programs') }}" class="font-display text-2xl font-600 text-ink-900">Program</a>
    <a href="{{ route('home') }}#partners" class="font-display text-2xl font-600 text-ink-900">Mitra</a>
    <a href="{{ route('contact.page') }}" class="font-display text-2xl font-600 text-ink-900">Kontak</a>
    <a href="{{ route('contact.page') }}" class="btn-primary mt-4">Hubungi Kami</a>
</div>
