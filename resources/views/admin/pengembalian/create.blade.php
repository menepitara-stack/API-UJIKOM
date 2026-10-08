@extends('layouts.app')

@section('title', 'Proses Pengembalian - Panel Admin')
@section('header-title', 'Proses Pengembalian Alat')

@section('content')
    <div class="max-w-xl bg-white rounded-lg shadow-sm border border-gray-200 p-6">

        {{-- Info singkat peminjaman --}}
        <div class="mb-6 bg-gray-50 border border-gray-200 rounded-lg p-4 text-sm">
            <p><span class="font-semibold text-gray-700">Peminjam:</span> {{ $peminjaman->user->name ?? '-' }}</p>
            <p><span class="font-semibold text-gray-700">Tgl Pinjam:</span> {{ $peminjaman->tgl_pinjam }}</p>
            <p><span class="font-semibold text-gray-700">Rencana Kembali:</span> {{ $peminjaman->tgl_kembali_plan }}</p>
            <p class="mt-2 font-semibold text-gray-700">Alat yang dipinjam:</p>
            <ul class="list-disc list-inside">
                @foreach($peminjaman->detailPinjams as $detail)
                    <li>{{ $detail->alat->nama_alat ?? 'Alat Dihapus' }} (Jumlah: {{ $detail->jumlah }})</li>
                @endforeach
            </ul>
        </div>

        @if(session('error'))
            <div class="mb-4 bg-red-50 border border-red-200 text-red-800 p-3 rounded-lg text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.pengembalian.store', $peminjaman->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Tanggal Pengembalian</label>
                <input type="date" name="tgl_kembali" value="{{ old('tgl_kembali', date('Y-m-d')) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('tgl_kembali') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Kondisi Alat Saat Kembali</label>
                <select name="kondisi_kembali" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Baik" {{ old('kondisi_kembali') == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak Ringan" {{ old('kondisi_kembali') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="Rusak Berat" {{ old('kondisi_kembali') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                    <option value="Hilang" {{ old('kondisi_kembali') == 'Hilang' ? 'selected' : '' }}>Hilang</option>
                </select>
                @error('kondisi_kembali') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Denda (Rp)</label>
                <input type="number" name="denda" value="{{ old('denda', 0) }}" min="0" placeholder="0"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-xs text-gray-500 mt-1">Isi manual kalau ada denda keterlambatan/kerusakan.</p>
                @error('denda') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Keterangan (Opsional)</label>
                <textarea name="keterangan" rows="3" placeholder="Catatan tambahan..."
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('keterangan') }}</textarea>
                @error('keterangan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.pengembalian.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg text-sm font-semibold transition">Batal</a>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">Simpan Pengembalian</button>
            </div>
        </form>
    </div>
@endsection