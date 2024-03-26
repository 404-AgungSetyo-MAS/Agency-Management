<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubMasuta extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_masuta_id',
        'masuta_id',
        'code',
        'name',
    ];

    public function subMasuta()
    {
        return $this->belongsTo(SubMasuta::class);
    }

    public function masuta()
    {
        return $this->belongsTo(Masuta::class);
    }
}
