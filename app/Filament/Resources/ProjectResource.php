<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255)
                ->label('Judul Karya/Proyek'),

                \Filament\Forms\Components\FileUpload::make('image')
                ->image()
                ->directory('projects')
                ->label('Gambar Thumbnail'),

                \Filament\Forms\Components\TextInput::make('website_url')
                ->url()
                ->maxLength(255)
                ->label('Link Website (Opsional)'),

                \Filament\Forms\Components\TextInput::make('youtube_url')
                ->url()
                ->maxLength(255)
                ->label('Link YouTube (Opsional)'),

                \Filament\Forms\Components\Textarea::make('description')
                ->columnspanfull()
                ->label('Deskripsi Singkat')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('image')
                    ->label('Thumbnail'),

                \Filament\Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->label('Judul proyek'),

                \Filament\Tables\Columns\TextColumn::make('website_url')
                ->limit(30)
                ->label('Link Website'),

                \Filament\Tables\Columns\TextColumn::make('youtube_url')
                ->limit(30)
                ->label('Link YouTube'),

                \Filament\Tables\Columns\TextColumn::make('created_at')
                ->datetime('d M Y')
                ->label('Tanggal Upload'),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
