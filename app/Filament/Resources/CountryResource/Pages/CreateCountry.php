<?php

namespace App\Filament\Resources\CountryResource\Pages;

use App\Filament\Resources\CountryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use App\Filament\Traits\Translatable;

class CreateCountry extends CreateRecord
{

    protected static string $resource = CountryResource::class;

}
