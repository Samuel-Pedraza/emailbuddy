<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StripeSubscriptionResource\Pages;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StripeSubscriptionResource extends Resource
{
    protected static ?string $model = \Laravel\Cashier\Subscription::class;

    protected static ?string $modelLabel = 'Stripe Subscriptions';

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationGroup = 'Payments';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('stripe_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('stripe_status')
                    ->searchable()
                    ->badge(),
                Tables\Columns\TextColumn::make('stripe_price'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('trial_ends_at')->dateTime(),
                Tables\Columns\TextColumn::make('ends_at')->dateTime(),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListStripeSubscriptions::route('/'),
            'create' => Pages\CreateStripeSubscription::route('/create'),
            'view' => Pages\ViewStripeSubscription::route('/{record}'),
            'edit' => Pages\EditStripeSubscription::route('/{record}/edit'),
        ];
    }
}
