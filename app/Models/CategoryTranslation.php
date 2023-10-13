<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class CategoryTranslation extends Model
{
    use HasFactory;
    protected $table = 'product_category_translations';

    protected $fillable = ['name'];
    public $timestamps = false;

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    
}
