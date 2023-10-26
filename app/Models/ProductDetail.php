<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Database\Eloquent\Relations;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class ProductDetail extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'product_detail';
    public $timestamps = false;

    protected $guarded = [];

    public $translatedAttributes = ['title','shape','color','flavor','national_production'];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function producttranslation(): BelongsTo
    {
        return $this->belongsTo(ProductTranslation::class, 'product_id');
    }

    //----------------- REPEATERS ---------------- 

    public function bibliography()
    {
        return $this->belongsTo(Bibliography::class);
    }

    public function commercialChain()
    {
        return $this->belongsTo(CommercialChain::class);
    }

    public function ImpRequirement()
    {
        return $this->belongsTo(ImpRequirement::class,'requirement_id');
    }

    public function ImpExpContent()
    {
        return $this->belongsTo(ExpImpContent::class);
    }

 //----------------- RELATION MANAGERS ---------------- 
    public function sales()
    {
        return $this->hasMany(Sell::class);
    }

    public function graphics()
    {
        return $this->hasMany(ProductGraphic::class);
    }

    public function agronomics()
    {
        return $this->hasMany(AgronomicInformation::class);
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }

    public function nutritionalProperty()
    {
        return $this->hasMany(NutritionalProperty::class);
    }

    public function nutritionalPropertyValue()
    {
        return $this->hasMany(NutritionalPropertyValue::class);
    }


    public function nutritionalContent()
    {
        return $this->hasMany(NutritionalContent::class);
    }







 
}
