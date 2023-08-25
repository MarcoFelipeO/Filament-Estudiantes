<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstudianteResource\Pages;
use App\Filament\Resources\EstudianteResource\RelationManagers;
use App\Models\Estudiante;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EstudianteResource extends Resource
{
    protected static ?string $model = Estudiante::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

   // protected static ?string $navigationLabel = 'Mis Estudiantes'; // Personalizo la etiqueta del elemento de navegacion, 
                                                                // 

  /*     public static function getNavigationLabel(): string  Aqui podemos reemplazar la etiqueta de navegacion por un url
    {                                                                   de nuestra carpeta, ejemplo colocar su ubicacion 
        return __('filament/resources/EstudianteResource.php');         en VS.
    }      */                                                            

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                ->label('Nombre'),
                Forms\Components\TextInput::make('email')
                ->label('Correo electronico')
                ->email()
                ->required()
                ->maxLength(255),
                Forms\Components\DatePicker::make('date_of_birth')
                ->label('Fecha de Nacimiento')
                ->required(),
                Forms\Components\TextInput::make('phone')
                ->label('Telefono')
                ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //


                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('date_of_birth'),
                Tables\Columns\TextColumn::make('phone'),


                

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListEstudiantes::route('/'),
            'create' => Pages\CreateEstudiante::route('/create'),
            'edit' => Pages\EditEstudiante::route('/{record}/edit'),
        ];
    }    
}
