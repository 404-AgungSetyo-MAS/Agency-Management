<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Monetary extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'keukategori_id',
        'keusubkategori_id',
        'name',
        'tanggal',
        'nomor',
        'value'
    ];

    public function Keukategori(): BelongsTo
    {
        return $this->belongsTo(Keukategori::class);
    }
    public function Keusubkategori(): BelongsTo
    {
        return $this->belongsTo(Keusubkategori::class);
    }
}
