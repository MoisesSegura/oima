<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssistanceTypeTranslation extends Model
{
    use HasFactory;
    protected $table = 'assistance_type_translation';
    public $timestamps = false;
}
