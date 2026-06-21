<x-admin.layouts.app title="Detail Pesan" subtitle="Melihat rincian pesan dari pengunjung.">
    
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-cyan-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali
        </a>

        <div class="flex items-center gap-3">
            <form action="{{ route('admin.contacts.update', $contact) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="flex items-center gap-2 bg-slate-800 hover:bg-slate-900 border-none text-sm px-4 py-2 rounded-lg text-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Tandai {{ $contact->is_followed_up ? 'Belum Di-follow up' : 'Sudah Di-follow up' }}
                </button>
            </form>
            
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex items-center gap-2 bg-white border border-red-200 text-red-600 hover:bg-red-50 text-sm px-4 py-2 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Hapus
                </button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="md:col-span-2">
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 h-full">
                <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-4 border-b border-slate-100 pb-2">Isi Pesan</h3>
                <div class="prose max-w-none text-slate-700 text-sm whitespace-pre-wrap">{{ $contact->message }}</div>
            </div>
        </div>

        <div class="md:col-span-1 space-y-6">
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6">
                <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-4 border-b border-slate-100 pb-2">Detail Pengirim</h3>
                
                <div class="space-y-4">
                    <div>
                        <p class="text-xs text-slate-400 mb-1">Nama Lengkap</p>
                        <p class="text-sm font-medium text-slate-900">{{ $contact->name }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 mb-1">Email</p>
                        <a href="mailto:{{ $contact->email }}" class="text-sm font-medium text-cyan-600 hover:underline">{{ $contact->email }}</a>
                    </div>
                    @if($contact->phone)
                    <div>
                        <p class="text-xs text-slate-400 mb-1">No. Telepon / WhatsApp</p>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}" target="_blank" class="text-sm font-medium text-emerald-600 hover:underline flex items-center gap-1">
                            {{ $contact->phone }}
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>
                    @endif
                    @if($contact->org)
                    <div>
                        <p class="text-xs text-slate-400 mb-1">Instansi / Organisasi</p>
                        <p class="text-sm font-medium text-slate-900">{{ $contact->org }}</p>
                    </div>
                    @endif
                    <div>
                        <p class="text-xs text-slate-400 mb-1">Topik Kebutuhan</p>
                        <p class="text-sm font-medium text-slate-900">{{ ucfirst($contact->topic ?? 'Lainnya') }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-slate-50 border border-slate-200 rounded-xl shadow-sm p-6">
                <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-4 border-b border-slate-200 pb-2">Status Tiket</h3>
                
                <div class="space-y-4">
                    <div>
                        <p class="text-xs text-slate-400 mb-1">Diterima Pada</p>
                        <p class="text-sm font-medium text-slate-900">{{ $contact->created_at->locale('id')->isoFormat('D MMMM Y, HH:mm') }}</p>
                        <p class="text-xs text-slate-500 mt-1">{{ $contact->created_at->diffForHumans() }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 mb-2">Status Saat Ini</p>
                        @if($contact->is_followed_up)
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-sm font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                Selesai / Sudah Follow Up
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-sm font-medium bg-amber-100 text-amber-800 border border-amber-200">
                                <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                                Baru / Belum Proses
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-admin.layouts.app>
