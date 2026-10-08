@extends('layouts.app')

@section('title', 'Kelola Peminjaman - Panel Petugas')
@section('header-title', 'Verifikasi Peminjaman & Pengembalian')

@section('content')
    @if(session('success'))
        <div class="mb-4 bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-lg shadow-sm text-sm">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 bg-red-50 border border-red-200 text-red-800 p-4 rounded-lg shadow-sm text-sm">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
        <div class="p-5 border-b border-gray-200 bg-gray-50 flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h3 class="text-lg font-bold text-gray-800">Daftar Peminjaman</h3>
                <p class="text-xs text-gray-500 mt-1">Status <b>Diajukan</b> perlu disetujui/ditolak. Status <b>Dipinjam</b> bisa diproses pengembaliannya.</p>
            </div>

            <form action="{{ route('petugas.peminjaman.index') }}" method="GET" class="flex w-full md:w-80">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama peminjam..."
                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white px-4 py-2 text-sm font-semibold rounded-r-lg transition">
                    Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('petugas.peminjaman.index') }}"
                        class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-700 px-3 py-2 text-sm rounded-lg flex items-center transition">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 text-sm uppercase tracking-wider">
                        <th class="py-3 px-4 border-b">Peminjam</th>
                        <th class="py-3 px-4 border-b">Alat</th>
                        <th class="py-3 px-4 border-b">Tgl Pinjam / Rencana Kembali</th>
                        <th class="py-3 px-4 border-b">Status</th>
                        <th class="py-3 px-4 border-b w-72">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @forelse($peminjamans as $peminjaman)
                        <tr class="hover:bg-gray-50 transition align-top">
                            <td class="py-3 px-4 border-b font-medium text-gray-900">
                                {{ $peminjaman->user->name ?? 'User Dihapus' }}
                            </td>
                            <td class="py-3 px-4 border-b">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach($peminjaman->detailPinjams as $detail)
                                        <li>
                                            <span class="font-semibold">{{ $detail->alat->nama_alat ?? 'Alat Dihapus' }}</span>
                                            <span class="text-xs bg-gray-200 px-1.5 py-0.5 rounded">({{ $detail->jumlah }} pcs)</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="py-3 px-4 border-b text-xs text-gray-600">
                                <span class="block">Pinjam: {{ $peminjaman->tgl_pinjam }}</span>
                                <span class="block font-semibold">Rencana: {{ $peminjaman->tgl_kembali_plan }}</span>
                            </td>
                            <td class="py-3 px-4 border-b">
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full
                                    @if($peminjaman->status == 'diajukan') bg-yellow-100 text-yellow-800
                                    @elseif($peminjaman->status == 'dipinjam') bg-blue-100 text-blue-800
                                    @elseif($peminjaman->status == 'dikembalikan') bg-emerald-100 text-emerald-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst($peminjaman->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 border-b">
                                {{-- STATUS: DIAJUKAN -> tombol Setujui & Tolak --}}
                                @if($peminjaman->status == 'diajukan')
                                    <div class="flex items-center gap-2">
                                        <form action="{{ route('petugas.peminjaman.setujui', $peminjaman->id) }}" method="POST"
                                            onsubmit="return confirm('Setujui peminjaman ini? Stok alat akan otomatis dikurangi.')" class="flex-1">
                                            @csrf
                                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded text-xs font-semibold transition">
                                                Setujui
                                            </button>
                                        </form>
                                        <form action="{{ route('petugas.peminjaman.tolak', $peminjaman->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menolak pengajuan peminjaman ini?')" class="flex-1">
                                            @csrf
                                            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded text-xs font-semibold transition">
                                                Tolak
                                            </button>
                                        </form>
                                    </div>

                                {{-- STATUS: DIPINJAM -> form proses pengembalian --}}
                                @elseif($peminjaman->status == 'dipinjam')
                                    <form action="{{ route('petugas.pengembalian.proses', $peminjaman->id) }}" method="POST" class="space-y-2">
                                        @csrf
                                        <div>
                                            <label class="block text-xs font-semibold text-gray-600 mb-1">Kondisi Kembali</label>
                                            <select name="kondisi_kembali" required class="w-full text-xs border border-gray-300 rounded px-2 py-1.5 focus:outline-none">
                                                <option value="Baik">Baik</option>
                                                <option value="Rusak Ringan">Rusak Ringan</option>
                                                <option value="Rusak Berat">Rusak Berat</option>
                                                <option value="Hilang">Hilang</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-semibold text-gray-600 mb-1">Denda (Rp, opsional)</label>
                                            <input type="number" name="denda" min="0" placeholder="0"
                                                class="w-full text-xs border border-gray-300 rounded px-2 py-1.5 focus:outline-none">
                                        </div>
                                        <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1.5 rounded text-xs font-semibold transition">
                                            Proses Pengembalian
                                        </button>
                                    </form>

                                {{-- STATUS: DIKEMBALIKAN / TELAT -> tampilkan info saja --}}
                                @else
                                    <span class="text-xs text-gray-400 italic">Tidak ada aksi</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-4 text-center text-gray-500">Belum ada data peminjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection