<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\TextInput::make('invoice_number')
                                    ->default('ABC-' . random_int(100000, 999999))
                                    ->required(),
                                Forms\Components\DatePicker::make('invoice_date')
                                    ->default(now())
                                    ->required(),
                            ])->columns([
                                'sm' => 2,
                            ]),

                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\Placeholder::make('Products'),

                                Forms\Components\Repeater::make('invoiceItems')
                                    ->relationship()
                                    ->schema([
                                        Forms\Components\Select::make('product_id')
                                            ->label('Product')
                                            ->options(Product::query()->pluck('name', 'id'))
                                            ->required()
                                            ->reactive()
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                $product = Product::find($state);
                                                if ($product) {
                                                    $set('price', number_format($product->price / 100, 2));
                                                    $set('product_price', $product->price);
                                                }
                                            })
                                            ->columnSpan([
                                                'md' => 5,
                                            ]),
                                        Forms\Components\TextInput::make('product_amount')
                                            ->numeric()
                                            ->default(1)
                                            ->columnSpan([
                                                'md' => 2,
                                            ])
                                            ->required(),
                                        Forms\Components\TextInput::make('price')
                                            ->disabled()
                                            ->dehydrated(false)
                                            ->numeric()
                                            ->columnSpan([
                                                'md' => 3,
                                            ]),
                                        Forms\Components\Hidden::make('product_price')
                                            ->disabled(),
                                    ])
                                    ->defaultItems(1)
                                    ->columns([
                                        'md' => 10,
                                    ])
                                    ->columnSpan('full')
                                // Repeater for items will go here
                            ]),
                    ])->columnSpan('full')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('invoice_date')->date()->sortable(),
                Tables\Columns\TextColumn::make('invoice_number')->sortable(),
                Tables\Columns\TextColumn::make('user.name')->sortable(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
        ];
    }
}
