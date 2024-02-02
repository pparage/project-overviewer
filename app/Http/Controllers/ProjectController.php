<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\ProjectTeam;
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

        $projectId = $request->input('project_id');
        $name = $request->input('project_name');
        $description = $request->input('project_description');
        $lead = $request->input('project_lead');
        $members = $request->input('project_member', []);

        $start = $request->input('project_start');
        $end = $request->input('project_end');
        $submit = $request->input('submit'); // Get the value of the submit input
        if ($submit == 'Create') {
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
            }
            $projectId = $project->id;
        } // Handle the save action
        elseif ($submit == 'Save') {

            $projectId = $request->input('project_id');
            $project = Projects::find($projectId);

            if ($project) {
                $project->name = $name;
                $project->description = $description;
                $project->project_lead = $lead;
                $project->start = $start;
                $project->end = $end;

                if (!$project->save()) {
                    $request->session()->flash('alert-danger', 'There was an error updating the project! Please try again.');
                    return redirect()->back(); // Redirect back to the previous page
                }
            } else {
                $request->session()->flash('alert-danger', 'Project not found.');
                return redirect()->back();
            }
        }
        if (isset($projectId)) {
            ProjectTeam::where('project_id', '=', $projectId)->delete();
        }

        foreach ($members as $member) {
            $projectTeam = new ProjectTeam();
            $projectTeam->project_id = $projectId;
            $projectTeam->team_member = $member;
            $projectTeam->save();
        }

        // Redirect after successful create or save
        return redirect()->route('dashboard');

    }

    public function edit(Request $request, $id): View|Application|Factory|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {

        $project = Projects::where('id', '=', $id)->first();
        if ($project->user_id == Auth::id()) {
            return view('project.edit', compact('project'));
        } else {
            $request->session()->flash('alert-danger', 'You have no rights to edit this project.');
            return redirect()->back(); // Redirect back to the previous page

        }

    }

    public function delete($id): RedirectResponse
    {
        Projects::where('id', '=', $id)->where('user_id', '=', Auth::id())->delete();
        return redirect()->route('dashboard');
    }
}
