<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            [
                'nama' => "Teknik Komputer dan jaringan"
            ],
            [
                'nama' => "Teknik dan Bisnis Sepeda Motor"
            ],
            [
                'nama' => "Akuntansi dan Keuangan Lembaga"
            ],
            [
                'nama' => "Otomatisasi dan Tata Kelola Perkantoran"
            ],
            [
                'nama' => "Bisnis Daring dan Pemasaran"
            ],
            [
                'nama' =>  "Disain Komunikasi Visual"
            ],
        ];
        foreach ($data as $item) {

            Jurusan::create($item);
        }
    }
}
