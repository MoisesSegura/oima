<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class Presentation extends Model implements TranslatableContract
{
    use HasFactory;

    use Translatable;

    protected $table = 'presentation';

    protected $guarded = [];

    public $translatedAttributes = ['title','file_real','file_real_name','delete_file'];
}
