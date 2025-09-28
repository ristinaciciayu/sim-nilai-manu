<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function __construct()
    {
        // Pastikan user login
        $this->middleware('auth');
    }

    /**
     * Tampilkan daftar siswa.
     * Guru hanya bisa lihat, admin bisa CRUD.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Siswa::query();

        if ($search) {
            $query->where('nama_siswa', 'like', "%{$search}%");
        }

        $siswas = $query->orderBy('nama_siswa')->paginate(10);
        $siswas->appends(['search' => $search]);

        // Pilih view sesuai role
        if (Auth::user()->role == 'guru') {
            return view('guru.data_siswa.index', compact('siswas'));
        }

        // Default admin
        return view('admin.data_siswa.index', compact('siswas'));
    }

    /**
     * Form tambah siswa (hanya admin)
     */
    public function create()
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        return view('admin.data_siswa.tambah_siswa');
    }

    /**
     * Simpan data siswa baru (hanya admin)
     */
    public function store(Request $request)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        $request->validate([
            'nis' => 'required|unique:siswas',
            'nama_siswa' => 'required',
            'alamat' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'no_tlpn' => 'required',
        ]);

        Siswa::create($request->all());

        return redirect()->route('admin.data_siswa.index')
                         ->with('success', 'Data siswa berhasil ditambahkan');
    }

    /**
     * Form edit siswa (hanya admin)
     */
    public function edit($id)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        $siswa = Siswa::findOrFail($id);
        return view('admin.data_siswa.edit_siswa', compact('siswa'));
    }

    /**
     * Update data siswa (hanya admin)
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nis' => 'required|unique:siswas,nis,'.$siswa->id,
            'nama_siswa' => 'required',
            'alamat' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'no_tlpn' => 'required',
        ]);

        $siswa->update($request->all());

        return redirect()->route('admin.data_siswa.index')
                         ->with('success', 'Data siswa berhasil diperbarui');
    }

    /**
     * Hapus data siswa (hanya admin)
     */
    public function destroy($id)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.data_siswa.index')
                         ->with('success', 'Data siswa berhasil dihapus');
    }
}
