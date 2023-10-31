<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievementTranslation extends Model
{
    use HasFactory;
    protected $table = 'achievement_translation';
    public $timestamps = false;
}
