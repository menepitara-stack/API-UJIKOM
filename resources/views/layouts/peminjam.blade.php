<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Peminjaman Alat')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }
    </style>
</head>
<body class="bg-slate-950 text-slate-200 antialiased">
    <div class="flex h-screen overflow-hidden">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-slate-900 border-r border-slate-800 flex flex-col flex-shrink-0">
            <div class="h-16 flex items-center gap-3 px-5 border-b border-slate-800">
                <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center font-bold text-white">P</div>
                <span class="font-bold text-white text-lg">Peminjaman Alat</span>
            </div>

            <nav class="flex-1 px-3 py-5 space-y-1">
                <a href="{{ route('peminjam.katalog') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                        {{ request()->routeIs('peminjam.katalog') ? 'bg-indigo-600/20 text-indigo-400 border border-indigo-600/40' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <span>📋</span> Katalog Alat
                </a>
                <a href="{{ route('peminjam.riwayat') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                        {{ request()->routeIs('peminjam.riwayat') ? 'bg-indigo-600/20 text-indigo-400 border border-indigo-600/40' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <span>🕓</span> Riwayat Pinjam
                </a>
            </nav>

            <div class="p-4 border-t border-slate-800">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-indigo-600 flex items-center justify-center font-bold text-white text-sm">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name ?? 'User' }}</p>
                        <p class="text-xs text-slate-500">Peminjam</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" title="Logout" class="text-slate-500 hover:text-red-400 transition">⏻</button>
                    </form>
                </div>
            </div>
        </aside>

        {{-- MAIN --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="h-16 flex items-center justify-between px-6 border-b border-slate-800 bg-slate-900/40 flex-shrink-0">
                <h1 class="text-lg font-bold text-white">@yield('header-title', 'Dashboard')</h1>
                <div id="live-clock" class="text-sm text-slate-400 font-medium"></div>
            </header>

            <main class="flex-1 overflow-y-auto p-6">
                @if(session('success'))
                    <div class="mb-4 bg-emerald-900/40 border border-emerald-700 text-emerald-300 px-4 py-3 rounded-lg text-sm">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-4 bg-red-900/40 border border-red-700 text-red-300 px-4 py-3 rounded-lg text-sm">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function updateClock() {
            const now = new Date();
            const hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'][now.getDay()];
            const bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'][now.getMonth()];
            const pad = n => n.toString().padStart(2, '0');
            const str = `${hari}, ${now.getDate()} ${bulan} ${now.getFullYear()}, ${pad(now.getHours())}:${pad(now.getMinutes())}:${pad(now.getSeconds())}`;
            const el = document.getElementById('live-clock');
            if (el) el.textContent = str;
        }
        updateClock();
        setInterval(updateClock, 1000);
    </script>

    @stack('scripts')
</body>
</html>
