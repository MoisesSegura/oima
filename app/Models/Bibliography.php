<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bibliography extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'bibliography';

    protected $guarded = [];

    public $translatedAttributes = ['text'];

    public $timestamps = false;

  
}
  // public function productdetail()
    // {
    //     return $this->belongsTo(ProductDetail::class);
    // }