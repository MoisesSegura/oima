<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpImpLink extends Model
{
    use HasFactory;

    protected $table = 'exp_imp_link';
    public $timestamps = false;

    protected $guarded = [];
}
