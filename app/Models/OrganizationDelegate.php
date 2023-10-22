<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrganizationDelegate extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'organization_delegate';

    protected $guarded = [];

    public $translatedAttributes = ['title'];

    public $timestamps = false;

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
