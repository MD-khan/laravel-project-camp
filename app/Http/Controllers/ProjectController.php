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
        // validated
        // persist
        Project::create(request(['title', 'description']));


        # Redirect
        return redirect('/projects');
    }
}
