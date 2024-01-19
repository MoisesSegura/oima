<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Extra extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'executive_commitee';
    public $timestamps = false;

    protected $guarded = [];

    public $translatedAttributes = ['document_repository','catalog','catalog_description','contact_sended', 'more_information', 'publications','presentations',
    'laboral_documents','dictionary','meetings','videos','procedure_norms'];
}
