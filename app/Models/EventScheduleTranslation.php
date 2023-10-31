<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventScheduleTranslation extends Model
{
    use HasFactory;
    protected $table = 'event_schedule_translation';
    public $timestamps = false;
}
