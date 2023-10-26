<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionalPropertyTranslation extends Model
{
    use HasFactory;
    protected $table = 'nutritional_property_translation';
    public $timestamps = false;
}
