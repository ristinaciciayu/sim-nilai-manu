<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Total per kategori
        $jumlahGuru = Guru::count();
        $jumlahSiswa = Siswa::count();
        $jumlahKelas = Siswa::select('kelas')->distinct()->count();
        $jumlahMapel = Mapel::count();

        // Data chart: jumlah per kategori
        $chartLabels = ['Guru', 'Siswa', 'Kelas', 'Mapel'];
        $chartData = [$jumlahGuru, $jumlahSiswa, $jumlahKelas, $jumlahMapel];

        // Tentukan view berdasarkan role
        if (Auth::user()->role === 'guru') {
            // Role guru melihat dashboard guru
            return view('guru.dashboard', compact(
                'jumlahGuru', 
                'jumlahSiswa', 
                'jumlahKelas', 
                'jumlahMapel', 
                'chartLabels',
                'chartData'
            ));
        }

        // Default admin dashboard
        return view('admin.dashboard', compact(
            'jumlahGuru', 
            'jumlahSiswa', 
            'jumlahKelas', 
            'jumlahMapel', 
            'chartLabels',
            'chartData'
        ));
    }
}

