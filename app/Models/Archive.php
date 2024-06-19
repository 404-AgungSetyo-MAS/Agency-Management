<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'masuta_id',
        'masuta_nama',
        'sub_masuta_id',
        'sub_masuta_nama',
        'sub_sub_masuta_id',
        'sub_sub_masuta_nama',
        'nama',
        'statusdoc_id',
        'detil_status',
        'keterangan_status',
        'file',
    ];


    protected $casts =[
        'file' => 'array'
    ];

    protected static function booted():void
    {
        static::deleted(function (Archive $dokumen) {
            if($dokumen->file !== null) {
                Storage::disk('public')->delete($dokumen->file);
            }
        });
        static::updating(function (Archive $dokumen) {
            $filesToDelete = $dokumen->getOriginal('file');
            if($dokumen->file !== $filesToDelete) {
                Storage::disk('public')->delete($dokumen);
            }
        });
    }
    // public function masuta(): BelongsTo
    // {
    //     return $this->belongsTo(Masuta::class);
    //     // return $this->belongsTo(Masuta::class)->select(array('id', 'name'));
    // }
    public function subMasuta(): BelongsTo
    {
        // return $this->belongsTo(SubMasuta::class);
        return $this->belongsTo(SubMasuta::class)->select(array('id', 'code'));
    }
    public function subSubMasuta(): BelongsTo
    {
        // return $this->belongsTo(SubSubMasuta::class);
        return $this->belongsTo(SubSubMasuta::class)->select(array('id', 'code'));
    }
    public function statusdoc(): BelongsTo
    {
        return $this->belongsTo(Statusdoc::class);
    }

    // protected $table = 'archive';
    // public function subMasutaCode()
    // {
    //     return $this->join('sub_masuta', 'archive.sub_masuta_id', '=','sub_masuta.id')
    //                 -> select('sub_masuta.code');
    // }


    public function masuta(): HasMany
    {
        return $this->hasMany(Masuta::class, 'id', 'masuta_id');
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
