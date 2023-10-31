<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class SimaMedia extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'sima_media';
    public $timestamps = false;

    protected $guarded = [];

    public $translatedAttributes = ['title','short_description'];


     //------------------RELATION MANAGERS------------------------------

     public function simaMediaContent()
     {
         return $this->hasMany(SimaMediaContent::class);
     }
}
