<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{
    public function getProject($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $project = Projects::where('id', '=', $id)->first();
        return view('project.project', compact('project'));
    }
    public function getProjectApi($id): JsonResponse
    {
        $project = Projects::where('id', '=', $id)->first();
        return response()->json($project);
    }
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('project.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'project_name' => 'required',
            'project_lead' => 'required',
            'project_start' => 'required',
        ]);

        $name = $request->input('project_name');
        $description = $request->input('project_description');
        $lead = $request->input('project_lead');
        $members = $request->input('project_member');
        $start = $request->input('project_start');
        $end = $request->input('project_end');


        //TODO include members to ProjectMembers

        $project = new Projects;
        $project->name = $name;
        $project->description = $description;
        $project->project_lead = $lead;
        $project->start = $start;
        $project->end = $end;
        $project->user_id = Auth::id();

        if (!$project->save()) {
            $request->session()->flash('alert-danger', 'There was an error saving the project! Please try again.');
            return redirect()->route('project.create');
        } else {
            return redirect()->route('dashboard');
        }

    }
    public function update(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('project.create');
    }
    public function delete($id): RedirectResponse
    {
        Projects::where('id', '=', $id)->delete();
        return redirect()->route('dashboard');
    }
}
