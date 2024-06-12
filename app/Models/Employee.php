<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Employee extends Model
{
    use HasFactory;

    protected $casts = [
        "img" => "array",
    ];
    protected $fillable = [
        "img",
        "nama_lengkap",
        "tempat_lahir",
        "tgl_lahir",
        "jenis_kelamin",
        "agama",
        "nomor_telepon",
        "email",
    ];


    protected static function booted():void
    {
        static::deleted(function (Employee $pegawai) {
            if ($pegawai->img !== null){
                Storage::disk('pegawai')->delete($pegawai->img);
            }
        });
        static::updating(function (Employee $pegawai) {

            $filesToDelete = $pegawai->getOriginal('img');
            if ($pegawai->img !== $filesToDelete){
                Storage::disk('pegawai')->delete($filesToDelete);
            }
        });
    }
}
