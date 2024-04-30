<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryAsset extends Model
{
    use HasFactory;
    protected $fillable = [
        'img',
        'asset_clasification_id',
        'asset_type_id',
        'asset_sub_type_id',
        'asset_location_id',
        'tgl',
        'nama',
        'qty',
        'description',
        'status'
    ];

    public function assetClasification(): BelongsTo
    {
        return $this->belongsTo(AssetClasification::class);
    }
    public function assetType(): BelongsTo
    {
        return $this->belongsTo(AssetType::class);
    }
    public function assetSubType(): BelongsTo
    {
        return $this->belongsTo(AssetSubType::class);
    }
    public function assetLocation(): BelongsTo
    {
        return $this->belongsTo(AssetLocation::class);
    }
}
