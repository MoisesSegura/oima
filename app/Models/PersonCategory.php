<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class PersonCategory extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'category';

    public $timestamps = false;

    public $translatedAttributes = ['name'];

    public function personcategory(): HasMany
    {
        return $this->hasMany(Person::class, 'category_id');
    }

    public function persontranslation(): HasMany
    {
        return $this->hasMany(PersonTranslation::class, 'category_id');
    }

}
