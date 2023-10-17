<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class ProcedureNorm extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'procedure_norm';

    protected $guarded = [];

    public $translatedAttributes = ['name','file_real'];
}
