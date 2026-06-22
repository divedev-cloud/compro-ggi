<section id="home" class="relative min-h-screen flex items-center overflow-hidden pt-28 pb-32 lg:pb-16">
    <canvas id="particles-canvas" aria-hidden="true"></canvas>

    <div class="absolute inset-0 -z-10" aria-hidden="true">
        {{-- Wrapper opacity membatasi maks visibility gambar, JS tetap bisa fade antar slide --}}
        <div class="absolute inset-0" style="opacity:0.09">
            <div class="hero-bg-slide absolute inset-0 bg-cover bg-center transition-opacity duration-2000" style="background-image:url('{{ asset('assets/hero-1.jpg') }}');"></div>
            <div class="hero-bg-slide absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-2000" style="background-image:url('{{ asset('assets/hero-2.jpg') }}');"></div>
            <div class="hero-bg-slide absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-2000" style="background-image:url('{{ asset('assets/hero-3.jpg') }}');"></div>
            <div class="hero-bg-slide absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-2000" style="background-image:url('{{ asset('assets/hero-4.jpg') }}');"></div>
        </div>
        {{-- Gradient berlapis: tutup penuh atas & bawah, pudar di tengah --}}
        <div class="absolute inset-0" style="background: linear-gradient(to bottom, var(--color-cloud, #f4f6fb) 0%, transparent 35%, transparent 65%, var(--color-cloud, #f4f6fb) 100%);"></div>
        <div class="absolute inset-0" style="background: radial-gradient(ellipse 80% 60% at 50% 50%, transparent 30%, var(--color-cloud, #f4f6fb) 100%);"></div>
    </div>

    <div class="absolute top-24 right-[8%] w-72 h-72 rounded-full bg-violet-600/15 blur-[90px] float-slow" data-parallax-speed="0.15" aria-hidden="true"></div>
    <div class="absolute bottom-10 left-[6%] w-80 h-80 rounded-full bg-cyan-500/10 blur-[100px] float-med" data-parallax-speed="0.1" aria-hidden="true"></div>
    <div class="absolute top-1/2 left-1/3 w-64 h-64 rounded-full bg-gold-500/10 blur-[110px] float-x" data-parallax-speed="0.08" aria-hidden="true"></div>

    <div class="max-w-7xl mx-auto px-5 sm:px-8 w-full relative">
        <div class="grid lg:grid-cols-12 gap-10 lg:gap-12 items-center">

            <div class="lg:col-span-7">
                <!-- <div class="hero-reveal reveal mb-6 lg:mb-7" style="transition-delay:0ms">
                    <span class="pill"><span class="pill-dot"></span>Konsultan Pengembangan Ekonomi Lokal</span>
                </div> -->

                <h1 class="hero-reveal reveal font-display font-700 text-4xl min-[400px]:text-5xl sm:text-6xl lg:text-[4.5rem] leading-[1.2] lg:leading-[1.05] text-balance mb-6 lg:mb-7">
                    <span class="text-ink-900">Dari Gagasan</span><br/>
                    <span class="text-gradient-aurora">Menjadi Gerakan</span><br/>
                    <span class="text-gradient-gold">Menjadi Dampak.</span>
                </h1>

                <p class="hero-reveal reveal text-ink-500 text-sm sm:text-base lg:text-lg leading-relaxed max-w-xl mb-8 lg:mb-10">
                    PT Gagasan Gemilang Indonesia (GGI) menjembatani gagasan, kolaborasi, dan implementasi untuk UMKM, Koperasi, BUMDes, BUMD, dan ekonomi kreatif &mdash; menghasilkan dampak nyata dan berkelanjutan bagi masyarakat dan daerah.
                </p>

                <div class="hero-reveal reveal flex flex-col sm:flex-row items-stretch sm:items-center gap-4 mb-10 lg:mb-14">
                    <a href="#contact" class="btn-primary w-full sm:w-auto flex justify-center items-center">
                        Mulai Berkolaborasi
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ml-2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </a>
                    <a href="#about" class="btn-ghost w-full sm:w-auto flex justify-center items-center">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
                        Jelajahi Profil
                    </a>
                </div>

                <div class="hero-reveal reveal grid grid-cols-3 gap-3 sm:gap-5 max-w-md">
                    <div>
                        <div class="font-display text-2xl sm:text-3xl lg:text-4xl"><span class="stat-number" data-counter="15" data-suffix="+">0</span></div>
                        <div class="text-[0.65rem] sm:text-xs text-ink-500 mt-1 leading-snug">Tahun<br/>Pengalaman</div>
                    </div>
                    <div>
                        <div class="font-display text-2xl sm:text-3xl lg:text-4xl"><span class="stat-number" data-counter="5" data-suffix="">0</span></div>
                        <div class="text-[0.65rem] sm:text-xs text-ink-500 mt-1 leading-snug">Bidang<br/>Layanan Utama</div>
                    </div>
                    <div>
                        <div class="font-display text-2xl sm:text-3xl lg:text-4xl"><span class="stat-number" data-counter="20" data-suffix="+">0</span></div>
                        <div class="text-[0.65rem] sm:text-xs text-ink-500 mt-1 leading-snug">Mitra &amp;<br/>Klien Strategis</div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 reveal-scale mt-8 lg:mt-0" data-delay="200">
                <div class="relative mx-auto max-w-[260px] sm:max-w-sm">
                    <div class="absolute -inset-6 rounded-[2.5rem] bg-gradient-to-br from-cyan-500/15 via-violet-500/10 to-gold-500/15 blur-2xl" aria-hidden="true"></div>
                    <div class="glass-strong relative rounded-[2rem] p-8 sm:p-12 shadow-glow-cyan">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo PT Gagasan Gemilang Indonesia" class="w-full h-auto drop-shadow-[0_10px_40px_rgba(232,162,61,0.25)] float-slow" />
                    </div>
                    <div class="absolute -top-5 -left-5 glass rounded-2xl px-4 py-3 float-med shadow-glow-gold hidden sm:block">
                        <p class="text-[0.65rem] text-ink-500 tracking-wider">SEJAK</p>
                        <p class="font-display font-700 text-cyan-600">2012</p>
                    </div>
                    <div class="absolute -bottom-6 -right-4 glass rounded-2xl px-4 py-3 float-fast shadow-glow-cyan hidden sm:block">
                        <p class="text-[0.65rem] text-ink-500 tracking-wider">FOKUS</p>
                        <p class="font-display font-700 text-gold-700 text-sm">UMKM &middot; BUMDes</p>
                    </div>
                </div>
            </div>

        </div>
    </div>


</section>
