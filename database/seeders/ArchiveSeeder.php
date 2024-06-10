<?php

namespace Database\Seeders;

use App\Models\Masuta;
use App\Models\SubMasuta;
use App\Models\SubSubMasuta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArchiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Masuta::insert([
            'name' => 'Kepegawaian',
            'desc' => 'Dokumen Kepegawaian',
        ]);
        Masuta::insert([
            'name' => 'Keuangan',
            'desc' => 'Dokumen Keuangan',
        ]);
        Masuta::insert([
            'name' => 'Umum',
            'desc' => 'Dokumen Umum',
        ]);
//-----------------------------------------------------------------------------
        //Mas - 1
        //id-1
        SubMasuta::insert([
            'masuta_id' => '1',
            // 'code' => '1',
            'name' => 'Pengembangan',
        ]);
        //id-2
        SubMasuta::insert([
            'masuta_id' => '1',
            // 'code' => '2',
            'name' => 'Pengendalian',
        ]);
        //id-3
        SubMasuta::insert([
            'masuta_id' => '1',
            // 'code' => '2',
            'name' => 'Izin',
        ]);
        //Mas - 2
        //id-4
        SubMasuta::insert([
            'masuta_id' => '2',
            // 'code' => '1',
            'name' => 'Tanda Bukti',
        ]);
        //id-5
        SubMasuta::insert([
            'masuta_id' => '2',
            // 'code' => '1',
            'name' => 'Laporan',
        ]);
        //id-6
        SubMasuta::insert([
            'masuta_id' => '2',
            // 'code' => '1',
            'name' => 'Pajak',
        ]);
        //id-7
        SubMasuta::insert([
            'masuta_id' => '2',
            // 'code' => '1',
            'name' => 'Pembayaran',
        ]);

        //Mas - 3
        //id-8
        SubMasuta::insert([
            'masuta_id' => '3',
            // 'code' => '1',
            'name' => 'Undangan',
        ]);
        //id-9
        SubMasuta::insert([
            'masuta_id' => '3',
            // 'code' => '1',
            'name' => 'Kerjasama',
        ]);
        //id-10
        SubMasuta::insert([
            'masuta_id' => '3',
            // 'code' => '1',
            'name' => 'Permohonan',
        ]);
        //id-11
        SubMasuta::insert([
            'masuta_id' => '3',
            // 'code' => '1',
            'name' => 'Rapat',
        ]);
        //id-12
        SubMasuta::insert([
            'masuta_id' => '3',
            // 'code' => '1',
            'name' => 'Data Perusahaan',
        ]);
        //id-13
        SubMasuta::insert([
            'masuta_id' => '3',
            // 'code' => '1',
            'name' => 'Lain-Lain',
        ]);

        //mas 1 - submas 1
        SubSubMasuta::insert([
            'masuta_id' => '1',
            'sub_masuta_id' => '1',
            // 'code' => '1',
            'name' => 'Perjalanan Dinas',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '1',
            'sub_masuta_id' => '1',
            // 'code' => '1',
            'name' => 'Surat Tugas',
        ]);
        //mas 1 - submas2
        SubSubMasuta::insert([
            'masuta_id' => '1',
            'sub_masuta_id' => '2',
            // 'code' => '1',
            'name' => 'Presensi Pegawai',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '1',
            'sub_masuta_id' => '2',
            // 'code' => '1',
            'name' => 'Surat Keputusan',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '1',
            'sub_masuta_id' => '2',
            // 'code' => '1',
            'name' => 'Tata Tertib Perusahaan',
        ]);
        //mas1 - submas3
        SubSubMasuta::insert([
            'masuta_id' => '1',
            'sub_masuta_id' => '3',
            // 'code' => '1',
            'name' => 'Izin Sakit',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '1',
            'sub_masuta_id' => '3',
            // 'code' => '1',
            'name' => 'Izin Cuti',
        ]);
        //mas2 - submas1
        SubSubMasuta::insert([
            'masuta_id' => '2',
            'sub_masuta_id' => '4',
            // 'code' => '1',
            'name' => 'Kwitansi',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '2',
            'sub_masuta_id' => '4',
            // 'code' => '1',
            'name' => 'Nota',
        ]);
        //mas2 - submas2
        SubSubMasuta::insert([
            'masuta_id' => '2',
            'sub_masuta_id' => '5',
            // 'code' => '1',
            'name' => 'Laporan Neraca',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '2',
            'sub_masuta_id' => '5',
            // 'code' => '1',
            'name' => 'Laporan Laba/Rugi',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '2',
            'sub_masuta_id' => '5',
            // 'code' => '1',
            'name' => 'Laporan Penjualan',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '2',
            'sub_masuta_id' => '5',
            // 'code' => '1',
            'name' => 'Laporan Arus Kas',
        ]);
        //mas2 - submas3
        SubSubMasuta::insert([
            'masuta_id' => '2',
            'sub_masuta_id' => '6',
            // 'code' => '1',
            'name' => 'PKB',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '2',
            'sub_masuta_id' => '6',
            // 'code' => '1',
            'name' => 'PBB',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '2',
            'sub_masuta_id' => '6',
            // 'code' => '1',
            'name' => 'PPH',
        ]);
        //mas2 - submas4
        SubSubMasuta::insert([
            'masuta_id' => '2',
            'sub_masuta_id' => '7',
            // 'code' => '1',
            'name' => 'Pembelian',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '2',
            'sub_masuta_id' => '7',
            // 'code' => '1',
            'name' => 'Perbaikan',
        ]);
        //mas3-submas1
        SubSubMasuta::insert([
            'masuta_id' => '3',
            'sub_masuta_id' => '8',
            // 'code' => '1',
            'name' => 'Undangan Rapat',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '3',
            'sub_masuta_id' => '8',
            // 'code' => '1',
            'name' => 'Undangan Pelatihan',
        ]);
        //mas3-submas2
        SubSubMasuta::insert([
            'masuta_id' => '3',
            'sub_masuta_id' => '9',
            // 'code' => '1',
            'name' => 'MOU',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '3',
            'sub_masuta_id' => '9',
            // 'code' => '1',
            'name' => 'Kontrak Kerja',
        ]);
        //mas3-submas3
        SubSubMasuta::insert([
            'masuta_id' => '3',
            'sub_masuta_id' => '10',
            // 'code' => '1',
            'name' => 'Pengajuan Proposal',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '3',
            'sub_masuta_id' => '10',
            // 'code' => '1',
            'name' => 'Pengadaan Barang',
        ]);
        //mas3-submas4
        SubSubMasuta::insert([
            'masuta_id' => '3',
            'sub_masuta_id' => '11',
            // 'code' => '1',
            'name' => 'Daftar Hadir Peserta',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '3',
            'sub_masuta_id' => '11',
            // 'code' => '1',
            'name' => 'Susunan Acara',
        ]);
        //mas3-submas5
        SubSubMasuta::insert([
            'masuta_id' => '3',
            'sub_masuta_id' => '12',
            // 'code' => '1',
            'name' => 'Akta Pendirian',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '3',
            'sub_masuta_id' => '12',
            // 'code' => '1',
            'name' => 'TDP',
        ]);
        //mas3-submas6
        SubSubMasuta::insert([
            'masuta_id' => '3',
            'sub_masuta_id' => '13',
            // 'code' => '1',
            'name' => 'LPT',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '3',
            'sub_masuta_id' => '13',
            // 'code' => '1',
            'name' => 'Buku Tamu',
        ]);
        SubSubMasuta::insert([
            'masuta_id' => '3',
            'sub_masuta_id' => '13',
            // 'code' => '1',
            'name' => 'Lain - lain',
        ]);
    }
}
