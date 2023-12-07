<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PresentationResource\Pages;
use App\Filament\Resources\PresentationResource\RelationManagers;
use App\Models\Presentation;
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
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\Model; //global search
use App\Filament\Traits\Translatable;

class PresentationResource extends Resource
{
    protected static ?string $model = Presentation::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?string $navigationGroup = 'OIMA';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('author')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('uploads/presentations')
                    ->required(),

                Tabs::make('lang form') 
                ->tabs([
                    Tabs\Tab::make('En') 
                        ->schema([

                            Forms\Components\TextInput::make('en.title')
                            ->maxLength(255),

                            Forms\Components\FileUpload::make('en.file_real')
                            ->label('File')
                            ->disk('public')
                            ->directory('uploads/files/presentations')
                            ->required(),
               
                        ]),
                    Tabs\Tab::make('Es')
                        ->schema([
                            Forms\Components\TextInput::make('es.title')
                            ->maxLength(255),

                            Forms\Components\FileUpload::make('es.file_real')
                            ->label('File')
                            ->disk('public')
                            ->directory('uploads/files/presentations')
                            ->required(),

                           
                    ]),
                    Tabs\Tab::make('Pt')
                        ->schema([
                            Forms\Components\TextInput::make('pt.title')
                            ->maxLength(255),

                            Forms\Components\FileUpload::make('pt.file_real')
                            ->label('File')
                            ->disk('public')
                            ->directory('uploads/files/presentations')
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

                Tables\Columns\TextColumn::make('title')->wrap()
                ->searchable(),
                Tables\Columns\TextColumn::make('author')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),

      
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
            'index' => Pages\ListPresentations::route('/'),
            'create' => Pages\CreatePresentation::route('/create'),
            'view' => Pages\ViewPresentation::route('/{record}'),
            'edit' => Pages\EditPresentation::route('/{record}/edit'),
        ];
    }    
}
