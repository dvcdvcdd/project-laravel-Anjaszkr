<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhotoboothResource\Pages;
use App\Filament\Resources\PhotoboothResource\RelationManagers;
use App\Models\Photobooth;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PhotoboothResource extends Resource
{
    protected static ?string $model = Photobooth::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image_path')
                    ->image()
                    ->directory('photos') // Simpan di folder 'photos' dalam storage/app/public
                    ->label('Upload Foto')
                    ->required(),
            ]);
    }

   public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Hasil Jepretan')
                    ->size(150)
                    ->square(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu Jepret')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPhotobooths::route('/'),
            'create' => Pages\CreatePhotobooth::route('/create'),
            'edit' => Pages\EditPhotobooth::route('/{record}/edit'),
        ];
    }
}
