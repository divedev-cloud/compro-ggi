<x-admin.layouts.app title="Tulis Artikel Baru">

    <div class="max-w-5xl mx-auto">

        <div class="mb-6">
            <a href="{{ route('admin.articles.index') }}"
               class="inline-flex items-center gap-1.5 text-sm text-slate-500 hover:text-slate-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Daftar Artikel
            </a>
        </div>

        <form id="article-form" action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Main content --}}
                <div class="lg:col-span-2 space-y-5">

                    {{-- Title --}}
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                        <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">
                            Judul Artikel <span class="text-red-500">*</span>
                        </label>
                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            class="w-full border rounded-lg px-3.5 py-2.5 text-slate-900 text-lg font-medium placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition {{ $errors->has('title') ? 'border-red-400 bg-red-50' : 'border-slate-300' }}"
                            placeholder="Masukkan judul artikel yang menarik..."
                        >
                        @error('title')
                        <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Editor --}}
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                        <div class="px-5 pt-5 pb-3 border-b border-slate-100">
                            <p class="text-sm font-semibold text-slate-700">
                                Konten Artikel <span class="text-red-500">*</span>
                            </p>
                        </div>

                        {{-- Quill Toolbar --}}
                        <div id="editor-toolbar" class="border-b border-slate-200">
                            <span class="ql-formats">
                                <select class="ql-header">
                                    <option value="1">Judul 1</option>
                                    <option value="2">Judul 2</option>
                                    <option value="3">Judul 3</option>
                                    <option selected>Normal</option>
                                </select>
                            </span>
                            <span class="ql-formats">
                                <button class="ql-bold" title="Tebal"></button>
                                <button class="ql-italic" title="Miring"></button>
                                <button class="ql-underline" title="Garis Bawah"></button>
                                <button class="ql-strike" title="Coret"></button>
                            </span>
                            <span class="ql-formats">
                                <button class="ql-blockquote" title="Kutipan"></button>
                                <button class="ql-code-block" title="Blok Kode"></button>
                            </span>
                            <span class="ql-formats">
                                <button class="ql-list" value="ordered" title="Daftar Bernomor"></button>
                                <button class="ql-list" value="bullet" title="Daftar Poin"></button>
                            </span>
                            <span class="ql-formats">
                                <button class="ql-link" title="Tautan"></button>
                                <button class="ql-image" title="Gambar"></button>
                            </span>
                            <span class="ql-formats">
                                <select class="ql-align">
                                    <option selected></option>
                                    <option value="center"></option>
                                    <option value="right"></option>
                                    <option value="justify"></option>
                                </select>
                            </span>
                            <span class="ql-formats">
                                <button class="ql-clean" title="Hapus Format"></button>
                            </span>
                        </div>

                        {{-- Editor area --}}
                        <div id="editor-content" style="min-height: 380px; font-size: 0.9375rem; line-height: 1.75;"></div>

                        {{-- Hidden field diisi JS saat submit --}}
                        <input type="hidden" name="content" id="content-input" value="">
                        {{-- Kirim old content ke JS via JSON (aman dari HTML escaping) --}}
                        <script type="application/json" id="quill-initial">@json(old('content', ''))</script>

                        @error('content')
                        <p class="px-5 pb-3 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Excerpt --}}
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                        <label for="excerpt" class="block text-sm font-semibold text-slate-700 mb-1">Ringkasan</label>
                        <p class="text-xs text-slate-400 mb-2">Deskripsi singkat untuk pratinjau dan SEO (maks. 500 karakter).</p>
                        <textarea
                            id="excerpt"
                            name="excerpt"
                            rows="3"
                            maxlength="500"
                            class="w-full border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm text-slate-900 placeholder-slate-400 resize-none focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                            placeholder="Tulis ringkasan singkat artikel ini..."
                        >{{ old('excerpt') }}</textarea>
                    </div>

                </div>

                {{-- Sidebar options --}}
                <div class="space-y-5">

                    {{-- Publish --}}
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                        <h3 class="text-sm font-semibold text-slate-700 mb-4">Penerbitan</h3>

                        <div class="mb-4">
                            <label for="status" class="block text-xs font-medium text-slate-600 mb-1.5">Status</label>
                            <select id="status" name="status"
                                class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition bg-white">
                                <option value="draft" {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>Draf</option>
                                <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Terbitkan</option>
                            </select>
                        </div>

                        <div>
                            <label for="published_at" class="block text-xs font-medium text-slate-600 mb-1.5">Tanggal Terbit</label>
                            <input
                                id="published_at"
                                type="datetime-local"
                                name="published_at"
                                value="{{ old('published_at') }}"
                                class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                            >
                            <p class="text-xs text-slate-400 mt-1">Kosongkan untuk langsung terbit.</p>
                        </div>

                        <div class="pt-4 border-t border-slate-100 mt-4 flex gap-2">
                            <a href="{{ route('admin.articles.index') }}"
                               class="flex-1 text-center py-2 text-sm font-medium text-slate-600 hover:text-slate-900 border border-slate-300 rounded-lg hover:bg-slate-50 transition-colors">
                                Batal
                            </a>
                            <button type="submit"
                                class="flex-1 bg-cyan-600 hover:bg-cyan-700 text-white text-sm font-semibold py-2 rounded-lg transition-colors">
                                Simpan
                            </button>
                        </div>
                    </div>

                    {{-- Thumbnail --}}
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                        <h3 class="text-sm font-semibold text-slate-700 mb-4">Foto Sampul</h3>

                        <div id="thumbnail-preview" class="hidden mb-3">
                            <img id="thumbnail-img" src="" alt="Pratinjau" class="w-full h-40 object-cover rounded-lg border border-slate-200">
                        </div>

                        <label for="thumbnail"
                               class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-slate-300 rounded-lg cursor-pointer hover:border-cyan-400 hover:bg-cyan-50/30 transition-colors group">
                            <svg class="w-7 h-7 text-slate-300 group-hover:text-cyan-400 mb-2 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-xs text-slate-400 group-hover:text-cyan-500 transition-colors font-medium">Klik untuk pilih gambar</p>
                            <p class="text-xs text-slate-400 mt-0.5">PNG, JPG, WEBP (maks. 2MB)</p>
                        </label>
                        <input id="thumbnail" type="file" name="thumbnail" accept="image/*" class="hidden">

                        @error('thumbnail')
                        <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>
        </form>
    </div>

    @push('scripts')
    {{-- Quill CSS --}}
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    {{-- Quill JS --}}
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

    <script>
    // Initialize Quill editor
    const quill = new Quill('#editor-content', {
        modules: {
            toolbar: { container: '#editor-toolbar' }
        },
        theme: 'snow',
        placeholder: 'Mulai menulis artikel di sini...',
    });

    // Custom image upload handler
    quill.getModule('toolbar').addHandler('image', function () {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.click();
        input.onchange = async () => {
            const file = input.files[0];
            if (!file) return;
            const formData = new FormData();
            formData.append('image', file);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
            try {
                const res = await fetch('{{ route("admin.upload-image") }}', { method: 'POST', body: formData });
                const data = await res.json();
                const range = quill.getSelection(true);
                quill.insertEmbed(range.index, 'image', data.url);
            } catch (e) {
                alert('Gagal mengunggah gambar. Coba lagi.');
            }
        };
    });

    // Restore old content setelah validation error (via JSON yang aman dari escaping)
    const initialContent = JSON.parse(document.getElementById('quill-initial').textContent);
    if (initialContent) {
        quill.clipboard.dangerouslyPasteHTML(initialContent);
    }

    // Sync konten ke hidden input saat submit — pakai id spesifik, bukan querySelector('form')
    document.getElementById('article-form').addEventListener('submit', function (e) {
        const html = quill.root.innerHTML;
        if (!html || html === '<p><br></p>') {
            e.preventDefault();
            alert('Konten artikel tidak boleh kosong.');
            return;
        }
        document.getElementById('content-input').value = html;
    });

    // Thumbnail: validasi 2MB + preview
    document.getElementById('thumbnail').addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;

        const maxBytes = 2 * 1024 * 1024;
        if (file.size > maxBytes) {
            alert('Foto ditolak!\nUkuran file ' + (file.size / 1024 / 1024).toFixed(1) + 'MB melebihi batas 2MB.\nSilakan pilih foto yang lebih kecil.');
            this.value = '';
            document.getElementById('thumbnail-preview').classList.add('hidden');
            return;
        }

        const reader = new FileReader();
        reader.onload = (ev) => {
            document.getElementById('thumbnail-img').src = ev.target.result;
            document.getElementById('thumbnail-preview').classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    });
    </script>
    @endpush

</x-admin.layouts.app>
