<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGalleryTranslation extends Model
{
    use HasFactory;
    protected $table = 'product_detail_gallery_translation';
    public $timestamps = false;
}
