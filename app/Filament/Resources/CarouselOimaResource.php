<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarouselOimaResource\Pages;
use App\Filament\Resources\CarouselOimaResource\RelationManagers;
use App\Models\CarouselOima;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarouselOimaResource extends Resource
{
    protected static ?string $model = CarouselOima::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'OIMA';

    protected static ?string $navigationLabel = 'Carousel Oima';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\FileUpload::make('image')
                ->required()
                ->disk('public')
                ->directory('uploads/carousel_banner'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')
                ->searchable(),
            Tables\Columns\ImageColumn::make('image')
           
          
        ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListCarouselOimas::route('/'),
            'create' => Pages\CreateCarouselOima::route('/create'),
            'edit' => Pages\EditCarouselOima::route('/{record}/edit'),
        ];
    }
}
