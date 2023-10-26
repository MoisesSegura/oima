<?php

namespace App\Filament\Resources\ProductDetailResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Tabs;
use Filament\Resources\Pages\ListRecords\Tab;
use App\Filament\Traits\Translatable;
use App\Models\ProductDetail;
use App\Models\ProductGallery;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GalleriesRelationManager extends RelationManager
{
    protected static string $relationship = 'galleries';

    public function form(Form $form): Form
    {
        return $form
        ->schema([             
            Tabs::make('lang form') 
            ->tabs([
                Tabs\Tab::make('En') 
                    ->schema([
                Forms\Components\TextInput::make('en.title')
                    ->maxLength(255),
                    ]),
                Tabs\Tab::make('Es')
                    ->schema([
                 Forms\Components\TextInput::make('es.title')
                    ->maxLength(255),    
                ]),
                Tabs\Tab::make('Pt')
                    ->schema([
                Forms\Components\TextInput::make('pt.title')
                    ->maxLength(255),
                ]),
                
            ]),

            Forms\Components\FileUpload::make('image'),
            Forms\Components\Toggle::make('delete_image')


        ])->Columns('full');
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\ImageColumn::make('image'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make('modal_edit_with_data')
                ->mountUsing(function (Forms\ComponentContainer $form, ProductGallery $record) {
                    $data = [];
                    // Get all data in array
                    $dataRecord = $record->toArray();
                    // Save in $data by key = value
                    foreach ($dataRecord as $key => $value) {
                        $data[$key] = $value;
                    }
                    // Get all translations in array and save in $data by key = value
                    foreach ($record->getTranslationsArray() as $key => $value) {
                        $data[$key] = $value;
                    }
                    // Filled your data to $form and return
                    return $form->fill($data);
                })
                ->form([ 
                    Tabs::make('lang form') 
                    ->tabs([
                        Tabs\Tab::make('En') 
                            ->schema([
                        Forms\Components\TextInput::make('en.title')
                            ->maxLength(255),
                            ]),
                        Tabs\Tab::make('Es')
                            ->schema([
                         Forms\Components\TextInput::make('es.title')
                            ->maxLength(255),    
                        ]),
                        Tabs\Tab::make('Pt')
                            ->schema([
                        Forms\Components\TextInput::make('pt.title')
                            ->maxLength(255),
                        ]),
                        
                    ]),
        
                    Forms\Components\FileUpload::make('image'),
                    Forms\Components\Toggle::make('delete_image')

                ]),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
