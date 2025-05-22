<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionnaireResource\Pages;
use App\Filament\Resources\QuestionnaireResource\RelationManagers;
use App\Models\Questionnaire;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionnaireResource extends Resource
{
    protected static ?string $model = Questionnaire::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Kuisioner';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Textarea::make('text')
                ->label('Pertanyaan')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('type')
                ->options([
                    'scale' => 'Skala (1–5)',
                    'text' => 'Teks (Komentar)',
                ])
                ->required(),
            Forms\Components\TextInput::make('weight')
                ->label('Bobot')
                ->numeric()
                ->default(1),
        ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('text')->label('Pertanyaan')->wrap(),
                Tables\Columns\TextColumn::make('type')->label('Tipe'),
                Tables\Columns\TextColumn::make('weight')->label('Bobot'),
            ])
            ->filters([
                
            ])
            ->actions([
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
            'index' => Pages\ListQuestionnaires::route('/'),
            'create' => Pages\CreateQuestionnaire::route('/create'),
            'edit' => Pages\EditQuestionnaire::route('/{record}/edit'),
        ];
    }
}
