<?php

namespace Database\Seeders;

use App\Models\Alat;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class AlatSeeder extends Seeder
{
    public function run(): void
    {
        // Login sementara sebagai admin pertama, supaya AlatObserver
        // (yang butuh auth()->id() untuk mencatat log aktivitas) tidak error.
        $admin = User::where('role', 'admin')->first();
        if ($admin) {
            Auth::login($admin);
        }

        $alat = [
            [
                'kategori_id' => 1,
                'nama_alat' => 'Router Mikrotik RB941-2nD',
                'stok' => 15,
                'status_kondisi' => 'Baik',
                'deskripsi' => 'Router nirkabel rumahan yang cocok untuk praktik jaringan dasar.',
                'gambar' => 'images/alat/mikrotik_rb941.png',
            ],
            [
                'kategori_id' => 3,
                'nama_alat' => 'Kamera DSLR Canon EOS 3000D',
                'stok' => 5,
                'status_kondisi' => 'Baik',
                'deskripsi' => 'Kamera pemula untuk kebutuhan dokumentasi dan pembuatan aset media.',
                'gambar' => 'images/alat/canon_3000d.png',
            ],
            [
                'kategori_id' => 3,
                'nama_alat' => 'Mini PC Intel NUC 11',
                'stok' => 8,
                'status_kondisi' => 'Baik',
                'deskripsi' => 'Perangkat komputasi ringkas untuk server lokal skala kecil.',
                'gambar' => 'images/alat/intel_nuc.png',
            ],
            [
                'kategori_id' => 2,
                'nama_alat' => 'Tang Crimping RJ45/RJ11 Proskit',
                'stok' => 20,
                'status_kondisi' => 'Baik',
                'deskripsi' => 'Alat potong dan pasang konektor kabel UTP.',
                'gambar' => 'images/alat/crimping_proskit.png',
            ],
            [
                'kategori_id' => 1,
                'nama_alat' => 'Adapter HDMI to VGA dengan Audio',
                'stok' => 25,
                'status_kondisi' => 'Baik',
                'deskripsi' => 'Konverter display untuk menyambungkan perangkat modern ke proyektor lama.',
                'gambar' => 'images/alat/hdmi_vga.png',
            ],
        ];

        foreach ($alat as $item) {
            Alat::create($item);
        }

        if ($admin) {
            Auth::logout();
        }
    }
}
