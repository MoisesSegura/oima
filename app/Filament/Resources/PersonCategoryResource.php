<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonCategoryResource\Pages;
use App\Filament\Resources\PersonCategoryResource\RelationManagers;
use App\Models\PersonCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Tabs;
use Filament\Resources\Pages\ListRecords\Tab;
use App\Filament\Traits\Translatable;

class PersonCategoryResource extends Resource
{
    protected static ?string $model = PersonCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Who we are';

    protected static ?string $navigationLabel = 'Categories';

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
            'index' => Pages\ListPersonCategories::route('/'),
            'create' => Pages\CreatePersonCategory::route('/create'),
            'view' => Pages\ViewPersonCategory::route('/{record}'),
            'edit' => Pages\EditPersonCategory::route('/{record}/edit'),
        ];
    }    
}
