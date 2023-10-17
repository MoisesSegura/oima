<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProcedureNormResource\Pages;
use App\Filament\Resources\ProcedureNormResource\RelationManagers;
use App\Models\ProcedureNorm;
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

class ProcedureNormResource extends Resource
{
    protected static ?string $model = ProcedureNorm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'OIMA';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Tabs::make('Mis formularios') 
                ->tabs([
                    Tabs\Tab::make('En') 
                        ->schema([
                            Forms\Components\TextInput::make('en.name') 
                            ->required(),

                            Forms\Components\FileUpload::make('en.file_real')
                            ->label('file')
                            ->required(),

               
                        ]),
                    Tabs\Tab::make('Es')
                        ->schema([
                            Forms\Components\TextInput::make('es.name')
                            ->required(),

                            Forms\Components\FileUpload::make('es.file_real')
                            ->label('file')
                            ->required(),
                           
                    ]),
                    Tabs\Tab::make('Pt')
                        ->schema([
                            Forms\Components\TextInput::make('pt.name')
                            ->required(),

                            Forms\Components\FileUpload::make('pt.file_real')
                            ->label('file')
                            ->required(),

                           
                    ]),
                    
                ]),
                // ->columns('full'), 

        ])
        ->columns([
            'sm' => '3',
            'lg' => 'full',
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
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
            'index' => Pages\ListProcedureNorms::route('/'),
            'create' => Pages\CreateProcedureNorm::route('/create'),
            'view' => Pages\ViewProcedureNorm::route('/{record}'),
            'edit' => Pages\EditProcedureNorm::route('/{record}/edit'),

        ];
    }    
}
