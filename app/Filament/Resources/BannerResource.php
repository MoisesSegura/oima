<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\BannerCategory;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'OIMA';
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\FileUpload::make('image')
            ->required()
            ->disk('public')
            ->directory('uploads/banners'),

                Forms\Components\Select::make('category_id')
                ->label('BannerCategory')
                ->options(BannerCategory::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),

        ])
        ->columns([
            'sm' => '2',
            'lg' => 'full',
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                ->searchable(),

                Tables\Columns\TextColumn::make('BannerCategory.name')
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'view' => Pages\ViewBanner::route('/{record}'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }    
}
