<?php

namespace Database\Seeders;

use App\Models\AssetClasification;
use App\Models\AssetLocation;
use App\Models\AssetSubType;
use App\Models\AssetType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Klasifikasi Aset
        AssetClasification::insert([
            'nama' => 'Kendaraan',
        ]);
        AssetClasification::insert([
            'nama' => 'Furnitur dan Kebutuhan kantor',
        ]);
        AssetClasification::insert([
            'nama' => 'Lainnya',
        ]);
//_________________________________________________________________________________
        //AK-1 AsetType
        AssetType::insert([
            'asset_clasification_id' => '1',
            'nama' => 'Roda 2',
        ]);
        AssetType::insert([
            'asset_clasification_id' => '1',
            'nama' => 'Roda 4',
        ]);
        //AK-2 AsetType
        AssetType::insert([
            'asset_clasification_id' => '2',
            'nama' => 'Elektronik',
        ]);
        AssetType::insert([
            'asset_clasification_id' => '2',
            'nama' => 'Furnitur',
        ]);
        AssetType::insert([
            'asset_clasification_id' => '2',
            'nama' => 'Komputer',
        ]);
//_____________________________________________________________________________
        //AK-1 AT-1 AsetSubType
        AssetSubType::insert([
            'asset_clasification_id' => '1',
            'asset_type_id' => '1',
            'nama' => 'Motor',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '1',
            'asset_type_id' => '1',
            'nama' => 'Sepeda',
        ]);
        //AK-1 AT-2 AsetSubType
        AssetSubType::insert([
            'asset_clasification_id' => '1',
            'asset_type_id' => '2',
            'nama' => 'Sedan',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '1',
            'asset_type_id' => '2',
            'nama' => 'Minibus',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '1',
            'asset_type_id' => '2',
            'nama' => 'Truk',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '1',
            'asset_type_id' => '2',
            'nama' => 'Bus',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '1',
            'asset_type_id' => '2',
            'nama' => 'MPV',
        ]);
        //AK-2 AT-1
        AssetSubType::insert([
            'asset_clasification_id' => '2',
            'asset_type_id' => '3',
            'nama' => 'AC',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '2',
            'asset_type_id' => '3',
            'nama' => 'Mesin Fax',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '2',
            'asset_type_id' => '3',
            'nama' => 'TV',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '2',
            'asset_type_id' => '3',
            'nama' => 'Kulkas',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '2',
            'asset_type_id' => '3',
            'nama' => 'Telepon',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '2',
            'asset_type_id' => '3',
            'nama' => 'Lainnya',
        ]);
        //AK-2 AT-2
        AssetSubType::insert([
            'asset_clasification_id' => '2',
            'asset_type_id' => '4',
            'nama' => 'Meja',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '2',
            'asset_type_id' => '4',
            'nama' => 'Kursi',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '2',
            'asset_type_id' => '4',
            'nama' => 'Lemari',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '2',
            'asset_type_id' => '4',
            'nama' => 'Rak',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '2',
            'asset_type_id' => '4',
            'nama' => 'Dekorasi',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '2',
            'asset_type_id' => '4',
            'nama' => 'Lainnya',
        ]);
        //AK-2 AT-3
        AssetSubType::insert([
            'asset_clasification_id' => '2',
            'asset_type_id' => '5',
            'nama' => 'PC',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '2',
            'asset_type_id' => '5',
            'nama' => 'Monitor',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '2',
            'asset_type_id' => '5',
            'nama' => 'Laptop',
        ]);
        AssetSubType::insert([
            'asset_clasification_id' => '2',
            'asset_type_id' => '5',
            'nama' => 'Printer',
        ]);


        //Klasifikasi Aset
        AssetLocation::insert([
            'nama' => 'Ruang Administrasi',
        ]);
        AssetLocation::insert([
            'nama' => 'Ruang Tata Usaha',
        ]);
        AssetLocation::insert([
            'nama' => 'Ruang Lobby',
        ]);
        AssetLocation::insert([
            'nama' => 'Ruang Aula A',
        ]);
        AssetLocation::insert([
            'nama' => 'Ruang Aula B',
        ]);
    }
}
