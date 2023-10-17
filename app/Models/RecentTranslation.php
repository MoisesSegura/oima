<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentTranslation extends Model
{
    use HasFactory;

    protected $table = 'recent_translation';
    protected $fillable = ['name'];
    public $timestamps = false;
}
