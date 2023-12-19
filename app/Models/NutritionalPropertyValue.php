<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NutritionalPropertyValue extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'nutritional_property_value';

    protected $guarded = [];

    public $translatedAttributes = ['name'];

    public $timestamps = false;

    public function nutritionalProperty()
    {
        return $this->belongsTo(NutritionalProperty::class,'nutritional_property_id');
    }
    
    
}
