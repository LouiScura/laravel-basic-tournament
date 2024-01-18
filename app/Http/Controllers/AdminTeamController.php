<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminTeamController extends Controller
{

    public function index(){

        $teams = Team::orderBy('name', 'asc')->paginate(10);

        return view('admin.teams.index', [
            'teams' => $teams
        ]);
    }

    public function create(){
        return view('admin.teams.create', [
            'teams' => Team::orderBy('name', 'asc')->get()
        ]);
    }

    public function store(StoreTeamRequest $request)
    {
        $validated = $request->validated();
        $validatedImage = $validated['team_logo']->store('team-logos', 'public');

        $team = new Team();

        $team->name = $validated['team_name'];
        $team->town = $validated['team_town'];
        $team->logo = $validatedImage;

        $team->save();

        return redirect()->back()->with([
            'message' => 'Team added successfully!',
            'status' => 'success'
        ]);
    }
    public function edit(Team $team)
    {
        return view('admin.teams.edit', [
            'team' => $team
        ]);
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        $validated = $request->validated();

        if ($request->hasFile('team_logo')) {
            $validatedImage = $request->file('team_logo')->store('team-logos', 'public');
            $team->logo = $validatedImage;
        }

        $team->name = $validated['team_name'];
        $team->town = $validated['team_town'];

        $team->save();

        return redirect()->back()->with([
            'message' => 'Team updated successfully!',
            'status' => 'success'
        ]);

    }

    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('teams.index')->with('message', 'Team successfully deleted.');
    }

}
