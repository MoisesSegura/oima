<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductTranslation extends Model
{
    use HasFactory;

    protected $table = 'product_translation';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function categorytranslation(): BelongsTo
    {
        return $this->belongsTo(CategoryTranslation::class, 'category_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }





}
