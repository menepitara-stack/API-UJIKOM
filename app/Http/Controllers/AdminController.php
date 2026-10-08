// 1. Menampilkan daftar pengembalian (riwayat + yang masih aktif)
public function indexPengembalian(Request $request)
{
    $search = $request->input('search');

    $peminjamans = Peminjaman::with(['user', 'detailPinjams.alat', 'pengembalian'])
        ->whereIn('status', ['dipinjam', 'telat', 'dikembalikan'])
        ->when($search, function ($query, $search) {
            return $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        })
        ->latest()
        ->get();

    return view('admin.pengembalian.index', compact('peminjamans', 'search'));
}

// 2. Menampilkan form proses pengembalian untuk 1 peminjaman tertentu
public function createPengembalian($id)
{
    $peminjaman = Peminjaman::with(['user', 'detailPinjams.alat'])->findOrFail($id);

    return view('admin.pengembalian.create', compact('peminjaman'));
}

// 3. Menyimpan data pengembalian (dengan denda otomatis)
public function storePengembalian(Request $request, $id)
{
    $request->validate([
        'tgl_kembali' => 'required|date',
        'kondisi_kembali' => 'required|string|max:255',
        'denda_tambahan' => 'nullable|integer|min:0',
    ]);

    DB::beginTransaction();
    try {
        $peminjaman = Peminjaman::with('detailPinjams.alat')->findOrFail($id);

        $tglPlan = \Carbon\Carbon::parse($peminjaman->tgl_kembali_plan);
        $tglAktual = \Carbon\Carbon::parse($request->tgl_kembali);

        $dendaOtomatis = 0;
        $tarifDendaPerHari = 5000;

        if ($tglAktual->greaterThan($tglPlan)) {
            $selisihHari = $tglPlan->diffInDays($tglAktual);
            $dendaOtomatis = $selisihHari * $tarifDendaPerHari;
        }

        $dendaTambahan = $request->denda_tambahan ?? 0;
        $totalDenda = $dendaOtomatis + $dendaTambahan;

        Pengembalian::create([
            'peminjaman_id' => $peminjaman->id,
            'tgl_kembali' => $request->tgl_kembali,
            'kondisi_kembali' => $request->kondisi_kembali,
            'denda' => $totalDenda,
            'petugas_id' => auth()->id(),
        ]);

        $peminjaman->update(['status' => 'dikembalikan']);

        foreach ($peminjaman->detailPinjams as $detail) {
            $detail->alat->increment('stok', $detail->jumlah);
        }

        DB::commit();
        return redirect()->route('admin.pengembalian.index')
            ->with('success', 'Pengembalian berhasil diproses. Denda: Rp ' . number_format($totalDenda, 0, ',', '.'));
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withInput()->with('error', $e->getMessage());
    }
}

// 4. Menghapus data pengembalian
public function destroyPengembalian($id)
{
    $pengembalian = Pengembalian::with('peminjaman.detailPinjams.alat')->findOrFail($id);

    DB::beginTransaction();
    try {
        $peminjaman = $pengembalian->peminjaman;

        if ($peminjaman) {
            $peminjaman->update(['status' => 'dipinjam']);
            foreach ($peminjaman->detailPinjams as $detail) {
                $detail->alat->decrement('stok', $detail->jumlah);
            }
        }

        $pengembalian->delete();

        DB::commit();
        return redirect()->route('admin.pengembalian.index')->with('success', 'Data pengembalian berhasil dihapus.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', $e->getMessage());
    }
}