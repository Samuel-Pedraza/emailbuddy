<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StripeSubscriptionResource\Pages;
use App\Filament\Resources\StripeSubscriptionResource\RelationManagers;
use App\Models\StripeSubscription;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StripeSubscriptionResource extends Resource
{
    protected static ?string $model = \Laravel\Cashier\Subscription::class;
    protected static ?string $modelLabel = 'Stripe Subscriptions';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                //
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
