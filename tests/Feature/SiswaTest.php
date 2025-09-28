<?php

namespace Tests\Feature;

use App\Models\Siswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiswaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_dapat_menambah_data_siswa()
    {
        $siswa = Siswa::factory()->create();
        $this->assertDatabaseHas('siswas', ['nis' => $siswa->nis]);
    }

    /** @test */
    public function admin_dapat_menghapus_data_siswa()
    {
        $siswa = Siswa::factory()->create();
        $siswa->delete();

        $this->assertDatabaseMissing('siswas', ['nis' => $siswa->nis]);
    }
}
