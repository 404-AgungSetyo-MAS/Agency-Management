<?php

namespace Database\Seeders;

use App\Models\Keukategori;
use App\Models\Keusubkategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonetarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Keukategori::insert([
            'name' => 'Pribadi',
        ]);
        Keukategori::insert([
            'name' => 'Umum',
        ]);
        Keukategori::insert([
            'name' => 'Instansi/Perusahaan',
        ]);
        Keukategori::insert([
            'name' => 'Lainnya',
        ]);


        Keusubkategori::insert([
            'keukategori_id' => '1',
            'name' => 'Makan dan Minum',
        ]);
        Keusubkategori::insert([
            'keukategori_id' => '1',
            'name' => 'Transportasi',
        ]);
        Keusubkategori::insert([
            'keukategori_id' => '1',
            'name' => 'Keluarga dan Teman',
        ]);
        Keusubkategori::insert([
            'keukategori_id' => '1',
            'name' => 'Tagihan',
        ]);
        Keusubkategori::insert([
            'keukategori_id' => '2',
            'name' => 'Belanja',
        ]);
        Keusubkategori::insert([
            'keukategori_id' => '2',
            'name' => 'Konsumsi',
        ]);

        Keusubkategori::insert([
            'keukategori_id' => '3',
            'name' => 'Pengadaan aset',
        ]);
        Keusubkategori::insert([
            'keukategori_id' => '3',
            'name' => 'Kegiatan Dinas',
        ]);
        Keusubkategori::insert([
            'keukategori_id' => '3',
            'name' => 'Kebutuhan Habis Pakai',
        ]);
    }
}
