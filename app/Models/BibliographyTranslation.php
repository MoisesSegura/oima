<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BibliographyTranslation extends Model
{
    use HasFactory;
    protected $table = 'bibliography_translation';
    public $timestamps = false;
}
