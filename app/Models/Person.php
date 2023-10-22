<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class Person extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'person';
    
    protected $guarded = [];
    public $timestamps = false;

    public $translatedAttributes = ['title','position','description'];

    // public function countrytranslation(): BelongsTo
    // {
    //     return $this->belongsTo(CountryTranslation::class, 'country_id');
    // }

    // public function country(): BelongsTo
    // {
    //     return $this->belongsTo(Country::class, 'country_id');
    // }

    // public function countrytranslation(): BelongsTo
    // {
    //     return $this->belongsTo(InfoCountryTranslation::class, 'country_id');
    // }

    public function infocountry(): BelongsTo
    {
        return $this->belongsTo(InfoCountry::class, 'country_id');
    }


    public function personcategory(): BelongsTo
    {
        return $this->belongsTo(PersonCategory::class, 'category_id');
    }

}
