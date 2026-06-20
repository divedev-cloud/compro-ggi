<section id="programs" class="section-pad relative">
    <div class="absolute top-0 right-0 w-96 h-96 bg-violet-600/15 rounded-full blur-[130px] -z-10" aria-hidden="true"></div>
    <div class="absolute bottom-1/3 left-0 w-80 h-80 bg-gold-500/10 rounded-full blur-[120px] -z-10" aria-hidden="true"></div>

    <div class="max-w-7xl mx-auto px-5 sm:px-8">

        <div class="text-center max-w-2xl mx-auto mb-4 reveal">
            <span class="pill mb-6"><span class="pill-dot"></span>Apa yang Kami Tawarkan</span>
            <h2 class="font-display font-700 text-4xl sm:text-5xl leading-tight">
                Program <span class="text-gradient-aurora">Unggulan</span>
            </h2>
        </div>
        <p class="text-center text-ink-500 max-w-xl mx-auto mb-14 reveal">
            Dirancang dari pengalaman lapangan nyata dan dapat disesuaikan dengan kebutuhan daerah, lembaga, maupun komunitas Anda.
        </p>

        {{-- 3 Program Cards Terpilih --}}
        <div class="grid md:grid-cols-3 gap-6 mb-10">

            <div class="glass-card p-7 reveal-scale" data-delay="0" data-tilt>
                <div class="icon-circle mb-5">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9h18M3 9l1.5-5h15L21 9M3 9v10a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V9M9 21V13h6v8"/></svg>
                </div>
                <h3 class="font-display font-600 text-lg text-ink-900 mb-2">Pelatihan Wirausaha</h3>
                <p class="text-ink-500 text-sm leading-relaxed mb-4">Program pelatihan kewirausahaan intensif untuk mencetak pelaku usaha yang mandiri, inovatif, dan berdaya saing.</p>
                <a href="{{ route('programs') }}#pelatihan-wirausaha" class="text-sm font-semibold text-cyan-600 hover:text-cyan-700 flex items-center gap-1.5 transition-colors">
                    Selengkapnya
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
            </div>

            <div class="glass-card p-7 reveal-scale" data-delay="80" data-tilt>
                <div class="icon-circle mb-5">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h3 class="font-display font-600 text-lg text-ink-900 mb-2">Pendampingan UMKM &amp; Koperasi</h3>
                <p class="text-ink-500 text-sm leading-relaxed mb-4">Pendampingan menyeluruh mulai dari penguatan kelembagaan hingga akses pembiayaan dan pasar.</p>
                <a href="{{ route('programs') }}#pendampingan-umkm" class="text-sm font-semibold text-cyan-600 hover:text-cyan-700 flex items-center gap-1.5 transition-colors">
                    Selengkapnya
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
            </div>

            <div class="glass-card p-7 reveal-scale" data-delay="160" data-tilt>
                <div class="icon-circle mb-5">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2 2 7l10 5 10-5-10-5ZM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                </div>
                <h3 class="font-display font-600 text-lg text-ink-900 mb-2">Pengembangan Ekonomi Daerah</h3>
                <p class="text-ink-500 text-sm leading-relaxed mb-4">Pendampingan pemerintah daerah dalam merancang ekosistem ekonomi lokal yang kompetitif dan berkelanjutan.</p>
                <a href="{{ route('programs') }}#ekonomi-daerah" class="text-sm font-semibold text-cyan-600 hover:text-cyan-700 flex items-center gap-1.5 transition-colors">
                    Selengkapnya
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
            </div>

        </div>

        {{-- CTA Lihat Semua --}}
        <div class="text-center reveal">
            <a href="{{ route('programs') }}" class="btn-primary">
                Lihat Semua Program
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
        </div>

    </div>
</section>
