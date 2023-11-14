<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class Category extends Model  implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'product_category';

    public $timestamps = false;

    public $translatedAttributes = ['name'];

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function producttranslation()
    {
        return $this->hasMany(ProductTranslation::class, 'category_id');
    }

}
