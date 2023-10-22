<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'person_translation';

    public function countrytranslation(): BelongsTo
    {
        return $this->belongsTo(InfoCountryTranslation::class, 'country_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(InfoCountry::class, 'country_id');
    }
}
