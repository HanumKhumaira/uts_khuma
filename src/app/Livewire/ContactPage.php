<?php

namespace App\Livewire;

use App\Models\UtsContact;
use App\Models\UtsProfile;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ContactPage extends Component
{
    #[Validate('required|string|max:100')]
    public string $name = '';

    #[Validate('required|email|max:255')]
    public string $email = '';

    #[Validate('required|string|max:150')]
    public string $subject = '';

    #[Validate('required|string|min:10|max:2000')]
    public string $message = '';

    public function submit(): void
    {
        $validated = $this->validate();

        UtsContact::query()->create($validated);

        $this->reset([
            'name',
            'email',
            'subject',
            'message',
        ]);

        session()->flash('success', 'Pesan berhasil dikirim. Terima kasih sudah menghubungi saya.');
    }

    public function render(): View
    {
        $profile = UtsProfile::query()
            ->active()
            ->latest()
            ->first();

        return view('livewire.contact-page', [
            'profile' => $profile,
        ])->layout('components.layouts.portfolio', [
            'title' => 'Contact',
        ]);
    }
}