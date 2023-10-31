<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class OimaNew extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'oima_new';
    public $timestamps = false;

    protected $guarded = [];

    public $translatedAttributes = ['title','short_description'];


    //------------------RELATION MANAGERS------------------------------

    public function oimaNewContent()
    {
        return $this->hasMany(OimaNewContent::class);
    }
}
