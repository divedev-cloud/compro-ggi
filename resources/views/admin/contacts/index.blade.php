<x-admin.layouts.app title="Pesan Kontak" subtitle="Kelola pesan yang masuk dari pengunjung website.">
    
    {{-- Header actions --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div class="bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm text-slate-600 shadow-sm">
            Total pesan: <span class="font-bold text-slate-900">{{ $contacts->total() }}</span>
        </div>
    </div>

    {{-- Data Table --}}
    <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-slate-600">
            <thead class="bg-slate-50 border-b border-slate-200 text-slate-900 font-semibold">
                <tr>
                    <th scope="col" class="px-5 py-4 whitespace-nowrap">Tanggal</th>
                    <th scope="col" class="px-5 py-4 whitespace-nowrap">Pengirim</th>
                    <th scope="col" class="px-5 py-4 whitespace-nowrap">Topik</th>
                    <th scope="col" class="px-5 py-4 whitespace-nowrap">Status</th>
                    <th scope="col" class="px-5 py-4 text-right whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @forelse($contacts as $contact)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-5 py-4 whitespace-nowrap">
                        {{ $contact->created_at->locale('id')->isoFormat('D MMM Y HH:mm') }}
                    </td>
                    <td class="px-5 py-4">
                        <div class="font-medium text-slate-900 truncate max-w-[150px] sm:max-w-[200px]" title="{{ $contact->name }}">
                            {{ $contact->name }}
                        </div>
                        <div class="text-xs text-slate-500 truncate max-w-[150px] sm:max-w-[200px]" title="{{ $contact->email }}">
                            {{ $contact->email }}
                        </div>
                    </td>
                    <td class="px-5 py-4">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-slate-100 text-slate-800 border border-slate-200">
                            {{ ucfirst($contact->topic ?? 'Lainnya') }}
                        </span>
                    </td>
                    <td class="px-5 py-4 whitespace-nowrap">
                        @if($contact->is_followed_up)
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Selesai
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                Baru
                            </span>
                        @endif
                    </td>
                    <td class="px-5 py-4 text-right whitespace-nowrap">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="p-2 text-cyan-600 hover:text-cyan-800 hover:bg-cyan-50 rounded-lg transition-colors" title="Lihat Detail">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </a>
                            <form action="{{ route('admin.contacts.update', $contact) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="p-2 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-colors" title="Ubah Status">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                </button>
                            </form>
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-5 py-8 text-center text-slate-500">
                        <div class="flex flex-col items-center justify-center">
                            <svg class="w-12 h-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <p>Belum ada pesan masuk.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        </div>

        @if($contacts->hasPages())
        <div class="px-5 py-4 border-t border-slate-200 bg-slate-50/40">
            {{ $contacts->links() }}
        </div>
        @endif
    </div>

</x-admin.layouts.app>
