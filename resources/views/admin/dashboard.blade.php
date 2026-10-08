@extends('layouts.app')

@section('title', 'Dashboard Admin - Sistem Peminjaman')
@section('header-title', 'Ringkasan Aktivitas Sistem')

@section('content')

<div class="mb-6 flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl">
    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    <p>Selamat datang, <strong class="font-semibold">{{ auth()->user()->name ?? 'Admin' }}</strong>! Anda login sebagai hak akses
    <span class="uppercase font-bold text-emerald-900">{{ auth()->user()->role ?? 'Admin' }}</span>.</p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
        <h3 class="text-base font-bold text-slate-800">Log Aktivitas</h3>
        <span class="text-xs font-medium text-slate-400">{{ $logs->count() ?? 0 }} entri terbaru</span>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider">
                    <th class="py-3 px-5 font-semibold">Waktu</th>
                    <th class="py-3 px-5 font-semibold">User</th>
                    <th class="py-3 px-5 font-semibold">Aktivitas</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-slate-100">
                @forelse($logs as $log)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-3 px-5 text-slate-500 whitespace-nowrap">{{ $log->created_at->format('d M Y, H:i') }}</td>
                        <td class="py-3 px-5 font-semibold text-slate-800 whitespace-nowrap">{{ $log->user->name ?? 'Sistem' }}</td>
                        <td class="py-3 px-5 text-slate-600">{{ $log->aktivitas }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-8 text-center text-slate-400">Belum ada log aktivitas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
