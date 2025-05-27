<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;
    protected static ?string $navigationIcon = 'heroicon-s-book-open';
    protected static ?string $navigationLabel = 'Mata Kuliah';
    public static function form(Form $form): Form
    {
        
        return $form->schema([
            Forms\Components\TextInput::make('name')->required()->maxLength(100),
            Forms\Components\TextInput::make('code')->required()->unique(ignoreRecord: true)->maxLength(20),
            Forms\Components\Select::make('semester')->options([
                1 => '1', 2 => '2', 3 => '3', 4 => '4',
                5 => '5', 6 => '6', 7 => '7', 8 => '8',
            ])->required(),
            Forms\Components\TextInput::make('tahun_ajaran')
                ->required()
                ->default('2024/2025'),
            Forms\Components\Select::make('lecturers')
            ->label('Dosen Pengampu')
            ->relationship('lecturers', 'name')
            ->multiple()
            ->preload(),
            Forms\Components\Select::make('students')
            ->label('Mahasiswa')
            ->relationship('students', 'name')
            ->multiple()
            ->preload(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('code')->sortable(),
                Tables\Columns\TextColumn::make('semester')->sortable(),
                Tables\Columns\TextColumn::make('tahun_ajaran'),
                Tables\Columns\TextColumn::make('lecturers.name')->label('Dosen Pengampu'),
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
