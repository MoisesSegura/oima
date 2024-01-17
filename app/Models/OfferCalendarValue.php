<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferCalendarValue extends Model
{
    use HasFactory;

    protected $table = 'product_detail_offer_calendar_value';
    public $timestamps = false;

    public function offerCalendar()
    {
        return $this->belongsTo(OfferCalendar::class, 'product_detail_offer_calendar_id');
    }

}
