<?php

namespace App\Livewire;

use App\Models\ProjectTeam;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;
use App\Models\Projects;


class EditProject extends ModalComponent
{
    public Projects $project;

    public function mount(): void
    {
        Gate::authorize('update', $this->project);
    }
    /*public function mount($projectId = null): void
    {
        if ($projectId) {
            $project = Projects::find($projectId);
            $this->projectId = $project->id;
            $this->name = $project->name;
            $this->description = $project->description;
            $this->project_lead = $project->project_lead;
            $this->start = $project->start;
            $this->end = $project->end;
            $members = ProjectTeam::where('project_id', '=', $projectId);
            $this->members = $members;
        }
    }*/

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.edit-project');
    }

    public function updateProject(): void
    {
        $project = Projects::find($this->projectId);
        $project->save();
        $this->members =
        $this->dispatch('projectUpdated');
    }
}
