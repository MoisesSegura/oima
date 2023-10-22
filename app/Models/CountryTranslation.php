<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryTranslation extends Model
{
    use HasFactory;
    // protected $table = 'info_country_translation';

    // // protected $fillable = ['name'];
    // public $timestamps = false;

    // public function regiontranslation(): BelongsTo
    // {
    //     return $this->belongsTo(RegionTranslation::class, 'region_id');
    // }

    // public function region(): BelongsTo
    // {
    //     return $this->belongsTo(Region::class, 'region_id');
    // }

    // public function organizations(): HasMany
    // {
    //     return $this->hasMany(Organization::class, 'country_id');
    // }

    // public function persons(): HasMany
    // {
    //     return $this->hasMany(Person::class, 'region_id');
    // }


}
