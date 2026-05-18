<?php

namespace App\Livewire;

use App\Models\UtsProject;
use Illuminate\View\View;
use Livewire\Component;

class ProjectIndex extends Component
{
    public string $search = '';

    public string $status = '';

    public function render(): View
    {
        $projects = UtsProject::query()
            ->published()
            ->when($this->search !== '', function ($query): void {
                $query->where(function ($query): void {
                    $query
                        ->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('short_description', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->status !== '', function ($query): void {
                $query->where('status', $this->status);
            })
            ->ordered()
            ->get();

        return view('livewire.project-index', [
            'projects' => $projects,
        ])->layout('components.layouts.portfolio', [
            'title' => 'Projects',
        ]);
    }
}