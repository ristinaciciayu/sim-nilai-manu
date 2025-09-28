<?php

namespace Tests\Feature;

use App\Models\Guru;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GuruTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_dapat_menambah_data_guru()
    {
        $guru = Guru::factory()->create();
        $this->assertDatabaseHas('gurus', ['nip' => $guru->nip]);
    }

    /** @test */
    public function admin_dapat_menghapus_data_guru()
    {
        $guru = Guru::factory()->create();
        $guru->delete();

        $this->assertDatabaseMissing('gurus', ['nip' => $guru->nip]);
    }
}
