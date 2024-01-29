<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoResource\Pages;
use App\Filament\Resources\VideoResource\RelationManagers;
use App\Models\Video;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Tabs;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Model; //global search
use App\Filament\Traits\Translatable;

class VideoResource extends Resource
{
    protected static ?string $model = Video::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

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
                            ->maxLength(255) 
                            ->required(),

                            Forms\Components\RichEditor::make('en.description')
                            ->maxLength(255),
                           

                            Forms\Components\TextInput::make('en.url') 
                            ->maxLength(255)
                            ->required(),
               
                        ]),
                    Tabs\Tab::make('Es')
                        ->schema([
                            Forms\Components\TextInput::make('es.name')
                            ->maxLength(255)
                            ->required(),

                            Forms\Components\RichEditor::make('es.description')
                            ->maxLength(255),
                   

                            Forms\Components\TextInput::make('es.url')
                            ->maxLength(255)
                            ->required(),
                           
                    ]),
                    Tabs\Tab::make('Pt')
                        ->schema([
                            Forms\Components\TextInput::make('pt.name')
                            ->required(),

                            Forms\Components\RichEditor::make('pt.description'),
                           

                            Forms\Components\TextInput::make('pt.url') 
                            ->required(),

                           
                    ]),
                    
                ]),


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
            'index' => Pages\ListVideos::route('/'),
            'create' => Pages\CreateVideo::route('/create'),
            'view' => Pages\ViewVideo::route('/{record}'),
            'edit' => Pages\EditVideo::route('/{record}/edit'),
        ];
    }    
}
