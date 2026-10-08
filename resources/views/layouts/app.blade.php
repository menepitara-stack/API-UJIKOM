<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 999px; }
        ::-webkit-scrollbar-track { background: transparent; }
    </style>
</head>
<body class="bg-slate-100 antialiased">

    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-slate-900 text-white flex-col hidden md:flex">
            <div class="h-16 flex items-center gap-3 px-5 border-b border-slate-800">
                <div class="w-9 h-9 rounded-lg bg-indigo-500 flex items-center justify-center font-bold text-white text-sm">
                    {{ substr(auth()->user()->role ?? 'S', 0, 1) }}
                </div>
                <div class="leading-tight">
                    <p class="text-sm font-bold tracking-wide">
                        @if(auth()->user()->role == 'admin') PANEL ADMIN
                        @elseif(auth()->user()->role == 'petugas') PANEL PETUGAS
                        @elseif(auth()->user()->role == 'peminjam') PANEL PEMINJAM
                        @else PANEL SISTEM
                        @endif
                    </p>
                    <p class="text-xs text-slate-400">Sistem Peminjaman Alat</p>
                </div>
            </div>

            <nav class="flex-1 p-3 space-y-1 overflow-y-auto">

                @php
                    $linkBase = 'flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm transition';
                    $active = 'bg-indigo-500 text-white font-semibold shadow-sm';
                    $inactive = 'text-slate-400 hover:bg-slate-800 hover:text-white';
                @endphp

                @if(auth()->user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="{{ $linkBase }} {{ request()->routeIs('admin.dashboard') ? $active : $inactive }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.user.index') }}" class="{{ $linkBase }} {{ request()->routeIs('admin.user*') ? $active : $inactive }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 10-4-4 4 4 0 004 4zm6 0a4 4 0 10-4-4"/></svg>
                        Kelola User
                    </a>
                    <a href="{{ route('admin.kategori.index') }}" class="{{ $linkBase }} {{ request()->routeIs('admin.kategori*') ? $active : $inactive }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7"/></svg>
                        Kelola Kategori
                    </a>
                    <a href="{{ route('admin.alat.index') }}" class="{{ $linkBase }} {{ request()->routeIs('admin.alat*') ? $active : $inactive }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 011-1h1a2 2 0 100-4H6a1 1 0 01-1-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/></svg>
                        Kelola Alat
                    </a>
                    <a href="{{ route('admin.peminjaman.index') }}" class="{{ $linkBase }} {{ request()->routeIs('admin.peminjaman*') ? $active : $inactive }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Kelola Peminjaman
                    </a>

                @elseif(auth()->user()->role == 'petugas')
                    <a href="{{ route('petugas.peminjaman.index') }}" class="{{ $linkBase }} {{ request()->routeIs('petugas.peminjaman*') ? $active : $inactive }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Persetujuan Peminjaman
                    </a>
                    <a href="{{ route('petugas.pengembalian.index') }}" class="{{ $linkBase }} {{ request()->routeIs('petugas.pengembalian*') ? $active : $inactive }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        Pemantauan Pengembalian
                    </a>
                    <a href="{{ route('petugas.laporan.index') }}" class="{{ $linkBase }} {{ request()->routeIs('petugas.laporan*') ? $active : $inactive }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2a4 4 0 014-4h4m0 0l-3-3m3 3l-3 3M4 5h9a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V7a2 2 0 012-2z"/></svg>
                        Cetak Laporan
                    </a>

                @elseif(auth()->user()->role == 'peminjam')
                    <a href="{{ route('peminjam.katalog') }}" class="{{ $linkBase }} {{ request()->routeIs('peminjam.katalog') ? $active : $inactive }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM9 4v16m6-16v16"/></svg>
                        Katalog Alat
                    </a>
                    <a href="{{ route('peminjam.riwayat') }}" class="{{ $linkBase }} {{ request()->routeIs('peminjam.riwayat') ? $active : $inactive }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Riwayat Peminjaman
                    </a>
                @endif

            </nav>

            <div class="p-4 border-t border-slate-800 flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-indigo-500/20 text-indigo-300 flex items-center justify-center font-semibold text-sm">
                    {{ strtoupper(substr(auth()->user()->name ?? '?', 0, 1)) }}
                </div>
                <div class="leading-tight overflow-hidden">
                    <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-slate-400 capitalize">{{ auth()->user()->role }}</p>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT CONTAINER -->
        <div class="flex-1 flex flex-col overflow-y-auto">

            <!-- NAVBAR ATAS -->
            <header class="bg-white border-b border-slate-200 h-16 flex items-center justify-between px-6 sticky top-0 z-10">
                <h1 class="text-lg font-bold text-slate-800">
                    @yield('header-title', 'Dashboard')
                </h1>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 bg-red-50 hover:bg-red-100 text-red-600 text-sm font-semibold px-4 py-2 rounded-lg transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </header>

            <!-- KONTEN UTAMA HALAMAN -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>

        </div>
    </div>

    @stack('scripts')
</body>
</html>
