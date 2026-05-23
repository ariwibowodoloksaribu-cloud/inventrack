<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class CategoryForm
{
   public static function configure(Schema $form): Schema
{
    return $form
        ->schema([
            TextInput::make('nama_kategori')
                ->label('Nama Kategori')
                ->placeholder('Contoh: Elektronik, Furniture, ATK')
                ->required()
                ->maxLength(255),

            Textarea::make('deskripsi')
                ->label('Deskripsi Kategori')
                ->placeholder('Jelaskan singkat tentang kategori ini')
                ->required()
                ->rows(3),

            FileUpload::make('image')
                ->label('Foto Kategori')
                ->disk('public')
                ->image()
                ->directory('categories')
                ->visibility('public')
                ->required(),
        ]);
}
}
