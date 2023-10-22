<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Organization extends Model
{
    protected $table = 'organization';
    use HasFactory;
    protected $guarded = [];

    public function countrytranslation(): BelongsTo
    {
        return $this->belongsTo(CountryTranslation::class, 'country_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    //relation managers

    public function delegates()
    {
        return $this->hasMany(OrganizationDelegate::class);
    }

    public function prices()
    {
        return $this->hasMany(OrganizationPrice::class);
    }

    public function externals()
    {
        return $this->hasMany(OrganizationExternal::class);
    }


}
