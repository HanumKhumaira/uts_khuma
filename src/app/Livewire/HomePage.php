<?php

namespace App\Livewire;

use App\Models\UtsProfile;
use App\Models\UtsProject;
use Illuminate\View\View;
use Livewire\Component;

class HomePage extends Component
{
    public function render(): View
    {
        $profile = UtsProfile::query()
            ->active()
            ->latest()
            ->first();

        $featuredProjects = UtsProject::query()
            ->published()
            ->featured()
            ->ordered()
            ->take(3)
            ->get();

        return view('livewire.home-page', [
            'profile' => $profile,
            'featuredProjects' => $featuredProjects,
        ])->layout('components.layouts.portfolio', [
            'title' => 'Home',
        ]);
    }
}