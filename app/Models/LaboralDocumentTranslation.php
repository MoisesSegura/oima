<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboralDocumentTranslation extends Model
{
    use HasFactory;

    protected $table = 'laboral_document_translation';
    public $timestamps = false;

    public function regiontranslation(): BelongsTo
    {
        return $this->belongsTo(RegionTranslation::class, 'region_id');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
