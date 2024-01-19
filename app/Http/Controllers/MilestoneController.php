<?php

namespace App\Http\Controllers;

use App\Livewire\Project;
use App\Models\Milestone;
use App\Models\Projects;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MilestoneController extends Controller
{
    public function getMilestone($id): View|Application|Factory
    {
        $milestone = Milestone::where('id', '=', $id)->first();
        return view('project.project', compact('milestone'));
    }
    public function getMilestoneApi($id)
    {
        $project = Milestone::where('id', '=', $id)->first();
        return response()->json($project);
    }
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $projects = Projects::all();
        return view('milestone.create', compact('projects'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'milestone_name' => 'required',
            'project_end' => 'required',
            'selected_project' => 'required',
        ]);

        $name = $request->input('milestone_name');
        $description = $request->input('milestone_description');
        $project_id = $request->input('selected_project');
        $end = $request->input('project_end');


        //TODO include members to ProjectMembers

        $milestone = new Milestone;
        $milestone->name = $name;
        $milestone->description = $description;
        $milestone->end = $end;
        $milestone->project_id = $project_id;

        if (!$milestone->save()) {
            $request->session()->flash('alert-danger', 'There was an error saving the project! Please try again.');
            return redirect()->route('milestone.create');
        } else {
            return redirect()->route('project.single',["id"=>$project_id]);
        }

    }
    public function update(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('milestone.create');
    }
    public function delete($id): RedirectResponse
    {
        $milestone = Milestone::find($id)->get();
        Milestone::find($id)->delete();
        return redirect()->route('project.single',["id"=> $milestone->project_id]);
    }
}
