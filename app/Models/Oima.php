<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class Oima extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'oima';
    public $timestamps = false;

    protected $guarded = [];

    public $translatedAttributes = ['title','description','mision','vision'];

    public function workPrinciples()
    {
        return $this->hasMany(WorkPrinciple::class, 'oima_id');
    }
}
