<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keusubkategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'keukategori_id',
        'nama'
    ];

    public function keukategori(): BelongsTo
    {
        return $this->belongsTo(Keukategori::class);
    }
}