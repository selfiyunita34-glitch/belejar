<?php

namespace Database\Seeders;

use App\Models\Ktp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ktp::create ([
            'user_id' => 1,
            'nik' => '1234567890123456',
        ]);
    }
}
