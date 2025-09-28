<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->string('nis');                // Nomor induk siswa
            $table->string('nama_siswa');         // Nama siswa
            $table->string('kelas');              // Kelas siswa
            $table->string('mapel');              // Mata pelajaran
            $table->integer('tugas')->nullable(); // Nilai tugas
            $table->integer('pts')->nullable();   // Nilai PTS
            $table->integer('pas')->nullable();   // Nilai PAS
            $table->decimal('nilai_akhir', 5, 2)->nullable(); // Nilai akhir
            $table->timestamps();                 // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};

