<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReunionCategoryResource\Pages;
use App\Filament\Resources\ReunionCategoryResource\RelationManagers;
use App\Models\ReunionCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Tabs;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Model; //global search
use App\Filament\Traits\Translatable;

class ReunionCategoryResource extends Resource
{
    protected static ?string $model = ReunionCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'OIMA';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Tabs::make('Mis formularios') 
                ->tabs([
                    Tabs\Tab::make('En') 
                        ->schema([
                            Forms\Components\TextInput::make('en.name')
                            ->maxLength(255) 
                            ->required(),
               
                        ]),
                    Tabs\Tab::make('Es')
                        ->schema([
                            Forms\Components\TextInput::make('es.name')
                            ->maxLength(255)
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
            'lg' => 'full',
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
            'index' => Pages\ListReunionCategories::route('/'),
            'create' => Pages\CreateReunionCategory::route('/create'),
            'view' => Pages\ViewReunionCategory::route('/{record}'),
            'edit' => Pages\EditReunionCategory::route('/{record}/edit'),
        ];
    }    
}
