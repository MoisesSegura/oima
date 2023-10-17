<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresentationTranslation extends Model
{
    use HasFactory;
    protected $table = 'presentation_translation';
    public $timestamps = false;
}
