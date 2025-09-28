<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    // Tampilkan daftar nilai
    public function index($kelas)
    {
        $nilai = Nilai::where('kelas', $kelas)->get();
        return view('guru.nilai.index', compact('nilai', 'kelas'));
    }

    // Form input batch
   public function create($kelas)
{
    $mapel_list = [
        'Akidah Ahlak',
        'Al-Qur\'an Hadist',
        'Bahasa Arab',
        'Bahasa Indonesia',
        'Bahasa Inggris',
        'Fiqih',
        'Ilmu Pengetahuan Alam',
        'Matematika',
        'Pendidikan Kewarga Negaraan',
        'Sejarah Kebudayaan Islam'
    ];

    return view('guru.nilai.create', compact('kelas','mapel_list'));
}

    // Ajax: ambil siswa berdasarkan kelas
    public function getSiswaByKelas($kelas)
    {
        $siswas = Siswa::where('kelas', $kelas)->get();
        return response()->json($siswas);
    }

    // Simpan batch
    public function storeBatch(Request $request, $kelas)
    {
        $request->validate([
            'mapel' => 'required|string|max:100',
            'nis.*' => 'required|string',
            'tugas.*' => 'nullable|integer|min:0|max:100',
            'pts.*'   => 'nullable|integer|min:0|max:100',
            'pas.*'   => 'nullable|integer|min:0|max:100',
        ]);

        foreach($request->nis as $i => $nis){
            $tugas_val = $request->tugas[$i] ?? 0; // nilai tugas
            $pts_val   = $request->pts[$i] ?? 0;   // nilai ulangan harian
            $pas_val   = $request->pas[$i] ?? 0;   // nilai UTS

            $nilai_akhir = round(($pts_val*0.3) + ($tugas_val*0.3) + ($pas_val*0.4), 2);

            Nilai::updateOrCreate(
                ['nis'=>$nis, 'kelas'=>$kelas, 'mapel'=>$request->mapel],
                [
                    'tugas'=>$tugas_val,
                    'pts'=>$pts_val,
                    'pas'=>$pas_val,
                    'nilai_akhir'=>$nilai_akhir,
                    'nama_siswa'=>Siswa::where('nis',$nis)->value('nama_siswa')
                ]
            );
        }

        return redirect()->route('guru.nilai.index',['kelas'=>$kelas])
                         ->with('success','Nilai berhasil disimpan!');
    }

    // Edit nilai
    public function edit($kelas, $id)
    {
        $n = Nilai::where('kelas', $kelas)->findOrFail($id);
        return view('guru.nilai.edit', ['nilai' => $n, 'kelas' => $kelas]);
    }

    // Update nilai
    public function update(Request $request, $kelas, $id)
    {
        $request->validate([
            'mapel' => 'required|string|max:100',
            'tugas' => 'nullable|integer|min:0|max:100',
            'pts'   => 'nullable|integer|min:0|max:100',
            'pas'   => 'nullable|integer|min:0|max:100',
        ]);

        $tugas_val = $request->tugas ?? 0;
        $pts_val   = $request->pts ?? 0;
        $pas_val   = $request->pas ?? 0;

        $nilai_akhir = round(($pts_val*0.3)+($tugas_val*0.3)+($pas_val*0.4),2);

        $n = Nilai::where('kelas', $kelas)->findOrFail($id);
        $n->update([
            'mapel'=>$request->mapel,
            'tugas'=>$tugas_val,
            'pts'=>$pts_val,
            'pas'=>$pas_val,
            'nilai_akhir'=>$nilai_akhir
        ]);

        return redirect()->route('guru.nilai.index',['kelas'=>$kelas])
                         ->with('success','Nilai berhasil diperbarui!');
    }

    // Hapus nilai
    public function destroy($kelas, $id)
    {
        $n = Nilai::where('kelas', $kelas)->findOrFail($id);
        $n->delete();

        return redirect()->route('guru.nilai.index',['kelas'=>$kelas])
                         ->with('success','Data nilai berhasil dihapus.');
    }
}
