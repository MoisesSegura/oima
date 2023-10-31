<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraTranslation extends Model
{
    use HasFactory;
    protected $table = 'extra_translation';
    public $timestamps = false;
}
