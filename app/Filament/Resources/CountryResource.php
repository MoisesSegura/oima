<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CountryResource\Pages;
use App\Filament\Resources\CountryResource\RelationManagers;
use App\Models\Country;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Select;

use App\Models\CountryTranslation;
use Filament\Forms\Components\Tabs;
use Filament\Resources\Pages\ListRecords\Tab;
use App\Models\Region;
use App\Models\InfoCountry;

use App\Filament\Traits\Translatable;
use Filament\Tables\Filters\SelectFilter;

class CountryResource extends Resource
{

    use translatable;

    protected static ?string $model = Country::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-americas';

    protected static ?string $navigationGroup = 'Regions & Countries';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
           
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make()
                        ->schema([

                            Forms\Components\TextInput::make('name')
                            ->required(),

                            Forms\Components\Select::make('region_id')
                            ->label('Region')
                            ->options(Region::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                            
                            Forms\Components\Select::make('flag_id')
                            ->label('Flag')
                            ->options(InfoCountry::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        ])
                ])

        ])
        ->columns([
            'sm' => '3',
            'lg' => '2',
        ]);
       
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->searchable(),
                Tables\Columns\TextColumn::make('region.name')
                ->sortable(),
      
            ])
            ->filters([
                //   SelectFilter::make('Region') 
                // ->relationship('regiontranslation', 'name')
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCountries::route('/'),
            'create' => Pages\CreateCountry::route('/create'),
            'view' => Pages\ViewCountry::route('/{record}'),
            'edit' => Pages\EditCountry::route('/{record}/edit'),
        ];
    } 
    
    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['region']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name','region.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        /** @var Post $record */
        $details = [];

        if ($record->region) {
            $details['Region'] = $record->region->name;
        }


        return $details;
    }
}
