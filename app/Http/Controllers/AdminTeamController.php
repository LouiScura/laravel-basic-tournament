<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminTeamController extends Controller
{
    public function create(){
        return view('admin.teams.create');
    }

    public function store(StoreTeamRequest $request)
    {
        // Retrieve the validated input data....
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


}
