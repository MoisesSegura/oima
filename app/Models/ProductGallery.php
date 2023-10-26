<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductGallery extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'product_detail_gallery';

    protected $guarded = [];

    public $translatedAttributes = ['title'];

    public $timestamps = false;

    public function productdetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }
}
