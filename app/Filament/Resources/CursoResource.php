<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CursoResource\Pages;
use App\Filament\Resources\CursoResource\RelationManagers;
use App\Models\Curso;
use App\Models\Estudiante;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CursoResource extends Resource
{
    protected static ?string $model = Curso::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //

                Forms\Components\TextInput::make('name')
                ->label('Descripcion')
                ->required()
                ->maxLength(255),
                Forms\Components\Select::make('type')
                ->label('Tipo')
                ->options([
                    'matematica' => 'Matematica',
                    'historia' => 'Historia',
                    'lenguaje' => 'Lenguaje',
                    'fisica' => 'Fisica',
                ]),
                Forms\Components\Select::make('estudiantes_id')
                ->relationship('estudiante', 'name')
                ->searchable()
                ->preload()
                ->createOptionForm([
                    Forms\Components\TextInput::make('name')
                        ->label('Nombre')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->label('Correo electronico')
                        ->email()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('date_of_birth')
                    ->label('Fecha de Nacimiento'),
                    Forms\Components\TextInput::make('phone')
                        ->label('Numero Telefono')
                        ->tel()
                        ->required(),
                ])
                ->required()
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //

                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('type') ,


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
            'index' => Pages\ListCursos::route('/'),
            'create' => Pages\CreateCurso::route('/create'),
            'edit' => Pages\EditCurso::route('/{record}/edit'),
        ];
    }    
}
