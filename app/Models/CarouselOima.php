<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselOima extends Model
{
    use HasFactory;

    protected $table = 'carousel_oima';
    protected $fillable = ['name', 'image'];
}
