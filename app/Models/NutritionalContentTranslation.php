<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionalContentTranslation extends Model
{
    use HasFactory;
    protected $table = 'nutritional_property_content_translation';
    public $timestamps = false;
}
