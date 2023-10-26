<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExpImpContent extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'exp_imp_content';

    protected $guarded = [];

    public $translatedAttributes = ['title','text'];

    public $timestamps = false;

    public function productdetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }

    public function ExpImpRequirement()
    {
        return $this->belongsTo(ImpRequirement::class, 'requirement_id');
    }


}
