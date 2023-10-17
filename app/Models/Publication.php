<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class Publication extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'publication';

    protected $guarded = [];

    public $translatedAttributes = ['title','description','file_real','file_real_name','image'];


}
