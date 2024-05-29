<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Employee extends Model
{
    use HasFactory;

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

    protected $casts = [
        "img" => "json",
    ];

    protected static function booted():void
    {
        static::deleted(function (Employee $pegawai) {
            foreach($pegawai->img as $image) {
                Storage::delete($image);
            }
        });
        static::updating(function (Employee $pegawai) {

            $filesToDelete = array_diff($pegawai->getOriginal('img'), $pegawai->img);

            foreach($filesToDelete as $file) {
                Storage::delete($file);
            }
        });
    }
}
