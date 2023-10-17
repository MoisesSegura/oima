<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Region;

class RegionTranslation extends Model
{
    use HasFactory;
    protected $table = 'region_translation';
    public $timestamps = false;

    protected $fillable = ['name', 'type'];

    public function countries(): HasMany
    {
        return $this->hasMany(Country::class, 'region_id');
    }
    
    public function laboraldocuments(): HasMany
    {
        return $this->hasMany(LaboralDocument::class, 'region_id');
    }
}
