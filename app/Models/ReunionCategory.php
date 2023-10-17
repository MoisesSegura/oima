<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class ReunionCategory extends Model implements TranslatableContract
{
    use HasFactory;

    use Translatable;

    protected $table = 'reunion_category';
    public $timestamps = false;

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['name'];

    protected $guarded = [];
}
