<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class SimaMediaContent extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'sima_media_content';
    public $timestamps = false;

    protected $guarded = [];

    public $translatedAttributes = ['subtitle','text','video_description'];
}
