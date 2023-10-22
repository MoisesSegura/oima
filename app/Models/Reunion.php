<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class Reunion extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'reunion';
    public $timestamps = false;

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['title','file_real','file_real_name','delete_file'];

    protected $guarded = [];
}
