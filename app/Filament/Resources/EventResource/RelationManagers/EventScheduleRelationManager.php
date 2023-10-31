<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

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
use App\Models\Event;
use App\Models\EventSchedule;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventScheduleRelationManager extends RelationManager
{
    protected static string $relationship = 'eventSchedule';

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
                        Forms\Components\Textarea::make('en.text')
                            ->maxLength(255),   
                             
                        ]),
                    Tabs\Tab::make('Es')
                        ->schema([
                        Forms\Components\Textarea::make('es.text')
                            ->maxLength(255),
                           
                    ]),
                    Tabs\Tab::make('Pt')
                        ->schema([
                        Forms\Components\Textarea::make('pt.text')
                            ->maxLength(255),
        
    
                    ]),
                        
                    ]),
            ]) ->columns([
                'sm' => '3',
                'lg' => 'full',
            ]);
    ;
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('text')
            ->columns([
                Tables\Columns\TextColumn::make('text'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make('modal_edit_with_data')
                ->mountUsing(function (Forms\ComponentContainer $form, EventSchedule $record) {
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
                        Forms\Components\Textarea::make('en.text')
                            ->maxLength(255),   
                             
                        ]),
                    Tabs\Tab::make('Es')
                        ->schema([
                        Forms\Components\Textarea::make('es.text')
                            ->maxLength(255),
                           
                    ]),
                    Tabs\Tab::make('Pt')
                        ->schema([
                        Forms\Components\Textarea::make('pt.text')
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
