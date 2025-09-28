<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilais';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nis',
        'nama_siswa',
        'kelas',
        'mapel',
        'tugas',
        'pts',
        'pas',
        'nilai_akhir',
    ];

    /**
     * Relasi ke model Siswa
     * Asumsi: tabel siswa memiliki kolom 'nis'
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }

    /**
     * Relasi ke model Mapel
     * Asumsi: tabel mapel memiliki kolom 'id_mapel'
     */
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id_mapel');
    }
}
