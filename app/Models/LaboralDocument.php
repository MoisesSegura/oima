<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class LaboralDocument extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'laboral_document';

    protected $guarded = [];

    public $translatedAttributes = ['title','file_real','file_real_name','delete_file'];

    public function regiontranslation(): BelongsTo
    {
        return $this->belongsTo(RegionTranslation::class, 'region_id');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
