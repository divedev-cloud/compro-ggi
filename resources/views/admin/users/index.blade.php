<x-admin.layouts.app title="Kelola Pengguna" subtitle="Tambah dan kelola akun admin website">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <div class="bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm text-slate-600 shadow-sm">
            <span class="font-semibold text-slate-900">{{ $users->count() }}</span> pengguna
        </div>
        @if(auth()->user()?->isSuperAdmin())
        <a href="{{ route('admin.users.create') }}"
           class="inline-flex items-center gap-2 bg-cyan-600 hover:bg-cyan-700 text-white text-sm font-medium px-4 py-2.5 rounded-lg transition-colors shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Pengguna
        </a>
        @endif
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50/60">
                    <th class="text-left font-semibold text-slate-600 px-5 py-3.5">Username</th>
                    <th class="text-left font-semibold text-slate-600 px-4 py-3.5 hidden sm:table-cell">Email</th>
                    <th class="text-left font-semibold text-slate-600 px-4 py-3.5">Status</th>
                    <th class="px-4 py-3.5"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($users as $user)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-5 py-3.5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-cyan-600/15 border border-cyan-600/30 flex items-center justify-center text-cyan-700 text-xs font-bold flex-shrink-0">
                                {{ strtoupper(substr($user->full_name ?? $user->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-medium text-slate-900">{{ $user->full_name ?: '—' }}</p>
                                <p class="text-xs text-slate-400 font-mono">&#64;{{ $user->name }}</p>
                                @if($user->isSuperAdmin())
                                <span class="text-[10px] font-semibold text-cyan-700 bg-cyan-50 border border-cyan-200 px-1.5 py-0.5 rounded">Super Admin</span>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3.5 hidden sm:table-cell text-slate-500 text-xs">{{ $user->email }}</td>
                    <td class="px-4 py-3.5">
                        @if($user->isSuperAdmin())
                        <span class="inline-flex items-center gap-1.5 bg-cyan-50 text-cyan-700 border border-cyan-200 text-xs font-medium px-2.5 py-1 rounded-full">
                            <span class="w-1.5 h-1.5 bg-cyan-500 rounded-full"></span>
                            Aktif
                        </span>
                        @elseif($user->is_active)
                        <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-medium px-2.5 py-1 rounded-full">
                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                            Aktif
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-500 border border-slate-200 text-xs font-medium px-2.5 py-1 rounded-full">
                            <span class="w-1.5 h-1.5 bg-slate-400 rounded-full"></span>
                            Nonaktif
                        </span>
                        @endif
                    </td>
                    <td class="px-4 py-3.5">
                        @if(auth()->user()?->isSuperAdmin() && ! $user->isSuperAdmin())
                        <div class="flex items-center gap-2 justify-end">
                            <a href="{{ route('admin.users.edit', $user) }}"
                               class="inline-flex items-center gap-1.5 text-slate-600 hover:text-cyan-700 text-xs font-medium px-3 py-1.5 rounded-lg border border-slate-200 hover:border-cyan-300 hover:bg-cyan-50 transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('admin.users.toggle', $user) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="inline-flex items-center gap-1.5 text-xs font-medium px-3 py-1.5 rounded-lg border transition-colors
                                        {{ $user->is_active
                                            ? 'text-amber-600 border-amber-200 hover:bg-amber-50 hover:border-amber-300'
                                            : 'text-emerald-600 border-emerald-200 hover:bg-emerald-50 hover:border-emerald-300' }}">
                                    @if($user->is_active)
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                    </svg>
                                    Nonaktifkan
                                    @else
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Aktifkan
                                    @endif
                                </button>
                            </form>
                        </div>
                    @else
                        <p class="text-right text-xs text-slate-400 pr-1">—</p>
                    @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-admin.layouts.app>
