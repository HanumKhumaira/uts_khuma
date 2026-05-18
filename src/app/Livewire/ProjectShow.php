<?php

namespace App\Livewire;

use App\Models\UtsProject;
use Illuminate\View\View;
use Livewire\Component;

class ProjectShow extends Component
{
    public UtsProject $project;

    public function mount(UtsProject $project): void
    {
        abort_if(
            $project->published_at === null || $project->published_at->isFuture(),
            404
        );

        $this->project = $project;
    }

    public function render(): View
    {
        return view('livewire.project-show', [
            'project' => $this->project,
        ])->layout('components.layouts.portfolio', [
            'title' => $this->project->title,
        ]);
    }
}