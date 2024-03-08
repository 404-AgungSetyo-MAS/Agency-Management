<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        "img" => "array",
    ];
}
