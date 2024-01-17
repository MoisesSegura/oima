<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 
class OfferCalendar extends Model  implements TranslatableContract
{
    use Translatable;
    use HasFactory;

    protected $table = 'product_detail_offer_calendar';

    public $translatedAttributes = ['title','subtitle','texto'];

    public $timestamps = false;

    public function productdetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }
}
