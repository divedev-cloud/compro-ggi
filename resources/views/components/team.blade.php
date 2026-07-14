<section id="team" class="section-pad relative overflow-hidden">
    <!-- Dekorasi Background -->
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyan-500/10 rounded-full blur-[120px] -z-10" aria-hidden="true">
    </div>

    <div class="max-w-7xl mx-auto px-5 sm:px-8">
        <!-- Header Section -->
        <div class="text-center max-w-2xl mx-auto mb-16 reveal">
            <span class="pill mb-6 inline-flex items-center gap-2">
                <span class="pill-dot"></span>Expert Team
            </span>
            <h2 class="font-display font-700 text-4xl sm:text-5xl leading-tight">
                Tim Ahli <span class="text-gradient-aurora">GGI</span>
            </h2>
        </div>

        <!-- Blok Profil Utama (Dewi Hadhy) -->
        <div class="flex flex-col gap-8 mb-16">
            {{-- Kartu utama: foto + bio + sertifikasi --}}
            <div class="glass-strong rounded-[2rem] overflow-hidden reveal-scale shadow-glow-cyan">
                <div class="grid lg:grid-cols-12 h-full">

                    <!-- Kolom Kiri: Foto -->
                    <div
                        class="lg:col-span-4 relative p-8 sm:p-12 flex flex-col items-center justify-center text-center bg-gradient-to-br from-indigo-700/40 to-violet-600/20">
                        <div class="absolute top-6 left-6 w-20 h-20 rounded-full bg-gold-500/20 blur-2xl"
                            aria-hidden="true"></div>
                        <div class="team-photo-ring w-40 h-40 sm:w-48 sm:h-48 mb-6 float-slow shrink-0">
                            <img src="{{ asset('assets/team-dewi-circle.png') }}" alt="Foto Dewi Hadhy, S.Si., MM."
                                loading="lazy" class="w-full h-full object-cover rounded-full" />
                        </div>
                        <h3 class="font-display font-700 text-xl text-ink-900 mb-1">Dewi Hadhy, S.Si., MM.</h3>
                        <p class="text-cyan-700 text-sm font-medium mb-6">Director / Lead Trainer</p>
                        <div class="glass rounded-full px-5 py-2.5 inline-flex items-center gap-2">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"
                                class="text-gold-600 shrink-0">
                                <path
                                    d="M12 2l2.9 6.26L21 9.27l-4.5 4.39 1.06 6.18L12 16.9l-5.56 2.94L7.5 13.66 3 9.27l6.1-1.01L12 2z" />
                            </svg>
                            <span class="text-xs font-semibold text-gold-700">15+ Tahun Pengalaman Lapangan</span>
                        </div>
                    </div>

                    <!-- Kolom Kanan: Detail & Sertifikasi -->
                    <div class="lg:col-span-8 p-8 sm:p-12 flex flex-col justify-center">
                        <span class="eyebrow inline-block mb-3">Profil Singkat</span>
                        <p class="text-ink-700 leading-relaxed mb-8 max-w-3xl">
                            Praktisi pemberdayaan masyarakat, pengembangan UMKM, BUMDes, desa wisata, ekonomi kreatif,
                            dan pengembangan ekonomi lokal dengan pengalaman lebih dari 15 tahun, memiliki berbagai
                            sertifikasi profesional bidang UMKM, coaching, dan pengembangan bisnis.
                        </p>

                        <span class="eyebrow inline-block mb-2">Sertifikasi Profesional</span>
                        <div class="divider-line mb-5"></div>

                        <div class="grid sm:grid-cols-2 gap-3 lg:gap-4">
                            <!-- Item Sertifikasi -->
                            <div
                                class="flex items-center gap-3 glass rounded-xl px-4 py-3.5 transition-transform hover:-translate-y-0.5">
                                <span class="icon-circle w-9! h-9! shrink-0">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M12 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM8.5 13.5 7 22l5-3 5 3-1.5-8.5" />
                                    </svg>
                                </span>
                                <span class="text-sm font-medium text-ink-700">Pendamping UMKM &ndash; BNSP</span>
                            </div>
                            <div
                                class="flex items-center gap-3 glass rounded-xl px-4 py-3.5 transition-transform hover:-translate-y-0.5">
                                <span class="icon-circle w-9! h-9! shrink-0">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="M2 12h20M12 2a15 15 0 0 1 0 20 15 15 0 0 1 0-20Z" />
                                    </svg>
                                </span>
                                <span class="text-sm font-medium text-ink-700">Digital Marketing &ndash; BNSP</span>
                            </div>
                            <div
                                class="flex items-center gap-3 glass rounded-xl px-4 py-3.5 transition-transform hover:-translate-y-0.5">
                                <span class="icon-circle w-9! h-9! shrink-0">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <rect x="2" y="6" width="20" height="12" rx="2" />
                                        <path d="M12 12h.01M6 12h.01M18 12h.01" />
                                    </svg>
                                </span>
                                <span class="text-sm font-medium text-ink-700">Keuangan UMKM &ndash; BNSP</span>
                            </div>
                            <div
                                class="flex items-center gap-3 glass rounded-xl px-4 py-3.5 transition-transform hover:-translate-y-0.5">
                                <span class="icon-circle w-9! h-9! shrink-0">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="m3 11 18-5v12L3 14v-3Z" />
                                        <path d="M11.6 16.8 6 19v-7" />
                                    </svg>
                                </span>
                                <span class="text-sm font-medium text-ink-700">Export Import UMKM &ndash; BNSP</span>
                            </div>
                            <div
                                class="flex items-center gap-3 glass rounded-xl px-4 py-3.5 transition-transform hover:-translate-y-0.5">
                                <span class="icon-circle w-9! h-9! shrink-0">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                        <circle cx="9" cy="7" r="4" />
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                                    </svg>
                                </span>
                                <span class="text-sm font-medium text-ink-700">Trainer Mentoring Program</span>
                            </div>
                            <div
                                class="flex items-center gap-3 glass rounded-xl px-4 py-3.5 transition-transform hover:-translate-y-0.5">
                                <span class="icon-circle w-9! h-9! shrink-0">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="8" r="6" />
                                        <path d="M15.5 13.5 17 22l-5-3-5 3 1.5-8.5" />
                                    </svg>
                                </span>
                                <span class="text-sm font-medium text-ink-700">Practical Coaching Skills &ndash;
                                    ASEAN</span>
                            </div>
                            <div
                                class="flex items-center gap-3 glass rounded-xl px-4 py-3.5 transition-transform hover:-translate-y-0.5">
                                <span class="icon-circle w-9! h-9! shrink-0">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path
                                            d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z" />
                                        <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 11 13 11 11" />
                                    </svg>
                                </span>
                                <span class="text-sm font-medium text-ink-700">Sustainability Reporting &ndash;
                                    GRI</span>
                            </div>
                            <div
                                class="flex items-center gap-3 glass rounded-xl px-4 py-3.5 transition-transform hover:-translate-y-0.5">
                                <span class="icon-circle w-9! h-9! shrink-0">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <rect x="2" y="7" width="20" height="14" rx="2" />
                                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                                    </svg>
                                </span>
                                <span class="text-sm font-medium text-ink-700">BKB Coach &ndash; SME Development</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Rekam Jejak (Masih dalam Konteks Profil Utama) --}}
            <div class="glass-strong rounded-[2rem] p-8 sm:p-10 lg:p-12 reveal-scale">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-1.5 h-6 rounded-full bg-linear-to-b from-gold-500 to-cyan-500 shrink-0"></div>
                    <h3
                        class="text-sm sm:text-base font-semibold text-ink-700 tracking-wide uppercase whitespace-nowrap">
                        Rekam Jejak Lapangan</h3>
                    <div class="divider-line flex-1"></div>
                    <p class="text-ink-500 italic text-sm hidden md:block whitespace-nowrap">&mdash; Dewi Rinawati
                        Hadhy</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="reveal-scale" data-delay="0">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="icon-circle w-10! h-10! shrink-0 bg-cyan-500/10 text-cyan-700">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M3 9h18M3 9l1.5-5h15L21 9M3 9v10a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V9M9 21V13h6v8" />
                                </svg>
                            </div>
                            <h4 class="font-display font-600 text-base text-ink-900">Pengembangan UMKM</h4>
                        </div>
                        <ul class="space-y-3 pl-1">
                            <li class="dot-list-item text-ink-600 text-sm leading-relaxed">Pendampingan UMKM Kota
                                Magelang</li>
                            <li class="dot-list-item text-ink-600 text-sm leading-relaxed">Kurator produk untuk program
                                scale-up</li>
                            <li class="dot-list-item text-ink-600 text-sm leading-relaxed">Kurasi konsinyasi Bandara
                                YIA</li>
                            <li class="dot-list-item text-ink-600 text-sm leading-relaxed">Pendampingan ekspor UMKM ke
                                Malaysia</li>
                            <li class="dot-list-item text-ink-600 text-sm leading-relaxed">Narasumber kewirausahaan
                                sejak 2012</li>
                        </ul>
                    </div>

                    <div class="reveal-scale" data-delay="80">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="icon-circle w-10! h-10! shrink-0 bg-gold-500/10 text-gold-700">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z" />
                                    <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 11 13 11 11" />
                                </svg>
                            </div>
                            <h4 class="font-display font-600 text-base text-ink-900">Pengembangan Desa &amp; BUMDes
                            </h4>
                        </div>
                        <ul class="space-y-3 pl-1">
                            <li class="dot-list-item text-ink-600 text-sm leading-relaxed">Founder Sekolah BUMDes
                                Elfira Manajemen</li>
                            <li class="dot-list-item text-ink-600 text-sm leading-relaxed">Konsultan BUMDes berbagai
                                daerah Indonesia</li>
                            <li class="dot-list-item text-ink-600 text-sm leading-relaxed">Pendampingan BUMDes Kab.
                                Pegunungan Bintang</li>
                            <li class="dot-list-item text-ink-600 text-sm leading-relaxed">Penyusunan Renstra BUMDes
                                Papua</li>
                            <li class="dot-list-item text-ink-600 text-sm leading-relaxed">Pendampingan Desa Wisata
                                Kab. Klaten</li>
                        </ul>
                    </div>

                    <div class="reveal-scale" data-delay="160">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="icon-circle w-10! h-10! shrink-0 bg-violet-500/10 text-violet-700">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M3 21h18M5 21V7l8-4 8 4v14M9 9h1M9 13h1M14 9h1M14 13h1M9 21v-4h6v4" />
                                </svg>
                            </div>
                            <h4 class="font-display font-600 text-base text-ink-900">Program Nasional &amp; Strategis
                            </h4>
                        </div>
                        <ul class="space-y-3 pl-1">
                            <li class="dot-list-item text-ink-600 text-sm leading-relaxed">Tim P2KTD Bantul, Sleman,
                                Gunungkidul</li>
                            <li class="dot-list-item text-ink-600 text-sm leading-relaxed">Tim Pengarah Rembug Desa
                                Nasional</li>
                            <li class="dot-list-item text-ink-600 text-sm leading-relaxed">Tim Assessment Nilam &ndash;
                                Kemenkop RI</li>
                            <li class="dot-list-item text-ink-600 text-sm leading-relaxed">Pendampingan 7 Desa
                                Mandalika bersama BI NTB</li>
                            <li class="dot-list-item text-ink-600 text-sm leading-relaxed">Narasumber nasional BUMDes
                                dan UMKM</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid Anggota Tim Lainya -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
            <div class="glass-card p-8 text-center reveal-scale flex flex-col items-center justify-center"
                data-delay="0" data-tilt>
                <div class="team-photo-ring w-28 h-28 mx-auto mb-6 shrink-0">
                    <img src="{{ asset('assets/team-yudho.png') }}" alt="Foto Yudho Indardjo" loading="lazy"
                        class="w-full h-full object-cover rounded-full" />
                </div>
                <h3 class="font-display font-600 text-ink-900 text-lg mb-2">Yudho Indardjo</h3>
                <p class="text-cyan-700 text-xs font-bold mb-3 uppercase tracking-wider">Strategic Assessment &amp;
                    Mapping</p>
                <p class="text-ink-500 text-sm leading-relaxed">Assessment, Mapping &amp; Strategic Analysis</p>
            </div>

            <div class="glass-card p-8 text-center reveal-scale flex flex-col items-center justify-center"
                data-delay="80" data-tilt>
                <div class="team-photo-ring w-28 h-28 mx-auto mb-6 shrink-0">
                    <img src="{{ asset('assets/team-yuliana.png') }}" alt="Foto Yuliana Fitri, SE., M.Pd"
                        loading="lazy" class="w-full h-full object-cover rounded-full" />
                </div>
                <h3 class="font-display font-600 text-ink-900 text-lg mb-2">Yuliana Fitri, SE., M.Pd</h3>
                <p class="text-gold-700 text-xs font-bold mb-3 uppercase tracking-wider">Community &amp; Creative</p>
                <p class="text-ink-500 text-sm leading-relaxed">Pengembangan Produk Kreatif &amp; Wastra</p>
            </div>

            <div class="glass-card p-8 text-center reveal-scale flex flex-col items-center justify-center"
                data-delay="160" data-tilt>
                <div class="team-photo-ring w-28 h-28 mx-auto mb-6 shrink-0">
                    <img src="{{ asset('assets/team-jessica.png') }}" alt="Foto Jessica Alejandro, SE., MM"
                        loading="lazy" class="w-full h-full object-cover rounded-full" />
                </div>
                <h3 class="font-display font-600 text-ink-900 text-lg mb-2">Jessica Alejandro, SE., MM</h3>
                <p class="text-gold-700 text-xs font-bold mb-3 uppercase tracking-wider">Community &amp; Engagement</p>
                <p class="text-ink-500 text-sm leading-relaxed">Community Engagement &amp; Facilitation</p>
            </div>

            <div class="glass-card p-8 text-center reveal-scale flex flex-col items-center justify-center"
                data-delay="240" data-tilt>
                <div class="team-photo-ring w-28 h-28 mx-auto mb-6 shrink-0">
                    <img src="{{ asset('assets/team-dimas-new.png') }}" alt="Foto Dimas Panji A. Rohmatulloh"
                        loading="lazy" class="w-full h-full object-cover rounded-full" />
                </div>
                <h3 class="font-display font-600 text-ink-900 text-lg mb-2">Dimas Panji A. R</h3>
                <p class="text-violet-700 text-xs font-bold mb-3 uppercase tracking-wider">Research &amp; Impact</p>
                <p class="text-ink-500 text-sm leading-relaxed">Qualitative Study &amp; Impact Measurement Specialist
                </p>
            </div>
        </div>

    </div>
</section>
