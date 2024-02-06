<?php

namespace App\Filament\Resources\SiteTextResource\RelationManagers;

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
use App\Models\SiteText;
use App\Models\Achievement;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AchievementsRelationManager extends RelationManager
{
    protected static string $relationship = 'Achievements';

    public function getRelationship(): Builder | HasMany
    {
        return $this->getOwnerRecord()->{static::getRelationshipName()}()->with(['translations']);
    }

    public function form(Form $form): Form
    {
        return $form
        ->schema([             
            Tabs::make('lang form') 
            ->tabs([
                Tabs\Tab::make('En') 
                    ->schema([
                Forms\Components\RichEditor::make('en.text')
                    ->maxLength(255),
           
                    ]),
                Tabs\Tab::make('Es')
                    ->schema([
                Forms\Components\RichEditor::make('es.text')
                    ->maxLength(255),
                       
                ]),
                Tabs\Tab::make('Pt')
                    ->schema([
                Forms\Components\RichEditor::make('pt.text')
                    ->maxLength(255),

                ]),
                
            ]),


        ])->Columns('full');
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('text')
            ->columns([
                Tables\Columns\TextColumn::make('text')->html(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make('modal_edit_with_data')
                ->mountUsing(function (Forms\ComponentContainer $form, Achievement $record) {
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
                        Forms\Components\RichEditor::make('en.text')
                            ->maxLength(255),
                   
                            ]),
                        Tabs\Tab::make('Es')
                            ->schema([
                        Forms\Components\RichEditor::make('es.text')
                            ->maxLength(255),
                               
                        ]),
                        Tabs\Tab::make('Pt')
                            ->schema([
                        Forms\Components\RichEditor::make('pt.text')
                            ->maxLength(255),
        
                        ]),
                        
                    ]),
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
