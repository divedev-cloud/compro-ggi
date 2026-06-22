<section id="contact" class="section-pad pt-0 relative overflow-hidden">
    {{-- Elemen Latar Belakang Blur --}}
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-cyan-500/15 rounded-full blur-[130px] -z-10" aria-hidden="true">
    </div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-gold-500/10 rounded-full blur-[130px] -z-10" aria-hidden="true">
    </div>

    {{-- Kontainer Utama --}}
    <!-- Menyesuaikan padding horizontal container untuk mobile -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Grid utama dengan penumpukan di mobile (grid-cols-1) dan kolom terpisah di desktop -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 lg:gap-10">

            {{-- Kartu info kontak --}}
            <div class="lg:col-span-5 reveal">
                <!-- Mengurangi padding mobile (p-5) dan jarak vertikal (mb-6 sm:mb-8) -->
                <div class="glass-strong rounded-3xl p-5 sm:p-8 lg:p-9 lg:h-full">
                    <div class="team-photo-ring w-20 h-20 mb-4 sm:mb-5">
                        <img src="{{ asset('assets/team-dewi-circle.png') }}" alt="Foto Dewi Hadhy" loading="lazy" />
                    </div>
                    <h3 class="font-display font-600 text-lg text-ink-900 mb-1">Dewi Hadhy, S.Si., MM.</h3>
                    <p class="text-cyan-700 text-sm mb-6 sm:mb-8">Director / Lead Trainer</p>

                    <!-- Menggunakan margin-bottom pada setiap item karena space-y tidak terkompilasi -->
                    <div>

                        <!-- Telepon -->
                        <a href="tel:+6285333779893"
                            class="flex items-center gap-3 sm:gap-4 group min-w-0 mb-6 sm:mb-8">
                            <span class="icon-circle flex-shrink-0 group-hover:!shadow-glow-cyan"><svg width="18"
                                    height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92Z" />
                                </svg></span>
                            <div class="min-w-0 flex-1"> <!-- Tambah flex-1 agar teks menyesuaikan sisa ruang -->
                                <p class="text-xs text-ink-500">Telepon</p>
                                <p class="text-sm text-ink-900 font-medium truncate">+62 853-3377-9893</p>
                            </div>
                        </a>

                        <!-- Email -->
                        <div class="flex items-center gap-3 sm:gap-4 min-w-0 mb-6 sm:mb-8">
                            <span class="icon-circle flex-shrink-0"><svg width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="4" width="20" height="16" rx="2" />
                                    <path d="m22 7-10 7L2 7" />
                                </svg></span>
                            <div class="min-w-0 flex-1 overflow-hidden">
                                <p class="text-xs text-ink-500">Email</p>
                                <!-- Menggunakan break-words agar email panjang membungkus (wrap) ke baris baru, bukan memperlebar kartu -->
                                <p class="text-sm text-ink-900 font-medium break-words">
                                    info@gagasangemilangindonesia.com</p>
                            </div>
                        </div>

                        <!-- Instagram -->
                        <div class="flex items-center gap-3 sm:gap-4 min-w-0 mb-6 sm:mb-8">
                            <span class="icon-circle flex-shrink-0"><svg width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M2 12h20M12 2a15 15 0 0 1 0 20 15 15 0 0 1 0-20Z" />
                                </svg></span>
                            <div class="min-w-0 flex-1 overflow-hidden">
                                <p class="text-xs text-ink-500">Instagram</p>
                                <p class="text-sm text-ink-900 font-medium truncate">@gagasangemilangindonesia</p>
                            </div>
                        </div>

                        <!-- Kantor -->
                        <div class="flex items-start gap-3 sm:gap-4 min-w-0">
                            <span class="icon-circle flex-shrink-0 mt-0.5"><svg width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg></span>
                            <div class="min-w-0 flex-1">
                                <p class="text-xs text-ink-500">Kantor</p>
                                <!-- Hapus <br/> manual agar teks alamat membungkus (wrap) secara otomatis sesuai lebar layar -->
                                <p class="text-sm text-ink-900 font-medium leading-relaxed">Bulus Wetan RT 02, Sumber
                                    Agung, Jetis, Bantul, D.I. Yogyakarta</p>
                            </div>
                        </div>
                    </div>

                    <!-- Jarak vertikal yang disesuaikan (my-6 sm:my-8) -->
                    <div class="divider-line my-6 sm:my-8"></div>

                    <!-- Menambahkan flex-wrap pada ikon sosial media agar tidak bertumpuk jika layar sangat kecil -->
                    <div class="flex flex-wrap gap-2.5 sm:gap-3">
                        <a href="#" aria-label="Instagram" class="icon-circle hover:!shadow-glow-cyan"><svg
                                width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <rect x="2" y="2" width="20" height="20" rx="5" />
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37Z" />
                                <path d="M17.5 6.5h.01" />
                            </svg></a>
                        <a href="#" aria-label="WhatsApp" class="icon-circle hover:!shadow-glow-cyan"><svg
                                width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path
                                    d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5Z" />
                            </svg></a>
                        <a href="#" aria-label="LinkedIn" class="icon-circle hover:!shadow-glow-cyan"><svg
                                width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path
                                    d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6Z" />
                                <rect x="2" y="9" width="4" height="12" />
                                <circle cx="4" cy="4" r="2" />
                            </svg></a>
                    </div>
                </div>
            </div>

            {{-- Form --}}
            <div class="lg:col-span-7 reveal">
                <!-- Samakan padding mobile untuk form (p-5 sm:p-8 lg:p-9) -->
                <form id="contact-form" action="{{ route('contact.send') }}" method="POST"
                    class="glass-card p-5 sm:p-8 lg:p-9 lg:h-full">
                    @csrf

                    <!-- Judul Form -->
                    <div class="mb-6 sm:mb-8">
                        <h3 class="font-display font-600 text-2xl text-ink-900">Tinggalkan Pesan</h3>
                        <p class="text-ink-500 text-sm mt-2">Punya pertanyaan atau ingin berkolaborasi? Silakan isi
                            form di bawah ini.</p>
                    </div>

                    <!-- Input Nama Lengkap & Instansi -->
                    <!-- Gunakan grid-cols-1 di mobile dan sm:grid-cols-2 di tablet+ untuk menumpuk input -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5 mb-4 sm:mb-5">
                        <div>
                            <label for="name" class="block text-xs text-ink-500 mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required placeholder="Nama Anda"
                                class="w-full bg-cloudsoft border border-[#0F1B33]/[0.08] rounded-xl px-4 py-3 text-sm text-ink-900 placeholder:text-ink-400 focus:outline-none focus:border-cyan-500 focus:bg-cloud transition-colors" />
                        </div>
                        <div>
                            <label for="org" class="block text-xs text-ink-500 mb-2">Instansi /
                                Organisasi</label>
                            <input type="text" id="org" name="org" placeholder="Nama instansi"
                                class="w-full bg-cloudsoft border border-[#0F1B33]/[0.08] rounded-xl px-4 py-3 text-sm text-ink-900 placeholder:text-ink-400 focus:outline-none focus:border-cyan-500 focus:bg-cloud transition-colors" />
                        </div>
                    </div>

                    <!-- Input Email & Telepon -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5 mb-4 sm:mb-5">
                        <div>
                            <label for="email" class="block text-xs text-ink-500 mb-2">Email</label>
                            <input type="email" id="email" name="email" required
                                placeholder="nama@email.com"
                                class="w-full bg-cloudsoft border border-[#0F1B33]/[0.08] rounded-xl px-4 py-3 text-sm text-ink-900 placeholder:text-ink-400 focus:outline-none focus:border-cyan-500 focus:bg-cloud transition-colors" />
                        </div>
                        <div>
                            <label for="phone" class="block text-xs text-ink-500 mb-2">No. Telepon /
                                WhatsApp</label>
                            <input type="tel" id="phone" name="phone" placeholder="08xx-xxxx-xxxx"
                                class="w-full bg-cloudsoft border border-[#0F1B33]/[0.08] rounded-xl px-4 py-3 text-sm text-ink-900 placeholder:text-ink-400 focus:outline-none focus:border-cyan-500 focus:bg-cloud transition-colors" />
                        </div>
                    </div>

                    <!-- Topik Kebutuhan -->
                    <div class="mb-4 sm:mb-5">
                        <label for="topic" class="block text-xs text-ink-500 mb-2">Topik Kebutuhan</label>
                        <select id="topic" name="topic"
                            class="w-full bg-cloudsoft border border-[#0F1B33]/[0.08] rounded-xl px-4 py-3 text-sm text-ink-900 focus:outline-none focus:border-cyan-500 focus:bg-cloud transition-colors">
                            <option class="bg-cloud text-ink-900" value="umkm">Pengembangan UMKM</option>
                            <option class="bg-cloud text-ink-900" value="koperasi">Koperasi &amp; BUMDes</option>
                            <option class="bg-cloud text-ink-900" value="bumd">Pengembangan BUMD</option>
                            <option class="bg-cloud text-ink-900" value="ekonomi">Ekonomi Daerah</option>
                            <option class="bg-cloud text-ink-900" value="lain">Lainnya</option>
                        </select>
                    </div>

                    <!-- Pesan -->
                    <div class="mb-6 sm:mb-7">
                        <label for="message" class="block text-xs text-ink-500 mb-2">Pesan</label>
                        <textarea id="message" name="message" rows="4" required placeholder="Ceritakan kebutuhan program Anda..."
                            class="w-full bg-cloudsoft border border-[#0F1B33]/[0.08] rounded-xl px-4 py-3 text-sm text-ink-900 placeholder:text-ink-400 focus:outline-none focus:border-cyan-500 focus:bg-cloud transition-colors resize-none"></textarea>
                    </div>

                    <!-- Tombol Kirim -->
                    <button type="submit"
                        class="btn-primary w-full sm:w-auto flex items-center justify-center gap-2">
                        <span>Kirim Pesan</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m22 2-7 20-4-9-9-4Z" />
                            <path d="M22 2 11 13" />
                        </svg>
                    </button>

                    <!-- Tempat Pesan Notifikasi -->
                    <p id="form-message" class="hidden mt-4 text-sm flex items-center gap-2"></p>
                </form>
            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('contact-form');
        const msgDiv = document.getElementById('form-message');
        const submitBtn = form.querySelector('button[type="submit"]');

        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const originalBtnHtml = submitBtn.innerHTML;
                submitBtn.innerHTML = '<span>Mengirim...</span>';
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-75', 'cursor-not-allowed');

                msgDiv.classList.add('hidden');
                msgDiv.className = 'hidden mt-4 text-sm flex items-center gap-2';

                const formData = new FormData(form);

                fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) throw response;
                        return response.json();
                    })
                    .then(data => {
                        msgDiv.innerHTML =
                            `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m22 4-10 10-3-3"/></svg> ${data.message || 'Pesan berhasil terkirim!'}`;
                        msgDiv.classList.remove('hidden', 'text-red-600');
                        msgDiv.classList.add('text-cyan-700');
                        form.reset();
                    })
                    .catch(async error => {
                        let errorMsg =
                            'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.';
                        if (error.json) {
                            try {
                                const errData = await error.json();
                                errorMsg = errData.message || errorMsg;
                            } catch (e) {}
                        }
                        msgDiv.innerHTML =
                            `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg> ${errorMsg}`;
                        msgDiv.classList.remove('hidden', 'text-cyan-700');
                        msgDiv.classList.add('text-red-600');
                    })
                    .finally(() => {
                        submitBtn.innerHTML = originalBtnHtml;
                        submitBtn.disabled = false;
                        submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                    });
            });
        }
    });
</script>
