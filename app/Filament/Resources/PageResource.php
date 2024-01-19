<?php

namespace App\Filament\Resources;

use App\Enums\DocumentVisibleToType;
use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Traits\ModelLabel;
use App\Filament\Resources\Traits\ACLHelpers;
use App\Models\PageBlock;
use App\Models\User;
use Filament\Forms\Components\Builder as FormBuilder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class PageResource extends \App\Filament\Resources\Extended\ExtendedResourceBase
{
    use ModelLabel;
    use ACLHelpers;

    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->numeric(),

                FormBuilder::make('data.content')
                    // ->live()
                    ->blockPickerColumns(3)
                    // ->blockPickerWidth('2xl')
                    ->blocks([

                        FormBuilder\Block::make('block type 1')
                        ->name('PAGE_BLOCK_TYPE_1')
                        ->icon('bi-image')
                        ->label(__('cms/block.PAGE_BLOCK_TYPE_1'))
                        ->schema([
                            Forms\Components\Select::make('page_block')
                            ->label(__('Page Block'))
                            ->live()
                            ->columnSpanFull()
                            ->searchable()
                            ->getSearchResultsUsing(
                                fn (string $search): array => PageBlock::where('type', 1)
                                    ->where('title', 'like', "%{$search}%")
                                    ->limit(30)
                                    ->pluck('title', 'id')
                                    ->toArray()
                            )
                            ->preload()
                            ->options(
                                fn (): array => PageBlock::where('type', 1)
                                    ->limit(10)
                                    ->pluck('title', 'id')
                                    ->toArray()
                            )
                            ->getOptionLabelUsing(fn ($value): ?string => PageBlock::find($value)?->title),
                        ])
                        ->columns(2),

                        FormBuilder\Block::make('PAGE_BLOCK_TYPE_2')
                            ->name('PAGE_BLOCK_TYPE_2')
                            ->icon('bi-images')
                            ->label(__('cms/block.PAGE_BLOCK_TYPE_2'))
                            ->schema([
                                Forms\Components\Select::make('page_block')
                                ->label(__('Page Block'))
                                ->live()
                                ->columnSpanFull()
                                ->searchable()
                                ->getSearchResultsUsing(
                                    fn (string $search): array => PageBlock::where('type', 3)
                                        ->where('title', 'like', "%{$search}%")
                                        ->limit(30)
                                        ->pluck('title', 'id')
                                        ->toArray()
                                )
                                ->preload()
                                ->options(
                                    fn (): array => PageBlock::where('type', 1)
                                        ->limit(10)
                                        ->pluck('title', 'id')
                                        ->toArray()
                                )
                                ->getOptionLabelUsing(fn ($value): ?string => PageBlock::find($value)?->title),
                            ])
                            ->columns(2),

                            FormBuilder\Block::make('PAGE_BLOCK_TYPE_3')
                            ->name('PAGE_BLOCK_TYPE_3')
                            ->icon('fluentui-video-clip-24-o')
                            ->label(__('cms/block.PAGE_BLOCK_TYPE_3'))
                            ->schema([
                                Forms\Components\Select::make('page_block')
                                ->label(__('Page Block'))
                                ->live()
                                ->columnSpanFull()
                                ->searchable()
                                ->getSearchResultsUsing(
                                    fn (string $search): array => PageBlock::where('type', 1)
                                        ->where('title', 'like', "%{$search}%")
                                        ->limit(30)
                                        ->pluck('title', 'id')
                                        ->toArray()
                                )
                                ->preload()
                                ->options(
                                    fn (): array => PageBlock::where('type', 1)
                                        ->limit(10)
                                        ->pluck('title', 'id')
                                        ->toArray()
                                )
                                ->getOptionLabelUsing(fn ($value): ?string => PageBlock::find($value)?->title),
                            ])
                            ->columns(2),

                            FormBuilder\Block::make('PAGE_BLOCK_TYPE_4')
                            ->name('PAGE_BLOCK_TYPE_4')
                            ->icon('fluentui-video-clip-multiple-16-o')
                            ->label(__('cms/block.PAGE_BLOCK_TYPE_4'))
                            ->schema([
                                Forms\Components\Select::make('page_block')
                                ->label(__('Page Block'))
                                ->live()
                                ->columnSpanFull()
                                ->searchable()
                                ->getSearchResultsUsing(
                                    fn (string $search): array => PageBlock::where('type', 1)
                                        ->where('title', 'like', "%{$search}%")
                                        ->limit(30)
                                        ->pluck('title', 'id')
                                        ->toArray()
                                )
                                ->preload()
                                ->options(
                                    fn (): array => PageBlock::where('type', 1)
                                        ->limit(10)
                                        ->pluck('title', 'id')
                                        ->toArray()
                                )
                                ->getOptionLabelUsing(fn ($value): ?string => PageBlock::find($value)?->title),
                            ])
                            ->columns(2),

                        FormBuilder\Block::make('heading')
                            ->schema([
                                TextInput::make('content')
                                    ->label('Heading')
                                    ->required(),
                                Select::make('level')
                                    ->options([
                                        'h1' => 'Heading 1',
                                        'h2' => 'Heading 2',
                                        'h3' => 'Heading 3',
                                        'h4' => 'Heading 4',
                                        'h5' => 'Heading 5',
                                        'h6' => 'Heading 6',
                                    ])
                                    ->required(),
                            ])
                            ->columns(2),
                        FormBuilder\Block::make('paragraph')
                            ->schema([
                                Textarea::make('content')
                                    ->label('Paragraph')
                                    ->required(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
