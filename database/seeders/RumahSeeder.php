<?php

namespace Database\Seeders;

use App\Models\Rumah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RumahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Rumah::create ([
                'user_id' => 1,
                'type_rumah' => 'rumah_2',
                'harga_rumah' => 10,
                'lokasi_rumah' => 'Jakarta',
            ]);
    }
}
