<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrganizationExternal extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'organization_external';

    protected $guarded = [];

    public $translatedAttributes = ['name','url'];

    public $timestamps = false;

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
