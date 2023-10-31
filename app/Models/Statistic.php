<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class Statistic extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'statistic';
    public $timestamps = false;

    protected $guarded = [];

    public $translatedAttributes = ['text'];
}
