<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDuration extends Model
{
    use HasFactory;

    protected $table = 'event_duration';
    public $timestamps = false;

    protected $guarded = [];
}
