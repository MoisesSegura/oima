<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class AssistanceType extends Model implements TranslatableContract
{
    use HasFactory;

    use Translatable;

    protected $table = 'assistance_type';

    protected $guarded = [];

    public $translatedAttributes = ['name'];
}
