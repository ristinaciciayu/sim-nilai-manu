<?php

namespace Tests\Feature;

use App\Models\Nilai;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NilaiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_dapat_menambah_data_nilai()
    {
        $nilai = Nilai::factory()->create();
        $this->assertDatabaseHas('nilais', ['nis' => $nilai->nis]);
    }

    /** @test */
    public function admin_dapat_menghapus_data_nilai()
    {
        $nilai = Nilai::factory()->create();
        $nilai->delete();

        $this->assertDatabaseMissing('nilais', ['nis' => $nilai->nis]);
    }
}
