<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class Product extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'products';

    protected $guarded = [];

    public $translatedAttributes = ['name','file_real','file_real_name',];



    public function categorytranslation(): BelongsTo
    {
        return $this->belongsTo(CategoryTranslation::class, 'category_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }




}
