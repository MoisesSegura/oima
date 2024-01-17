<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublicationResource\Pages;
use App\Filament\Resources\PublicationResource\RelationManagers;
use App\Models\Publication;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Tabs;
use Filament\Resources\Pages\ListRecords\Tab;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\Model; //global search
use App\Filament\Traits\Translatable;




class PublicationResource extends Resource
{
    protected static ?string $model = Publication::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'OIMA';

    public static function form(Form $form): Form
    {


        return $form
        ->schema([

            Forms\Components\Group::make()
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('author')
                        ->maxLength(255),

                        Forms\Components\TextInput::make('place')
                        ->maxLength(255),

                        Forms\Components\TextInput::make('isbn')
                        ->maxLength(255),

                        Forms\Components\TextInput::make('bar_code')
                        ->maxLength(255),

                        Forms\Components\TextInput::make('collection')
                        ->maxLength(255),

                        Forms\Components\TextInput::make('topographic_signature')
                        ->maxLength(255)
                        ->required(),

                        Forms\Components\DateTimePicker::make('expiration_date'),


                    ])
                    ]),

            
            Tabs::make('lang form') 
                ->tabs([
                    Tabs\Tab::make('En') 
                        ->schema([

                            Forms\Components\TextInput::make('en.title')
                            ->maxLength(255),

                            Forms\Components\MarkdownEditor::make('en.description') 
                            ->required(),

                            Forms\Components\FileUpload::make('en.file_real')
                            ->label('file')
                            ->disk('public')
                            ->directory('uploads/publications/files')
                            ->required(),

                            Forms\Components\FileUpload::make('en.image')
                            ->disk('public')
                            ->directory('uploads/publications/images')
                            ->required(),
               
                        ]),
                    Tabs\Tab::make('Es')
                        ->schema([
                            Forms\Components\TextInput::make('es.title')
                            ->maxLength(255),

                            Forms\Components\MarkdownEditor::make('es.description')
                            ->required(),

                            Forms\Components\FileUpload::make('es.file_real')
                            ->label('file')
                            ->disk('public')
                            ->directory('uploads/publications/files')
                            ->required(),

                            Forms\Components\FileUpload::make('es.image')
                            ->disk('public')
                            ->directory('uploads/publications/images')
                            ->required(),
                           
                    ]),
                    Tabs\Tab::make('Pt')
                        ->schema([
                            Forms\Components\TextInput::make('pt.title')
                            ->maxLength(255),

                            Forms\Components\MarkdownEditor::make('pt.description')
                            ->required(),

                            Forms\Components\FileUpload::make('pt.file_real')
                            ->label('file')
                            ->disk('public')
                            ->directory('uploads/publications/files')
                            ->required(),

                            Forms\Components\FileUpload::make('pt.image')
                            ->disk('public')
                            ->directory('uploads/publications/images')
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
                Tables\Columns\TextColumn::make('title') ->wrap()
                ->searchable(),
                Tables\Columns\TextColumn::make('author')
                    ->searchable(),
                Tables\Columns\TextColumn::make('isbn')
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
            'index' => Pages\ListPublications::route('/'),
            'create' => Pages\CreatePublication::route('/create'),
            'view' => Pages\ViewPublication::route('/{record}'),
            'edit' => Pages\EditPublication::route('/{record}/edit'),
        ];
    }    
}
