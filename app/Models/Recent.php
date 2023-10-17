<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class Recent extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'recent';
    public $timestamps = false;

    protected $guarded = [];

    public $translatedAttributes = ['name','file_real','file_real_name',];
}
