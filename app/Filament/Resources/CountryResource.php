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

use App\Filament\Traits\Translatable;

class CountryResource extends Resource
{

    use translatable;

    protected static ?string $model = Country::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-americas';

    protected static ?string $navigationGroup = 'Countries and Regions';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Tabs::make('Mis formularios') 
                ->tabs([
                    Tabs\Tab::make('En') 
                        ->schema([
                            Forms\Components\TextInput::make('en.name') 
                            ->required(),
               
                        ]),
                    Tabs\Tab::make('Es')
                        ->schema([
                            Forms\Components\TextInput::make('es.name')
                            ->required(),
                           
                    ]),
                    Tabs\Tab::make('Pt')
                        ->schema([
                            Forms\Components\TextInput::make('pt.name')
                            ->required(),
                           
                    ]),
                    
                ]),
                // ->columns('full'), 

            //  el resto de los inputs            
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make()
                        ->schema([
                            Forms\Components\Select::make('region_id')
                                ->relationship('regiontranslation', 'name')
                                ->label('region')
                                ->searchable()
                                ->required(),
                            
                            Forms\Components\TextInput::make('slug')
                            ->required(),
                            
                        ])
                ])

        ])
        ->columns([
            'sm' => '3',
            'lg' => '2',
        ]);
            // ->schema([
            //     Forms\Components\Select::make('region_id')
            //     ->relationship('regiontranslation', 'name')
            //     ->label('region')
            //     ->searchable()
            //     ->required(),
              
            //     Forms\Components\TextInput::make('name')
            //         ->required()
            //         ->maxLength(255),
            // ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('region.name')
                ->sortable()
                ->toggleable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
