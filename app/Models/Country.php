<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
// use Astrotomic\Translatable\Translatable; 

class Country extends Model //implements TranslatableContract
{

    protected $table = 'country';
   
    use HasFactory;
    // use Translatable;
    
    protected $guarded = [];

    // public $translatedAttributes = ['name'];

    public function regiontranslation(): BelongsTo
    {
        return $this->belongsTo(RegionTranslation::class, 'region_id');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function flag(): BelongsTo
    {
        return $this->belongsTo(InfoCountry::class, 'flag_id');
    }


    public function organizations()
    {
        return $this->hasMany(Organization::class, 'country_id');
    }

    public function persons()
    {
        return $this->hasMany(Person::class, 'country_id');
    }
}
