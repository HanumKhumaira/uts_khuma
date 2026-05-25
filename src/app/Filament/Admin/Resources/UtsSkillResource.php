<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UtsSkillResource\Pages;
use App\Models\UtsSkill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UtsSkillResource extends Resource
{
    protected static ?string $model = UtsSkill::class;

    protected static ?string $navigationIcon = 'heroicon-o-code-bracket-square';

    protected static ?string $navigationGroup = 'Portfolio';

    protected static ?string $navigationLabel = 'Skills';

    protected static ?string $modelLabel = 'Skill';

    protected static ?string $pluralModelLabel = 'Skills';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Skill')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('percentage')
                    ->label('Persentase')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->suffix('%')
                    ->required(),

                Forms\Components\TextInput::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->minValue(1)
                    ->required()
                    ->unique(
                    table: 'uts_skills',
                    column: 'sort_order',
                    ignoreRecord: true
    )
                    ->validationMessages([
                     'unique' => 'Urutan ini sudah dipakai. Pilih angka urutan lain.',
    ])
                    ->helperText('Urutan tidak boleh sama dengan skill lain. Contoh: 1, 2, 3, 4.'),

                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Skill')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('percentage')
                    ->label('Persentase')
                    ->suffix('%')
                    ->sortable(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
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
            'index' => Pages\ListUtsSkills::route('/'),
            'create' => Pages\CreateUtsSkill::route('/create'),
            'edit' => Pages\EditUtsSkill::route('/{record}/edit'),
        ];
    }
}