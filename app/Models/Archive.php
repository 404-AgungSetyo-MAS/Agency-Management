<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'masuta_id',
        'sub_masuta_id',
        'sub_sub_masuta_id',
        'nama',
        'file',
    ];

    public function masuta(): BelongsTo
    {
        return $this->belongsTo(Masuta::class);
    }
    public function subMasuta(): BelongsTo
    {
        return $this->belongsTo(SubMasuta::class);
    }
    public function subSubMasuta(): BelongsTo
    {
        return $this->belongsTo(SubSubMasuta::class);
    }

    // public function subMasuta(): HasMany
    // {
    //     return $this->hasMany(SubMasuta::class);
    // }
    // public function subSubMasuta(): HasMany
    // {
    //     return $this->hasMany(SubSubMasuta::class);
    // }
}
