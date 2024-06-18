<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class InventoryAsset extends Model
{
    use HasFactory;
    protected $fillable = [
        'img',
        'asset_clasification_id',
        'asset_type_id',
        'asset_sub_type_id',
        'asset_location_id',
        'tanggal',
        'nama',
        'description',
        'statusaset_id',
    ];

    protected $casts =[
        'img' => 'array'
    ];

    protected static function booted():void
    {
        static::deleted(function (InventoryAsset $aset) {
            foreach($aset->img as $image) {
                Storage::disk('public')->delete($image);
            }
        });
        static::updating(function (InventoryAsset $aset) {

            $filesToDelete = array_diff($aset->getOriginal('img'), $aset->img);
            foreach($filesToDelete as $file) {
                Storage::disk('public')->delete($file);
            }
        });
    }

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
    public function statusaset(): BelongsTo
    {
        return $this->belongsTo(Statusaset::class);
    }
}
