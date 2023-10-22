<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class InfoCountry extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    
    protected $table = 'info_country';
    
    protected $guarded = [];

    public $translatedAttributes = ['name'];
    public $timestamps = false;

    public function persons(): HasMany
    {
        return $this->hasMany(Person::class, 'country_id');
    }
}
