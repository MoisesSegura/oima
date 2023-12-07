<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaboralDocumentResource\Pages;
use App\Filament\Resources\LaboralDocumentResource\RelationManagers;
use App\Models\LaboralDocument;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Model; //global search
use App\Models\Region;
use App\Filament\Traits\Translatable;

class LaboralDocumentResource extends Resource
{


    protected static ?string $model = LaboralDocument::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

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
                        ->required()
                        ->maxLength(255),

                        Forms\Components\TextInput::make('place')
                        ->required()
                        ->maxLength(255),

                        Select::make('region')
                        ->label('Region')
                        ->options(Region::all()->pluck('name', 'id'))
                        ->searchable(),

                        Select::make('category')
                        ->options(function () {
                            $options = [
                                1 => 'Documentos Técnico',
                                2 => 'Informes Regionales',
                            ];
                            if (app()->getLocale() === 'en') {
                                $options = [
                                    1 => 'Technical Documents',
                                    2 => 'Regional Reports',
                                ];
                            } else if (app()->getLocale() === 'pt') {
                                $options = [
                                    1 => 'Documentos Técnicos',
                                    2 => 'Relatórios Regionais',
                                ];
                            }
                            return $options;
                        })


                        // Select::make('category')
                        // ->options([
                        //     '1' => 'Documentos Tecnico',
                        //     '2' => 'Informes Regionales',
                        // ])

                    ])
                    ]),

            
            Tabs::make('lang form') 
                ->tabs([
                    Tabs\Tab::make('En') 
                        ->schema([

                            Forms\Components\TextInput::make('en.title')
                            ->maxLength(255),

                            Forms\Components\FileUpload::make('en.file_real')
                            ->label('file')
                            ->disk('public')
                            ->directory('uploads/files/laboral_documents')
                            ->required(),

               
                        ]),
                    Tabs\Tab::make('Es')
                        ->schema([
                            Forms\Components\TextInput::make('es.title')
                            ->maxLength(255),

                            Forms\Components\FileUpload::make('es.file_real')
                            ->label('file')
                            ->disk('public')
                            ->directory('uploads/files/laboral_documents')
                            ->required(),

                           
                    ]),
                    Tabs\Tab::make('Pt')
                        ->schema([
                            Forms\Components\TextInput::make('pt.title')
                            ->maxLength(255),

                            Forms\Components\FileUpload::make('pt.file_real')
                            ->label('file')
                            ->disk('public')
                            ->directory('uploads/files/laboral_documents')
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
                ->wrap()
                ->searchable(),
                Tables\Columns\TextColumn::make('author')
                    ->searchable(),
                Tables\Columns\TextColumn::make('place')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('region.name')
                //     ->searchable(),
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
            'index' => Pages\ListLaboralDocuments::route('/'),
            'create' => Pages\CreateLaboralDocument::route('/create'),
            'view' => Pages\ViewLaboralDocument::route('/{record}'),
            'edit' => Pages\EditLaboralDocument::route('/{record}/edit'),
        ];
    }
    
}
