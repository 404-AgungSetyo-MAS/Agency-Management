<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArchiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Masuta::insert([
            'name' => 'masuta1',
            'desc' => 'masuta desc',
        ]);
        \App\Models\SubMasuta::insert([
            'masuta_id' => '1',
            'code' => '1',
            'name' => 'submasuta1',
        ]);
        \App\Models\SubSubMasuta::insert([
            'masuta_id' => '1',
            'sub_masuta_id' => '1',
            'code' => '1',
            'name' => 'subsubmasuta1',
        ]);
    }
}
