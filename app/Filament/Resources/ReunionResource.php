<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReunionResource\Pages;
use App\Filament\Resources\ReunionResource\RelationManagers;
use App\Models\Reunion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Resources\Pages\ListRecords\Tab;
use App\Filament\Traits\Translatable;
use App\Models\ReunionCategory;

class ReunionResource extends Resource
{
    protected static ?string $model = Reunion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'OIMA';

    protected static ?string $navigationLabel = 'Metting';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('author')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('place')
                    ->required()
                    ->maxLength(500),

                    Forms\Components\Select::make('category_id')
                    ->label('ReunionCategory')
                    ->options(ReunionCategory::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                    
                    
                    Tabs::make('lang form') 
                    ->tabs([
                        Tabs\Tab::make('En') 
                            ->schema([
    
                                Forms\Components\TextInput::make('en.title')
                                ->required()
                                ->maxLength(255),
    
                                Forms\Components\FileUpload::make('en.file_real')
                                ->label('file')
                                ->required(),
    
                   
                            ]),
                        Tabs\Tab::make('Es')
                            ->schema([
                                Forms\Components\TextInput::make('es.title')
                                ->required()
                                ->maxLength(255),
    
                                Forms\Components\FileUpload::make('es.file_real')
                                ->label('file')
                                ->required(),
    
                               
                        ]),
                        Tabs\Tab::make('Pt')
                            ->schema([
                                Forms\Components\TextInput::make('pt.title')
                                ->required()
                                ->maxLength(255),
    
                                Forms\Components\FileUpload::make('pt.file_real')
                                ->label('file')
                                ->required(),
    
                        ]),
                        
                    ]),
    
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
                Tables\Columns\TextColumn::make('title')
                ->searchable(),
                Tables\Columns\TextColumn::make('author')
                    ->searchable(),
                Tables\Columns\TextColumn::make('place')
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
            'index' => Pages\ListReunions::route('/'),
            'create' => Pages\CreateReunion::route('/create'),
            'view' => Pages\ViewReunion::route('/{record}'),
            'edit' => Pages\EditReunion::route('/{record}/edit'),
        ];
    }    
}
