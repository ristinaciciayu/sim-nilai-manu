<?php

namespace Tests\Feature;

use App\Models\Mapel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MapelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_dapat_menambah_data_mapel()
    {
        $mapel = Mapel::factory()->create();
        $this->assertDatabaseHas('mapels', ['nama_mapel' => $mapel->nama_mapel]);
    }

    /** @test */
    public function admin_dapat_menghapus_data_mapel()
    {
        $mapel = Mapel::factory()->create();
        $mapel->delete();

        $this->assertDatabaseMissing('mapels', ['nama_mapel' => $mapel->nama_mapel]);
    }
}
