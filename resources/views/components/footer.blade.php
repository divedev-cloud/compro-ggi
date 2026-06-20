<footer class="relative border-t border-[#0F1B33]/[0.08] bg-cloudsoft pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-5 sm:px-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">

            <div class="lg:col-span-2">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 mb-5">
                    <img src="{{ asset('assets/logo.png') }}" alt="Logo GGI" class="h-10 w-auto" />
                    <span class="font-display font-700 text-ink-900 text-sm leading-tight">PT Gagasan Gemilang<br/>Indonesia</span>
                </a>
                <p class="text-ink-500 text-sm leading-relaxed max-w-sm mb-5">
                    Dari Gagasan Menjadi Gerakan, Dari Gerakan Menjadi Dampak. Konsultan pengembangan ekonomi lokal untuk UMKM, Koperasi, BUMDes, BUMD, dan ekonomi kreatif.
                </p>
                <div class="flex gap-3">
                    <a href="#" aria-label="Instagram" class="icon-circle !w-10 !h-10 hover:!shadow-glow-cyan"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37Z"/><path d="M17.5 6.5h.01"/></svg></a>
                    <a href="#" aria-label="WhatsApp" class="icon-circle !w-10 !h-10 hover:!shadow-glow-cyan"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5Z"/></svg></a>
                    <a href="#" aria-label="LinkedIn" class="icon-circle !w-10 !h-10 hover:!shadow-glow-cyan"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6Z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg></a>
                </div>
            </div>

            <div>
                <h4 class="font-display font-600 text-ink-900 text-sm mb-5">Navigasi</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ route('about') }}" class="text-ink-500 hover:text-cyan-600 transition-colors">Tentang Kami</a></li>
                    <li><a href="{{ route('about') }}#visi-misi" class="text-ink-500 hover:text-cyan-600 transition-colors">Visi &amp; Misi</a></li>
                    <li><a href="{{ route('about') }}#team" class="text-ink-500 hover:text-cyan-600 transition-colors">Tim Ahli</a></li>
                    <li><a href="{{ route('programs') }}" class="text-ink-500 hover:text-cyan-600 transition-colors">Program Unggulan</a></li>
                    <li><a href="{{ route('home') }}#partners" class="text-ink-500 hover:text-cyan-600 transition-colors">Mitra &amp; Klien</a></li>
                    <li><a href="{{ route('contact.page') }}" class="text-ink-500 hover:text-cyan-600 transition-colors">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-display font-600 text-ink-900 text-sm mb-5">Kontak</h4>
                <ul class="space-y-3 text-sm">
                    <li class="text-ink-500">+62 853-3377-9893</li>
                    <li class="text-ink-500">info@gagasangemilangindonesia.com</li>
                    <li class="text-ink-500 leading-relaxed">Bulus Wetan, Sumber Agung,<br/>Jetis, Bantul, D.I. Yogyakarta</li>
                </ul>
            </div>

        </div>

        <div class="divider-line mb-7"></div>

        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-ink-400">
            <p>&copy; {{ date('Y') }} PT Gagasan Gemilang Indonesia. Seluruh hak cipta dilindungi.</p>
            <p class="flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-cyan-500 inline-block"></span>
                Ideas &middot; Collaboration &middot; Impact
            </p>
        </div>
    </div>
</footer>
