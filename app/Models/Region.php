<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class Region extends Model  implements TranslatableContract

{
    use HasFactory;
    use Translatable;

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['name','type'];

    protected $guarded = [];


    public function countries(): HasMany
    {
        return $this->hasMany(Country::class, 'region_id');
    }
}
