<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function countries(): HasMany
    {
        return $this->hasMany(Country::class, 'region_id');
    }
}
