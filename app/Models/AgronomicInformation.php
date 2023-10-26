<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgronomicInformation extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'agronomic_information';

    protected $guarded = [];

    public $translatedAttributes = ['title','text'];

    public $timestamps = false;

    public function productdetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }
}
