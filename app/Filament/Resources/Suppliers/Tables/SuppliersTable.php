<?php

namespace App\Filament\Resources\Suppliers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\DeleteAction;

class SuppliersTable
{
    public static function configure(Table $table): Table
{
    return $table
        ->columns([
            ImageColumn::make('image')
                ->label('Logo')
                ->disk('public'),

            TextColumn::make('nama_perusahaan')
                ->label('Perusahaan')
                ->searchable()
                ->sortable(),

            TextColumn::make('nama_kontak')
                ->label('Contact Person')
                ->searchable(),

            TextColumn::make('telepon')
                ->label('Telepon'),

            TextColumn::make('email')
                ->label('Email'),

            TextColumn::make('created_at')
                ->label('Ditambahkan')
                ->dateTime('d M Y')
                ->sortable(),
        ])
        ->filters([
            //
        ])
        ->recordActions([
            EditAction::make(),
            DeleteAction::make(),
        ])
        ->toolbarActions([
            BulkActionGroup::make([
                DeleteBulkAction::make(),
            ]),
        ]);
}
}
