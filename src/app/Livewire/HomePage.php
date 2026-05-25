<?php

namespace App\Livewire;

use App\Models\UtsProfile;
use App\Models\UtsProject;
use App\Models\UtsSkill;
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

        $skills = UtsSkill::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('livewire.home-page', [
            'profile' => $profile,
            'featuredProjects' => $featuredProjects,
            'skills' => $skills,
        ])->layout('components.layouts.portfolio', [
            'title' => 'Home',
        ]);
    }
}