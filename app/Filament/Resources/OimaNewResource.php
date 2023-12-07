<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OimaNewResource\Pages;
use App\Filament\Resources\OimaNewResource\RelationManagers;
use App\Models\OimaNew;
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
use Filament\Forms\Components\DateTimePicker;

class OimaNewResource extends Resource
{
    protected static ?string $model = OimaNew::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Blog';


    public static function form(Form $form): Form
    {

        return $form
        ->schema([
            Tabs::make('') 
                ->tabs([
                    Tabs\Tab::make('En') 
                        ->schema([
                        Forms\Components\TextInput::make('en.title'),
                        Forms\Components\RichEditor::make('en.short_description'),
                
                        ]),
                    Tabs\Tab::make('Es')
                        ->schema([
                        Forms\Components\TextInput::make('es.title'),
                        Forms\Components\RichEditor::make('es.short_description'),
                           
                    ]),
                    Tabs\Tab::make('Pt')
                        ->schema([
                        Forms\Components\TextInput::make('pt.title'),
                        Forms\Components\RichEditor::make('pt.short_description'),
                    ]),
                    
                ]),

            Forms\Components\DateTimePicker::make('date')
            ->required(),
            Forms\Components\FileUpload::make('image')
            ->disk('public')
            ->directory('uploads/news')
            ->image(),
            Forms\Components\Toggle::make('delete_image'),
            Forms\Components\TextInput::make('year')
            ->required()
            ->numeric(),


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
                Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->wrap(),
                Tables\Columns\TextColumn::make('date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('year')
                    ->numeric()
                    ->sortable(),
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
            RelationManagers\OimaNewContentRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOimaNews::route('/'),
            'create' => Pages\CreateOimaNew::route('/create'),
            'view' => Pages\ViewOimaNew::route('/{record}'),
            'edit' => Pages\EditOimaNew::route('/{record}/edit'),
        ];
    }    
}
