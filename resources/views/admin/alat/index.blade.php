@extends('layouts.app')
@section('title', 'Kelola Alat - Panel Admin')
@section('header-title', 'Kelola Alat')

@section('content')

<!-- HERO BANNER -->
<div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-indigo-600 to-violet-600 text-white p-6 mb-6">
    <div class="relative z-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold">Inventaris Alat</h2>
            <p class="text-indigo-100 text-sm mt-1">{{ $alats->total() }} alat terdaftar dalam sistem.</p>
        </div>
        <a href="{{ route('admin.alat.create') }}"
            class="shrink-0 inline-flex items-center justify-center gap-2 bg-white text-indigo-700 font-semibold text-sm py-2.5 px-5 rounded-xl shadow-sm hover:bg-indigo-50 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Tambah Alat
        </a>
    </div>
    <svg class="absolute -right-6 -bottom-10 w-48 h-48 text-white/10" fill="currentColor" viewBox="0 0 24 24"><path d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 011-1h1a2 2 0 100-4H6a1 1 0 01-1-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/></svg>
</div>

@if(session('success'))
    <div class="mb-5 flex items-center gap-2 bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm px-4 py-3 rounded-xl">
        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        {{ session('success') }}
    </div>
@endif

<!-- SEARCH -->
<form action="{{ route('admin.alat.index') }}" method="GET" class="flex w-full sm:w-96 mb-5">
    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari nama alat, kategori..."
        class="w-full bg-white border border-slate-300 rounded-l-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
    <button type="submit" class="bg-slate-800 hover:bg-slate-900 text-white px-4 rounded-r-lg transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
    </button>
</form>

<!-- TABEL ALAT -->
<div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-50 text-slate-500 text-xs uppercase">
                <tr>
                    <th class="px-4 py-3 font-semibold">No</th>
                    <th class="px-4 py-3 font-semibold">Gambar</th>
                    <th class="px-4 py-3 font-semibold">Nama Alat</th>
                    <th class="px-4 py-3 font-semibold">Kategori</th>
                    <th class="px-4 py-3 font-semibold">Stok</th>
                    <th class="px-4 py-3 font-semibold">Kondisi</th>
                    <th class="px-4 py-3 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($alats as $alat)
                    @php
                        $kondisi = strtolower($alat->status_kondisi);
                        $badge = match(true) {
                            str_contains($kondisi, 'baik') => 'bg-emerald-50 text-emerald-600',
                            str_contains($kondisi, 'rusak') => 'bg-red-50 text-red-600',
                            default => 'bg-amber-50 text-amber-600',
                        };
                        $stokWarna = $alat->stok <= 3 ? 'text-red-500' : 'text-slate-700';
                    @endphp
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-4 py-3 text-slate-500">{{ $loop->iteration + ($alats->currentPage() - 1) * $alats->perPage() }}</td>
                        <td class="px-4 py-3">
                            <div class="w-12 h-12 rounded-lg bg-slate-50 flex items-center justify-center overflow-hidden">
                                @if($alat->gambar)
                                    <img src="{{ asset($alat->gambar) }}" alt="{{ $alat->nama_alat }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                @endif
                            </div>
                        </td>
                        <td class="px-4 py-3 font-semibold text-slate-800">{{ $alat->nama_alat }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $alat->kategori->nama_kategori ?? '-' }}</td>
                        <td class="px-4 py-3 font-bold {{ $stokWarna }}">{{ $alat->stok }}</td>
                        <td class="px-4 py-3">
                            <span class="text-[11px] font-semibold px-2 py-0.5 rounded-full {{ $badge }}">{{ $alat->status_kondisi }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.alat.edit', $alat->id) }}"
                                    class="bg-amber-50 hover:bg-amber-100 text-amber-600 font-semibold text-xs py-1.5 px-3 rounded-lg transition">Edit</a>
                                <form action="{{ route('admin.alat.destroy', $alat->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data alat ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 font-semibold text-xs py-1.5 px-3 rounded-lg transition">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-16 text-center text-slate-400">Data alat belum tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6">
    {{ $alats->links() }}
</div>

@endsection