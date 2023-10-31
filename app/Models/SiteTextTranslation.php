<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteTextTranslation extends Model
{
    use HasFactory;
    protected $table = 'site_text_translation';
    public $timestamps = false;
}
