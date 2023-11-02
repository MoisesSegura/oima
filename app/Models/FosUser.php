<?php

namespace App\Models;



use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class FosUser extends Model  implements FilamentUser //, HasTenants, MustVerifyEmail
{

    use HasFactory;
    use HasRoles;

    protected $table = 'fos_user_user';
    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

//   /**
//      * @var array<string, string>
//      */
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];

   public function canAccessPanel(Panel $panel): bool
   {
       return true;
   }


}
