<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAssistanceType extends Model
{
    use HasFactory;

    protected $table = 'event_assistance_type';
    public $timestamps = false;

    protected $guarded = [];
}
