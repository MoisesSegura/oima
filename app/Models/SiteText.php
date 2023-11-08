<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 

class SiteText extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'site_text';
    public $timestamps = false;

    protected $guarded = [];

    public $translatedAttributes = ['catalog_title','catalog_subtitle','catalog_description','banner_title','banner_subtitle',
    'know_oima_title','know_oima_description', 'oima_purpose'];


//----------------- REPEATERS ---------------- 

  public function history()
  {
      return $this->belongsTo(History::class);
  }

  public function executiveCommitee()
  {
      return $this->belongsTo(ExecutiveCommitee::class);
  }

  public function extra()
  {
      return $this->belongsTo(Extra::class);
  }

  public function oima()
  {
      return $this->belongsTo(Oima::class);
  }




//----------------- RELATION MANAGERS ---------------- 

    public function Achievements()
    {
        return $this->hasMany(Achievement::class);
    }

    public function Statistics()
    {
        return $this->hasMany(Statistic::class);
    }

    public function workPrinciple()
    {
        return $this->hasMany(WorkPrinciple::class, 'oima_id', 'oima_id');
    }



}
