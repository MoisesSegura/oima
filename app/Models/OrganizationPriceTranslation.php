<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationPriceTranslation extends Model
{
    use HasFactory;
    protected $table = 'organization_price_translation';
    public $timestamps = false;
}
