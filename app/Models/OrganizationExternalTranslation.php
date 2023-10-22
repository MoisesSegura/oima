<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationExternalTranslation extends Model
{
    use HasFactory;
    protected $table = 'organization_external_translation';
    public $timestamps = false;
}
