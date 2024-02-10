<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('Admin.Project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        //dati da salvare
        $data = $request->all();

        $project = new Project();
        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->code = $data['code'];
        $project->last_commit = $data['last_commit'];

        //salviamo i dati
        $project->save();
        //reindiriziamo alla pagina principale
        return redirect()->route('admin.project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //tramite id mostriamo la pagina show.blade.php con i dati del progetto tramite id
        $project = Project::find($id);
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // mostriamo la pagina edit.blade.php 
        return view('admin.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        //dati da salvare
        $data = $request->all();

        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->code = $data['code'];
        $project->last_commit = $data['last_commit'];

        //salviamo i dati
        $project->save();
        //reindiriziamo alla pagina principale
        return redirect()->route('admin.project.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        //metodo per eliminare 
        $project->delete();

        //reindiriziamo alla pagina principale
        return redirect()->route('admin.project.index');
    }
}
