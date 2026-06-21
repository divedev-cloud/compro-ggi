<x-admin.layouts.app title="Edit Pengguna" subtitle="Perbarui data akun {{ $user->name }}">

    <div class="max-w-lg">

        <div class="mb-6">
            <a href="{{ route('admin.users.index') }}"
               class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-slate-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke daftar pengguna
            </a>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">

            <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                {{-- Nama Lengkap --}}
                <div>
                    <label for="full_name" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $user->full_name) }}" required
                           placeholder="contoh: Budi Santoso"
                           class="w-full border rounded-lg px-3.5 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition {{ $errors->has('full_name') ? 'border-red-400 bg-red-50' : 'border-slate-300' }}">
                    @error('full_name')
                    <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                    @else
                    <p class="mt-1.5 text-xs text-slate-400">Nama ini akan tampil sebagai identitas penulis artikel.</p>
                    @enderror
                </div>

                {{-- Username --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Username <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                           placeholder="contoh: user-baru"
                           class="w-full border rounded-lg px-3.5 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition {{ $errors->has('name') ? 'border-red-400 bg-red-50' : 'border-slate-300' }}">
                    @error('name')
                    <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                    @else
                    <p class="mt-1.5 text-xs text-slate-400">Hanya huruf, angka, tanda hubung (-), dan garis bawah (_).</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                           placeholder="admin@contoh.com"
                           class="w-full border rounded-lg px-3.5 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition {{ $errors->has('email') ? 'border-red-400 bg-red-50' : 'border-slate-300' }}">
                    @error('email')
                    <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Password Baru
                        <span class="text-slate-400 font-normal text-xs ml-1">(kosongkan jika tidak ingin mengubah)</span>
                    </label>
                    <input type="password" id="password" name="password"
                           placeholder="Minimal 8 karakter"
                           class="w-full border rounded-lg px-3.5 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition {{ $errors->has('password') ? 'border-red-400 bg-red-50' : 'border-slate-300' }}">
                    @error('password')
                    <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Konfirmasi Password Baru
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           placeholder="Ulangi password baru"
                           class="w-full border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition">
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <button type="submit"
                        class="bg-cyan-600 hover:bg-cyan-700 active:bg-cyan-800 text-white font-semibold py-2.5 px-5 rounded-lg text-sm transition-colors shadow-sm">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.users.index') }}"
                       class="text-slate-500 hover:text-slate-700 text-sm font-medium transition-colors">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>

</x-admin.layouts.app>
