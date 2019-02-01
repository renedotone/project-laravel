<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        

        return view('projects.index', ['projects' => $projects]);
    }


    public function create()
    {
        return view('projects.create');

    }


    public function show($id)
    {
        $project = Project::findorFail($id);

        return view('projects.show', compact('project'));
    }


    public function store()
    {
        $project = new Project();

        $project->title = request('title');
        $project->description = request('description');
        
        $project->save();

        return redirect('/projects');
    }


    public function edit($id)
    {
        $project = Project::findorFail($id);
        return view('projects.edit', compact('project'));
    }


    public function update($id)
    {
        $project = Project::findorFail($id);

        $project->title = request('title');
        $project->description = request('description');

        $project->save();

        return redirect('/projects');
    }


    public function destroy($id)
    {
        Project::findorFail($id)->delete();

        return redirect('/projects');
    }


}
