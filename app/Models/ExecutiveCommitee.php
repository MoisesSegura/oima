<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class ExecutiveCommitee extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'executive_commitee';
    public $timestamps = false;

    protected $guarded = [];

    public $translatedAttributes = ['title','description'];
}
