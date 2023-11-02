<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class WorkPrinciple extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'work_principle';
    public $timestamps = false;

    protected $guarded = [];

    public $translatedAttributes = ['text'];

    public function oima()
    {
        return $this->belongsTo(Oima::class, 'oima_id');
    }
}
