<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CategoryTranslation extends Model
{
    use HasFactory;
    // protected $table = 'product_category_translations';
    protected $table = 'product_category_translation';

    protected $fillable = ['name'];
    public $timestamps = false;

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function producttranslation()
    {
        return $this->hasMany(ProductTranslation::class, 'category_id');
    }

 
    
}
