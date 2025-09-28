<?php

namespace Tests\Feature;

use App\Models\Kelas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KelasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_dapat_menambah_data_kelas()
    {
        $kelas = Kelas::factory()->create();
        $this->assertDatabaseHas('kelas', ['kelas' => $kelas->kelas]);
    }

    /** @test */
    public function admin_dapat_menghapus_data_kelas()
    {
        $kelas = Kelas::factory()->create();
        $kelas->delete();

        $this->assertDatabaseMissing('kelas', ['kelas' => $kelas->kelas]);
    }
}
