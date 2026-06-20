<x-admin.layouts.app title="Kelola Artikel" subtitle="Tulis dan atur semua artikel website">

    {{-- Header actions --}}
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <div class="bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm text-slate-600 shadow-sm">
                <span class="font-semibold text-slate-900">{{ $articles->total() }}</span> artikel
            </div>
        </div>
        <a href="{{ route('admin.articles.create') }}"
           class="inline-flex items-center gap-2 bg-cyan-600 hover:bg-cyan-700 text-white text-sm font-medium px-4 py-2.5 rounded-lg transition-colors shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tulis Artikel Baru
        </a>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        @if($articles->isEmpty())
        <div class="flex flex-col items-center justify-center py-20 text-slate-400">
            <svg class="w-12 h-12 mb-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <p class="font-medium text-slate-500">Belum ada artikel</p>
            <p class="text-sm mt-1">Mulai tulis artikel pertama Anda.</p>
            <a href="{{ route('admin.articles.create') }}" class="mt-4 inline-flex items-center gap-2 bg-cyan-600 hover:bg-cyan-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tulis Artikel
            </a>
        </div>
        @else
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50/60">
                    <th class="text-left font-semibold text-slate-600 px-5 py-3.5 w-14">Foto</th>
                    <th class="text-left font-semibold text-slate-600 px-4 py-3.5">Judul</th>
                    <th class="text-left font-semibold text-slate-600 px-4 py-3.5 hidden md:table-cell">Status</th>
                    <th class="text-left font-semibold text-slate-600 px-4 py-3.5 hidden lg:table-cell">Tanggal</th>
                    <th class="text-left font-semibold text-slate-600 px-4 py-3.5 hidden lg:table-cell">Penulis</th>
                    <th class="px-4 py-3.5"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($articles as $article)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-5 py-3.5">
                        @if($article->thumbnail)
                        <img src="{{ asset('storage/' . $article->thumbnail) }}"
                             alt="{{ $article->title }}"
                             class="w-10 h-10 rounded-lg object-cover border border-slate-200">
                        @else
                        <div class="w-10 h-10 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        @endif
                    </td>
                    <td class="px-4 py-3.5">
                        <p class="font-medium text-slate-900 line-clamp-1">{{ $article->title }}</p>
                        <p class="text-slate-400 text-xs mt-0.5 font-mono">/{{ $article->slug }}</p>
                    </td>
                    <td class="px-4 py-3.5 hidden md:table-cell">
                        @if($article->status === 'published')
                        <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-medium px-2.5 py-1 rounded-full">
                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                            Terbit
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 text-xs font-medium px-2.5 py-1 rounded-full">
                            <span class="w-1.5 h-1.5 bg-amber-400 rounded-full"></span>
                            Draf
                        </span>
                        @endif
                    </td>
                    <td class="px-4 py-3.5 hidden lg:table-cell text-slate-500 text-xs">
                        {{ $article->published_at?->format('d M Y') ?? '—' }}
                    </td>
                    <td class="px-4 py-3.5 hidden lg:table-cell text-slate-500 text-xs">
                        {{ $article->author->name ?? '—' }}
                    </td>
                    <td class="px-4 py-3.5">
                        <div class="flex items-center gap-2 justify-end">
                            <a href="{{ route('admin.articles.edit', $article) }}"
                               class="inline-flex items-center gap-1.5 text-slate-600 hover:text-cyan-700 text-xs font-medium px-3 py-1.5 rounded-lg border border-slate-200 hover:border-cyan-300 hover:bg-cyan-50 transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Edit
                            </a>
                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST"
                                  onsubmit="return confirm('Hapus artikel ini? Tindakan tidak dapat dibatalkan.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center gap-1.5 text-slate-500 hover:text-red-700 text-xs font-medium px-3 py-1.5 rounded-lg border border-slate-200 hover:border-red-300 hover:bg-red-50 transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($articles->hasPages())
        <div class="px-5 py-4 border-t border-slate-200 bg-slate-50/40">
            {{ $articles->links() }}
        </div>
        @endif

        @endif
    </div>

</x-admin.layouts.app>
