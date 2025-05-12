<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // SECTION: Data Diri
                Forms\Components\Section::make('Data Diri')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('nik')
                                    ->required()
                                    ->maxLength(16),
                                Forms\Components\TextInput::make('tempat_lahir')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('tanggal_lahir')
                                    ->required()
                                    ->maxDate(now()),
                                Forms\Components\Select::make('jenis_kelamin')
                                    ->options([
                                        'L' => 'Laki-laki',
                                        'P' => 'Perempuan',
                                    ])
                                    ->required(),
                                Forms\Components\Select::make('riwayat_pendidikan')
                                    ->options([
                                        'SD' => 'Sekolah Dasar',
                                        'MTS/SMP' => 'Madrasah Tsanawiyah/Sekolah Menengah Pertama',
                                    ])
                                    ->required(),
                                Forms\Components\TextInput::make('sekolah_asal')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Select::make('program_id')
                                    ->relationship('program', 'name')
                                    ->searchable()
                                    ->required(),
                            ]),
                        Forms\Components\RichEditor::make('alamat')
                            ->required()
                            ->maxLength(65535),
                    ]),

                // SECTION: Orang Tua
                Forms\Components\Section::make('Data Orang Tua')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('nama_ayah')->required(),
                                Forms\Components\TextInput::make('pekerjaan_ayah')->required(),
                                Forms\Components\TextInput::make('no_telepon_ayah')
                                    ->required()
                                    ->tel()
                                    ->maxLength(15),
                                Forms\Components\TextInput::make('nama_ibu')->required(),
                                Forms\Components\TextInput::make('pekerjaan_ibu')->required(),
                                Forms\Components\TextInput::make('no_telepon_ibu')
                                    ->required()
                                    ->tel()
                                    ->maxLength(15),
                            ]),
                    ]),

                // SECTION: Kontak Siswa
                Forms\Components\Section::make('Kontak Siswa')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('no_telepon')
                                    ->required()
                                    ->tel()
                                    ->maxLength(15),
                                Forms\Components\Toggle::make('status')
                                    ->label('Aktif')
                                    ->default(true),
                            ]),
                    ]),

                // SECTION: Dokumen
                Forms\Components\Section::make('Dokumen Pendaftaran')
                    ->schema([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\FileUpload::make('akta_lahir')->required(),
                                Forms\Components\FileUpload::make('kk')->required(),
                                Forms\Components\FileUpload::make('ijazah')->required(),
                                Forms\Components\FileUpload::make('pas_foto')
                                    ->image()
                                    ->preserveFilenames()
                                    ->directory('pas_foto')
                                    ->visibility('public')
                                    ->required(),
                            ]),
                    ]),

                // SECTION: Akun
                Forms\Components\Section::make('Akun')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('email')
                                    ->required()
                                    ->email()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('password')
                                    ->required()
                                    ->password()
                                    ->minLength(8)
                                    ->maxLength(255)
                                    ->dehydrateStateUsing(fn ($state) => bcrypt($state)),
                            ]),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}