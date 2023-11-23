<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetailGraphicValue extends Model
{
    use HasFactory;
    protected $table = 'product_detail_graphic_value';
    public $timestamps = false;

    public function productDetailGraphic()
    {
        return $this->belongsTo(ProductGraphic::class, 'product_detail_graphic_id');
    }
}
