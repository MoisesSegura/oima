<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegionResource\Pages;
use App\Filament\Resources\RegionResource\RelationManagers;
use App\Models\Region;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\RegionTranslation;
use Filament\Forms\Components\Tabs;
use Filament\Resources\Pages\ListRecords\Tab;

use App\Filament\Traits\Translatable;

class RegionResource extends Resource
{
    protected static ?string $model = Region::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

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

                            Forms\Components\TextInput::make('type')
                            ->required()
                            ->maxLength(255),
                            Forms\Components\TextInput::make('slug')
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
                Tables\Columns\TextColumn::make('type')
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
            'index' => Pages\ListRegions::route('/'),
            'create' => Pages\CreateRegion::route('/create'),
            'view' => Pages\ViewRegion::route('/{record}'),
            'edit' => Pages\EditRegion::route('/{record}/edit'),
        ];
    }    
}
