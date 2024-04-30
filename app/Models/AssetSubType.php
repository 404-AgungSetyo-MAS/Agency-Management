<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssetSubType extends Model
{
    use HasFactory;
    protected $fillable = [
        'asset_clasification_id',
        'asset_type_id',
        'code',
        'nama'
    ];

    public function assetClasification(): BelongsTo
    {
        return $this->belongsTo(AssetClasification::class);
    }

    public function assetType(): BelongsTo
    {
        return $this->belongsTo(AssetType::class);
    }
}
