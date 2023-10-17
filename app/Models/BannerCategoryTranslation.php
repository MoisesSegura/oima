<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerCategoryTranslation extends Model
{
    use HasFactory;

    protected $table = 'banner_category_translation';

    public $timestamps = false;
}
