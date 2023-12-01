<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::create(['nama_kelas' => 'RPL 1', 'jurusan_id' => 1]);
        Kelas::create(['nama_kelas' => 'RPL 2', 'jurusan_id' => 1]);
    }
}
