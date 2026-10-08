@extends('layouts.app')

@section('title', 'Edit Pengembalian - Panel Admin')
@section('header-title', 'Edit Data Pengembalian')

@section('content')
    <div class="max-w-xl bg-white rounded-lg shadow-sm border border-gray-200 p-6">

        {{-- Info singkat peminjaman --}}
        <div class="mb-6 bg-gray-50 border border-gray-200 rounded-lg p-4 text-sm">
            <p><span class="font-semibold text-gray-700">Peminjam:</span> {{ $pengembalian->peminjaman->user->name ?? '-' }}</p>
            <p class="mt-2 font-semibold text-gray-700">Alat yang dipinjam:</p>
            <ul class="list-disc list-inside">
                @foreach($pengembalian->peminjaman->detailPinjams as $detail)
                    <li>{{ $detail->alat->nama_alat ?? 'Alat Dihapus' }} (Jumlah: {{ $detail->jumlah }})</li>
                @endforeach
            </ul>
        </div>

        <form action="{{ route('admin.pengembalian.update', $pengembalian->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Tanggal Pengembalian</label>
                <input type="date" name="tgl_kembali" value="{{ old('tgl_kembali', $pengembalian->tgl_kembali) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('tgl_kembali') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Kondisi Alat Saat Kembali</label>
                <select name="kondisi_kembali" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach(['Baik', 'Rusak Ringan', 'Rusak Berat', 'Hilang'] as $kondisi)
                        <option value="{{ $kondisi }}" {{ old('kondisi_kembali', $pengembalian->kondisi_kembali) == $kondisi ? 'selected' : '' }}>
                            {{ $kondisi }}
                        </option>
                    @endforeach
                </select>
                @error('kondisi_kembali') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Denda (Rp)</label>
                <input type="number" name="denda" value="{{ old('denda', $pengembalian->denda) }}" min="0"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('denda') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Keterangan (Opsional)</label>
                <textarea name="keterangan" rows="3"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('keterangan', $pengembalian->keterangan) }}</textarea>
                @error('keterangan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.pengembalian.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg text-sm font-semibold transition">Batal</a>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">Perbarui</button>
            </div>
        </form>
    </div>
@endsection