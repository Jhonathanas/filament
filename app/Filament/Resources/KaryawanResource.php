<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Karyawan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KaryawanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KaryawanResource\RelationManagers;
use App\Models\job_desk;

class KaryawanResource extends Resource
{
    protected static ?string $model = Karyawan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $jobDesks = job_desk::pluck('jobdesk', 'id');

        return $form
            ->schema([
                TextInput::make('nik')->required(),
                TextInput::make('nama')->required(),
                Select::make('jk')
                    ->options([
                        'laki-laki' => 'laki-laki', 'perempuan' => 'perempuan'
                    ]),
                Select::make('job_desks_id')
                    ->options($jobDesks->toArray())
                // ->placeholder('Pilih Job Desk')
            ]);
    }

    public static function table(Table $table): Table
    {
        $jobDesks = job_desk::pluck('jobdesk', 'id');
        return $table
            ->columns([
                TextColumn::make('nik'),
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('jk')
                ->label('gender'),
                TextColumn::make('job_desks_id.jobdesk')
                    ->label('job')
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
            'index' => Pages\ListKaryawans::route('/'),
            'create' => Pages\CreateKaryawan::route('/create'),
            'edit' => Pages\EditKaryawan::route('/{record}/edit'),
        ];
    }
}
