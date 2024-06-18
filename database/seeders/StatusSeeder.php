<?php

namespace Database\Seeders;

use App\Models\Statusaset;
use App\Models\Statusdoc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Statusdoc::insert([
            'name' => 'Tidak Butuh Tanda Tangan',
        ]);
        //1
        Statusdoc::insert([
            'name' => 'Butuh Tanda Tangan',
        ]);
        //2
        Statusdoc::insert([
            'name' => 'Dokumen Belum Lengkap',
        ]);
        //3
        Statusdoc::insert([
            'name' => 'Dokumen Lengkap',
        ]);

        Statusaset::insert([
            'name' => 'Baik',
        ]);
        Statusaset::insert([
            'name' => 'Perawatan',
        ]);
        Statusaset::insert([
            'name' => 'Rusak/tidak dapat digunakan',
        ]);
        Statusaset::insert([
            'name' => 'Tidak ada/sudah ganti',
        ]);
    }
}
