<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImpRequirement extends Model  implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'exp_imp_requirement';

    protected $guarded = [];

    public $translatedAttributes = ['title','subtitle'];

    public $timestamps = false;

    public function productdetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }

    public function expImpContent()
    {
    return $this->hasMany(ExpImpContent::class,'requirement_id', 'id');
    }

    public function Links()
    {
    return $this->hasMany(ExpImpLink::class,'requirement_id', 'id');
    }
}
