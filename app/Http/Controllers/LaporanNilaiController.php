<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use PDF; 

class LaporanNilaiController extends Controller
{
    // Menampilkan daftar nilai dengan filter kelas & mapel
    public function index(Request $request)
    {
        $kelas = $request->input('kelas');
        $mapel = $request->input('mapel');

        $query = Nilai::query();

        if ($kelas) {
            $query->where('kelas', $kelas);
        }

        if ($mapel) {
            $query->where('mapel', $mapel);
        }

        // Ambil data nilai
        $nilai = $query->orderBy('kelas')->orderBy('nama_siswa')->get();

        // Ambil daftar kelas unik untuk dropdown filter
        $daftar_kelas = Nilai::select('kelas')->distinct()->pluck('kelas');

        // Ambil daftar mapel unik untuk dropdown filter
        $daftar_mapel = Nilai::select('mapel')->distinct()->pluck('mapel');

        return view('admin.laporan_nilai.index', compact('nilai', 'daftar_kelas', 'daftar_mapel', 'kelas', 'mapel'));
    }

    // Form edit nilai
    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        return view('admin.laporan_nilai.edit', compact('nilai'));
    }

    // Update nilai
    public function update(Request $request, $id)
    {
        $request->validate([
            'tugas'       => 'nullable|integer|min:0|max:100',
            'pts'         => 'nullable|integer|min:0|max:100',
            'pas'         => 'nullable|integer|min:0|max:100',
            'nilai_akhir' => 'nullable|numeric|min:0|max:100',
        ]);

        $nilai = Nilai::findOrFail($id);

        $nilai->update($request->only(['tugas','pts','pas','nilai_akhir']));

        return redirect()->route('admin.laporan.nilai.index')
                         ->with('success', 'Data nilai berhasil diperbarui');
    }

    // Cetak PDF sesuai filter kelas & mapel
    public function cetakPdf(Request $request)
    {
        $kelas = $request->input('kelas');
        $mapel = $request->input('mapel');

        $query = Nilai::query();

        if ($kelas) {
            $query->where('kelas', $kelas);
        }

        if ($mapel) {
            $query->where('mapel', $mapel);
        }

        $nilai = $query->orderBy('kelas')->orderBy('nama_siswa')->get();

        // Data tambahan untuk kop surat
        $dataSekolah = [
            'nama_sekolah' => 'LAPORAN DAFTAR NILAI',
            'alamat'       => 'MA NU YOSOWINAMGUN',
            'tahun'        => 'Tahun 2025/2026 Semester Genap'
        ];

        $pdf = PDF::loadView('admin.laporan_nilai.pdf', compact('nilai', 'kelas', 'mapel', 'dataSekolah'));

        return $pdf->download('Laporan_Nilai_' . ($kelas ?? 'Semua_Kelas') . '_' . ($mapel ?? 'Semua_Mapel') . '.pdf');
    }
}
