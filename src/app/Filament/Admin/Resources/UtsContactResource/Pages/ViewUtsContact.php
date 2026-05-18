<?php

namespace App\Filament\Admin\Resources\UtsContactResource\Pages;

use App\Filament\Admin\Resources\UtsContactResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewUtsContact extends ViewRecord
{
    protected static string $resource = UtsContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('markAsRead')
                ->label('Tandai Sudah Dibaca')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->visible(fn (): bool => ! $this->record->is_read)
                ->action(function (): void {
                    $this->record->update([
                        'is_read' => true,
                    ]);

                    $this->record->refresh();

                    Notification::make()
                        ->title('Pesan ditandai sudah dibaca.')
                        ->success()
                        ->send();
                }),

            Actions\Action::make('markAsUnread')
                ->label('Tandai Belum Dibaca')
                ->icon('heroicon-o-x-circle')
                ->color('warning')
                ->visible(fn (): bool => $this->record->is_read)
                ->action(function (): void {
                    $this->record->update([
                        'is_read' => false,
                    ]);

                    $this->record->refresh();

                    Notification::make()
                        ->title('Pesan ditandai belum dibaca.')
                        ->warning()
                        ->send();
                }),

            Actions\Action::make('markAsReplied')
                ->label('Tandai Sudah Dibalas')
                ->icon('heroicon-o-paper-airplane')
                ->color('info')
                ->visible(fn (): bool => blank($this->record->replied_at))
                ->action(function (): void {
                    $this->record->update([
                        'is_read' => true,
                        'replied_at' => now(),
                    ]);

                    $this->record->refresh();

                    Notification::make()
                        ->title('Pesan ditandai sudah dibalas.')
                        ->success()
                        ->send();
                }),

            Actions\Action::make('resetReplied')
                ->label('Reset Status Dibalas')
                ->icon('heroicon-o-arrow-path')
                ->color('gray')
                ->visible(fn (): bool => filled($this->record->replied_at))
                ->requiresConfirmation()
                ->modalHeading('Reset status dibalas?')
                ->modalDescription('Tanggal dibalas akan dikosongkan kembali.')
                ->modalSubmitActionLabel('Ya, reset')
                ->action(function (): void {
                    $this->record->update([
                        'replied_at' => null,
                    ]);

                    $this->record->refresh();

                    Notification::make()
                        ->title('Status dibalas berhasil direset.')
                        ->success()
                        ->send();
                }),

            Actions\EditAction::make(),

            Actions\DeleteAction::make(),
        ];
    }
}