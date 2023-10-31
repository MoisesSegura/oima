<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'event';
    public $timestamps = false;

    protected $guarded = [];

    public $translatedAttributes = ['general_objective','description','address','name','duration'];


    //------------------RELATION MANAGERS------------------------------
    


    public function eventDuration()
    {
        return $this->HasMany(EventDuration::class);
    }


    public function eventSchedule()
    {
        return $this->HasMany(EventSchedule::class);
    }

    //-----------------------------------------------------------------------


    public function assistanceTypes()
    {
        return $this->belongsToMany(AssistanceType::class, 'event_assistance_type', 'event_id', 'assistance_type_id');
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'event_event_language', 'event_id', 'event_language_id');
    }

    
}
