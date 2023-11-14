<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NutritionalProperty extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'nutritional_property';

    protected $guarded = [];

    public $translatedAttributes = ['text','name'];

    public $timestamps = false;

    public function productdetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }

    public function nutritionalPropertyValue()
{
    return $this->hasMany(NutritionalPropertyValue::class, 'nutritional_property_id');
}

}
