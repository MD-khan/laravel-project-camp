<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function store()
    {
        #dd("here we are");
        // validae
        $attributes = request()->validate(
            ['title'=> 'required'],
            ['description' => 'required']
        );

        $attributes['owner_id'] = auth()->id();

        #dd($attributes);

        // persist
        Project::create($attributes);

        # Redirect
        return redirect('/projects');
    }


    

    public function show(Project $project)
    {
        #$project = Project::findOrFail(request('project'));
        return view('projects.show', compact('project'));
    }
}
