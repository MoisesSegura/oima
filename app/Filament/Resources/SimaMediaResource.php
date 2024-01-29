<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SimaMediaResource\Pages;
use App\Filament\Resources\SimaMediaResource\RelationManagers;
use App\Models\SimaMedia;
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

class SimaMediaResource extends Resource
{


    protected static ?string $model = SimaMedia::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $navigationLabel = 'Virtual Courses';

    protected static ?string $modelLabel = 'Virtual Courses';


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

            Forms\Components\DatePicker::make('date')->required(),
            Forms\Components\FileUpload::make('image')->required()
            ->image()
            ->disk('public')
            ->directory('uploads/simaMedia'),
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
            RelationManagers\SimaMediaContentRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSimaMedia::route('/'),
            'create' => Pages\CreateSimaMedia::route('/create'),
            'view' => Pages\ViewSimaMedia::route('/{record}'),
            'edit' => Pages\EditSimaMedia::route('/{record}/edit'),
        ];
    }    
}
