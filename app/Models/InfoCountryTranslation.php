<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoCountryTranslation extends Model
{
    use HasFactory;

    protected $table = 'info_country_translation';
    public $timestamps = false;

    public function persons(): HasMany
    {
        return $this->hasMany(Person::class, 'country_id');
    }
}
