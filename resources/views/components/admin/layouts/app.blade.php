@props([
    'title'    => 'Admin',
    'subtitle' => null,
])
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin' }} — GGI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

{{-- Overlay (mobile) --}}
<div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden"></div>

<div class="flex h-screen w-full overflow-hidden relative">

    {{-- Sidebar --}}
    <aside id="sidebar"
           class="absolute inset-y-0 left-0 z-50 w-64 bg-slate-900 flex flex-col
                  -translate-x-full transition-transform duration-300 ease-in-out
                  lg:static lg:translate-x-0 lg:z-auto lg:flex-shrink-0">

        {{-- Brand + tombol tutup (mobile) --}}
        <div class="flex items-center gap-3 px-5 py-4 border-b border-slate-700/60 flex-shrink-0">
            <div class="w-8 h-8 bg-cyan-600 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-white text-sm font-bold leading-tight">GGI Admin</p>
                <p class="text-cyan-400 text-xs">Panel Manajemen</p>
            </div>
            <button id="sidebar-close" class="lg:hidden text-slate-300 hover:text-white transition-colors p-1.5 rounded-lg hover:bg-slate-800" aria-label="Tutup menu">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
            <p class="text-slate-400 text-xs font-bold uppercase tracking-wider px-3 mb-2">Konten</p>

            <a href="{{ route('admin.articles.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.articles.*') ? 'bg-cyan-600 text-white shadow-md shadow-cyan-900/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Artikel
            </a>

            <p class="text-slate-400 text-xs font-bold uppercase tracking-wider px-3 mt-5 mb-2">Manajemen</p>

            <a href="{{ route('admin.users.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-cyan-600 text-white shadow-md shadow-cyan-900/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                Pengguna
            </a>

            <a href="{{ route('admin.contacts.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.contacts.*') ? 'bg-cyan-600 text-white shadow-md shadow-cyan-900/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>
                Pesan Masuk
            </a>

            <p class="text-slate-400 text-xs font-bold uppercase tracking-wider px-3 mt-5 mb-2">Lainnya</p>

            <a href="{{ url('/') }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors text-slate-300 hover:bg-slate-800 hover:text-white">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                Lihat Website
            </a>
        </nav>

        {{-- User & Logout --}}
        <div class="px-4 py-4 border-t border-slate-700/60 flex-shrink-0">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-8 h-8 rounded-full bg-cyan-600/20 border border-cyan-600/40 flex items-center justify-center text-cyan-400 text-xs font-bold flex-shrink-0">
                    {{ strtoupper(substr(auth()->user()->full_name ?? auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-white text-sm font-medium truncate">{{ auth()->user()->full_name ?? auth()->user()->name ?? '' }}</p>
                    <p class="text-slate-400 text-xs truncate">&#64;{{ auth()->user()->name ?? '' }}</p>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-2 text-slate-300 hover:text-white text-sm py-2 px-3 rounded-lg hover:bg-slate-800 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Keluar
                </button>
            </form>
        </div>

    </aside>

    {{-- Main content --}}
    <div class="flex-1 flex flex-col overflow-hidden min-w-0">

        {{-- Top bar --}}
        <header class="bg-white border-b border-slate-200 px-4 sm:px-6 py-3.5 flex items-center gap-3 flex-shrink-0 shadow-sm">

            {{-- Hamburger (mobile only) --}}
            <button id="sidebar-toggle"
                    class="lg:hidden flex-shrink-0 text-slate-500 hover:text-slate-700 p-1.5 rounded-lg hover:bg-slate-100 transition-colors"
                    aria-label="Buka menu navigasi">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <div class="flex-1 min-w-0">
                <h1 class="text-slate-900 font-semibold text-base sm:text-lg leading-tight truncate">{{ $title ?? 'Dasbor' }}</h1>
                @isset($subtitle)
                <p class="text-slate-400 text-xs sm:text-sm truncate">{{ $subtitle }}</p>
                @endisset
            </div>

            <div class="hidden sm:block text-sm text-slate-400 flex-shrink-0">
                {{ now()->locale('id')->isoFormat('D MMMM Y') }}
            </div>
        </header>

        {{-- Scrollable content area --}}
        <main class="flex-1 overflow-y-auto p-4 sm:p-6">

            @if(session('success'))
            <div class="mb-5 bg-emerald-50 border border-emerald-200 rounded-lg px-4 py-3 text-emerald-800 text-sm flex items-center gap-2">
                <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="mb-5 bg-red-50 border border-red-200 rounded-lg px-4 py-3 text-red-700 text-sm flex items-center gap-2">
                <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                {{ session('error') }}
            </div>
            @endif

            {{ $slot }}

        </main>
    </div>
</div>

<script>
    const sidebar  = document.getElementById('sidebar');
    const overlay  = document.getElementById('sidebar-overlay');
    const toggle   = document.getElementById('sidebar-toggle');
    const closeBtn = document.getElementById('sidebar-close');

    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.style.overflow = '';
    }

    if (toggle) toggle.addEventListener('click', openSidebar);
    if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
    if (overlay) overlay.addEventListener('click', closeSidebar);

    // Reset saat resize ke desktop
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) {
            if (overlay) overlay.classList.add('hidden');
            document.body.style.overflow = '';
        }
    });
</script>

@stack('scripts')
</body>
</html>
