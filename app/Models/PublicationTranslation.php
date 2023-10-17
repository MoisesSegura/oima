<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationTranslation extends Model
{
    use HasFactory;

    protected $table = 'publication_translation';
    public $timestamps = false;
}
