@extends('layouts.app')

@section('page-title', 'Riwayat Peminjaman')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">

    {{-- ============ HEADER ============ --}}
    <div class="mb-6 sm:mb-8">
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 text-xs font-medium mb-3">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    Rekam Jejak
                </div>
                <h1 class="text-2xl sm:text-3xl font-bold tracking-tight">Riwayat Peminjaman</h1>
                <p class="text-slate-400 text-sm mt-1">Pantau status pengajuan barang dan konsumsi kamu.</p>
            </div>
            <a href="{{ route('peminjam.katalog') }}"
               class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl
                      bg-indigo-500 hover:bg-indigo-400 text-white text-sm font-semibold transition
                      shadow-lg shadow-indigo-500/25">
                <i data-lucide="plus" class="w-4 h-4"></i>
                Ajukan Baru
            </a>
        </div>
    </div>

    {{-- ============ STATS ============ --}}
    @if(!empty($riwayats) && count($riwayats) > 0)
        @php
            $counts = [
                'diajukan' => collect($riwayats)->where('status', 'diajukan')->count(),
                'dipinjam' => collect($riwayats)->where('status', 'dipinjam')->count(),
                'telat'    => collect($riwayats)->where('status', 'telat')->count(),
                'dikembalikan' => collect($riwayats)->where('status', 'dikembalikan')->count(),
            ];
        @endphp
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-6">
            @foreach([
                ['label'=>'Diajukan', 'key'=>'diajukan', 'icon'=>'clock',          'color'=>'amber'],
                ['label'=>'Dipinjam', 'key'=>'dipinjam', 'icon'=>'check-circle-2', 'color'=>'blue'],
                ['label'=>'Telat',    'key'=>'telat',    'icon'=>'x-circle',       'color'=>'rose'],
                ['label'=>'Selesai',  'key'=>'dikembalikan', 'icon'=>'archive', 'color'=>'emerald'],
            ] as $s)
                <div class="p-4 rounded-2xl bg-slate-900/60 border border-slate-800">
                    <div class="flex items-center justify-between mb-2">
                        <div class="w-8 h-8 rounded-lg bg-{{ $s['color'] }}-500/10 border border-{{ $s['color'] }}-500/20 flex items-center justify-center">
                            <i data-lucide="{{ $s['icon'] }}" class="w-4 h-4 text-{{ $s['color'] }}-400"></i>
                        </div>
                        <span class="text-2xl font-bold text-slate-100">{{ $counts[$s['key']] }}</span>
                    </div>
                    <p class="text-xs text-slate-400">{{ $s['label'] }}</p>
                </div>
            @endforeach
        </div>
    @endif

    {{-- ============ RIWAYAT LIST ============ --}}
    @forelse($riwayats as $index => $riwayat)
        @if($loop->first)
            {{-- DESKTOP TABLE HEADER --}}
            <div class="hidden md:block rounded-2xl bg-slate-900/60 border border-slate-800 overflow-hidden">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-slate-800 bg-slate-900/80">
                            <th class="px-4 py-3.5 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-400 w-14">No</th>
                            <th class="px-4 py-3.5 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-400">Barang / Konsumsi</th>
                            <th class="px-4 py-3.5 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-400 w-36">Kategori</th>
                            <th class="px-4 py-3.5 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-400 w-32">Tgl Pinjam</th>
                            <th class="px-4 py-3.5 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-400 w-32">Rencana Kembali</th>
                            <th class="px-4 py-3.5 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-400 w-32">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
        @endif

        @php
            $kategori = $riwayat->kategori ?? 'elektronik';
            $kategoriStyle = [
                'elektronik' => ['bg-blue-500/10 text-blue-300 border-blue-500/20', 'cpu'],
                'makanan'    => ['bg-amber-500/10 text-amber-300 border-amber-500/20', 'coffee'],
                'perkakas'   => ['bg-emerald-500/10 text-emerald-300 border-emerald-500/20', 'wrench'],
            ][$kategori] ?? ['bg-slate-500/10 text-slate-300 border-slate-500/20', 'box'];

            $statusMap = [
                'diajukan' => ['label'=>'Diajukan', 'class'=>'bg-amber-500/10 text-amber-300 border-amber-500/30',   'dot'=>'bg-amber-400',   'icon'=>'clock'],
                'dipinjam' => ['label'=>'Dipinjam', 'class'=>'bg-blue-500/10 text-blue-300 border-blue-500/30',      'dot'=>'bg-blue-400',    'icon'=>'check-circle-2'],
                'telat'    => ['label'=>'Telat',    'class'=>'bg-rose-500/10 text-rose-300 border-rose-500/30',      'dot'=>'bg-rose-400',    'icon'=>'x-circle'],
                'dikembalikan' => ['label'=>'Selesai', 'class'=>'bg-emerald-500/10 text-emerald-300 border-emerald-500/30', 'dot'=>'bg-emerald-400', 'icon'=>'archive'],
            ];
            $status = $statusMap[$riwayat->status] ?? $statusMap['diajukan'];
        @endphp

        {{-- DESKTOP ROW --}}
        <tr class="hidden md:table-row hover:bg-slate-800/30 transition group">
            <td class="px-4 py-4 text-sm text-slate-500 font-medium">{{ $loop->iteration }}</td>
            <td class="px-4 py-4">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-lg bg-slate-800 border border-slate-700 flex items-center justify-center shrink-0 overflow-hidden">
                        @if(!empty($riwayat->gambar))
                            <img src="{{ asset($riwayat->gambar) }}" alt="{{ $riwayat->nama }}" class="w-full h-full object-cover">
                        @else
                            <i data-lucide="{{ $kategoriStyle[1] }}" class="w-4 h-4 text-slate-300"></i>
                        @endif
                    </div>
                    <span class="text-sm font-medium text-slate-100">{{ $riwayat->nama ?? ($riwayat->nama_alat ?? '-') }}</span>
                </div>
            </td>
            <td class="px-4 py-4">
                <span class="inline-flex items-center px-2.5 py-1 rounded-lg border text-xs font-medium {{ $kategoriStyle[0] }}">
                    {{ ucfirst($kategori) }}
                </span>
            </td>
            <td class="px-4 py-4 text-sm text-slate-400">{{ $riwayat->tgl_pinjam ?? '-' }}</td>
            <td class="px-4 py-4 text-sm text-slate-400">{{ $riwayat->tgl_kembali_plan ?? '-' }}</td>
            <td class="px-4 py-4">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg border text-xs font-medium {{ $status['class'] }}">
                    <span class="w-1.5 h-1.5 rounded-full {{ $status['dot'] }}"></span>
                    {{ $status['label'] }}
                </span>
            </td>
        </tr>

        @if($loop->last)
                    </tbody>
                </table>
            </div>
        @endif

        {{-- MOBILE CARD --}}
        <div class="md:hidden p-4 mb-3 rounded-2xl bg-slate-900/60 border border-slate-800">
            <div class="flex items-start justify-between gap-3 mb-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-slate-800 border border-slate-700 flex items-center justify-center shrink-0 overflow-hidden">
                        @if(!empty($riwayat->gambar))
                            <img src="{{ asset($riwayat->gambar) }}" alt="{{ $riwayat->nama }}" class="w-full h-full object-cover">
                        @else
                            <i data-lucide="{{ $kategoriStyle[1] }}" class="w-4 h-4 text-slate-300"></i>
                        @endif
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-100">{{ $riwayat->nama ?? ($riwayat->nama_alat ?? '-') }}</p>
                        <span class="inline-flex items-center px-2 py-0.5 mt-1 rounded-md border text-[11px] font-medium {{ $kategoriStyle[0] }}">
                            {{ ucfirst($kategori) }}
                        </span>
                    </div>
                </div>
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg border text-xs font-medium shrink-0 {{ $status['class'] }}">
                    <span class="w-1.5 h-1.5 rounded-full {{ $status['dot'] }}"></span>
                    {{ $status['label'] }}
                </span>
            </div>
            <div class="grid grid-cols-2 gap-3 pt-3 border-t border-slate-800 text-xs">
                <div>
                    <p class="text-slate-500 mb-0.5">Tgl Pinjam</p>
                    <p class="text-slate-300 font-medium">{{ $riwayat->tgl_pinjam ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-slate-500 mb-0.5">Rencana Kembali</p>
                    <p class="text-slate-300 font-medium">{{ $riwayat->tgl_kembali_plan ?? '-' }}</p>
                </div>
            </div>
        </div>

    @empty
        {{-- ============ EMPTY STATE ============ --}}
        <div class="flex flex-col items-center justify-center py-16 px-4 rounded-2xl bg-slate-900/60 border border-slate-800">
            <div class="w-16 h-16 rounded-2xl bg-slate-800 border border-slate-700 flex items-center justify-center mb-4">
                <i data-lucide="inbox" class="w-7 h-7 text-slate-500"></i>
            </div>
            <p class="text-slate-300 font-medium mb-1">Belum ada riwayat peminjaman</p>
            <p class="text-slate-500 text-sm mb-5">Ajukan peminjaman barang pertamamu dari katalog.</p>
            <a href="{{ route('peminjam.katalog') }}"
               class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-indigo-500 hover:bg-indigo-400
                      text-white text-sm font-semibold transition shadow-lg shadow-indigo-500/25">
                <i data-lucide="plus" class="w-4 h-4"></i>
                Ajukan Sekarang
            </a>
        </div>
    @endforelse

</div>

<script>
    if (window.lucide) { lucide.createIcons(); }
</script>
@endsection
