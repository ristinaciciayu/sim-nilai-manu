    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\GuruController;
    use App\Http\Controllers\KelasController;
    use App\Http\Controllers\MapelController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\NilaiController;
    use App\Http\Controllers\LaporanNilaiController;
    use App\Http\Controllers\DashboardController;


    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Admin Dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->middleware('auth');

    Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    });


    // Guru Dashboard
    Route::get('/guru/dashboard', function () {
        return view('guru.dashboard');
    })->middleware('auth');

    Route::prefix('guru')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('guru.dashboard');
    });


   // admin crud
    Route::prefix('admin')->name('admin.')->group(function() {
        Route::resource('data_guru', GuruController::class);
    });

    Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('data_siswa', \App\Http\Controllers\SiswaController::class);
    });

    Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('data_kelas', KelasController::class);
    });

    Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('data_mapel', MapelController::class);
    });
    
  
    Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('users',UserController::class);
    });

    
    Route::prefix('admin')->group(function () {
        Route::get('/laporan_nilai', [LaporanNilaiController::class, 'index'])->name('admin.laporan.nilai.index');
        Route::get('/laporan_nilai/pdf', [LaporanNilaiController::class, 'cetakPdf'])->name('admin.laporan.nilai.pdf');

        Route::get('/laporan_nilai/{id}/edit', [LaporanNilaiController::class, 'edit'])->name('admin.laporan.nilai.edit');
        Route::put('/laporan_nilai/{id}', [LaporanNilaiController::class, 'update'])->name('admin.laporan.nilai.update');
    });


    //untuk halaman guru

    Route::prefix('guru')->name('guru.')->group(function() {
    Route::get('/data_guru', [GuruController::class, 'indexGuru'])->name('data_guru');
    });

    Route::prefix('guru')->name('guru.')->group(function () {
    Route::resource('data_siswa', \App\Http\Controllers\SiswaController::class);
    });

    Route::prefix('guru')->name('guru.')->group(function () {
    Route::get('/data_kelas', [KelasController::class, 'indexKelas'])->name('data_kelas');
    });

    Route::prefix('guru')->name('guru.')->group(function () {
    Route::get('/data_mapel', [MapelController::class, 'indexMapel'])->name('data_mapel');
    });

    // input nilai

// Route::prefix('guru')->name('guru.')->group(function () {
//     Route::get('nilai/{kelas}', [NilaiController::class, 'index'])
//         ->where('kelas', 'X|XI|XII')
//         ->name('nilai.index');

//     Route::get('nilai/{kelas}/create', [NilaiController::class, 'create'])->name('nilai.create');
//     Route::post('nilai/{kelas}', [NilaiController::class, 'store'])->name('nilai.store');

//     // Tambahkan ini untuk edit & delete
//     Route::get('nilai/{kelas}/{id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');
//     Route::put('nilai/{kelas}/{id}', [NilaiController::class, 'update'])->name('nilai.update');
//     Route::delete('nilai/{kelas}/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
// });

Route::prefix('guru')->name('guru.')->group(function () {
    Route::get('nilai/{kelas}', [NilaiController::class, 'index'])
        ->where('kelas', 'X|XI|XII')
        ->name('nilai.index');

    Route::get('nilai/{kelas}/create', [NilaiController::class, 'create'])->name('nilai.create');
    Route::post('nilai/{kelas}/store_batch', [NilaiController::class, 'storeBatch'])->name('nilai.store_batch');

    Route::get('nilai/{kelas}/{id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');
    Route::put('nilai/{kelas}/{id}', [NilaiController::class, 'update'])->name('nilai.update');
    Route::delete('nilai/{kelas}/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');

    // Ajax: ambil siswa berdasarkan kelas
    Route::get('nilai/siswa/{kelas}', [NilaiController::class, 'getSiswaByKelas']);
});

