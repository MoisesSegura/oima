<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class Achievement extends Model  implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'achievement';
    public $timestamps = false;

    protected $guarded = [];

    public $translatedAttributes = ['text'];
}
