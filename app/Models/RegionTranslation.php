<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Region;

class RegionTranslation extends Model
{
    use HasFactory;
    protected $table = 'region_translations';

    protected $fillable = ['name', 'type'];
    public $timestamps = false;

    public function countries(): HasMany
    {
        return $this->hasMany(Country::class, 'region_id');
    }
    
}
