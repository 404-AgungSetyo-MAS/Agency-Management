<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubMasuta extends Model
{
    use HasFactory;
    protected $fillable = [
        'masuta_id',
        'code',
        'name',
    ];

    public function masuta(): BelongsTo
    {
        return $this->belongsTo(Masuta::class);
    }
}
