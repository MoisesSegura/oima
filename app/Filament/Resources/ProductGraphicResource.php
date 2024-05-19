<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductGraphicResource\Pages;
use App\Filament\Resources\ProductGraphicResource\RelationManagers;
use App\Models\ProductGraphic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\Country;

use App\Filament\Resources\Post;


class ProductGraphicResource extends Resource
{
    protected static ?string $model = ProductGraphic::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    // protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationGroup = 'Products by country';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                // Section::make('Product')
                //     ->schema([
                //         Forms\Components\Select::make('country_id')
                //             ->label('Country')
                //             ->options(Country::all()->pluck('name', 'id'))
                //             ->searchable()
                //             ->required(),

                //         Forms\Components\Select::make('product_id')
                //             ->label('Product')
                //             ->options(ProductTranslation::where('locale', app()->getLocale())->pluck('name', 'product_id'))
                //             ->searchable()
                //             ->required(),

                //             Forms\Components\TextInput::make('product_detail_id')
                //             ->maxLength(255),

                //     ]),

                // Tabs::make('lang form')
                //     ->tabs([
                //         Tabs\Tab::make('En')
                //             ->schema([
                //                 Forms\Components\TextInput::make('en.title')
                //                     ->maxLength(255),

                //                 Forms\Components\TextInput::make('en.subtitle')
                //                     ->maxLength(255),

                //             ]),
                //         Tabs\Tab::make('Es')
                //             ->schema([
                //                 Forms\Components\TextInput::make('es.title')
                //                     ->maxLength(255),

                //                 Forms\Components\TextInput::make('es.subtitle')
                //                     ->maxLength(255),

                //             ]),
                //         Tabs\Tab::make('Pt')
                //             ->schema([
                //                 Forms\Components\TextInput::make('pt.title')
                //                     ->maxLength(255),

                //                 Forms\Components\TextInput::make('pt.subtitle')
                //                     ->maxLength(255),

                //             ]),

                //     ]),
                // Forms\Components\TextInput::make('font')
                //     ->maxLength(255),

                // Forms\Components\TextInput::make('font_years')->label('Years Range')
                //     ->maxLength(255),



            ])->Columns('full');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('productdetail.country.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('productdetail.known_name')->label('Known name')
                    ->searchable()
                    ->sortable(),

            ])->description("Para crear un nuevo gráfico debe desplazarse a la pestaña Products by country->Graphics")
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
            RelationManagers\ValuesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductGraphics::route('/'),
            'create' => Pages\CreateProductGraphic::route('/create'),
            'view' => Pages\ViewProductGraphic::route('/{record}'),
            'edit' => Pages\EditProductGraphic::route('/{record}/edit'),
        ];
    }
}
