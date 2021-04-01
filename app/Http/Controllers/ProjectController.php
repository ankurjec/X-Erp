<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index','show']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('dashboard.projects.index',compact('projects'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
    
    public function create()
    {
        return view('dashboard.projects.create');
    }
    
    
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        Project::create($request->all());
    
        return redirect()->route('projects.index')
                        ->with('success','Project created successfully.');
    }
    
    
    public function show(Project $project)
    {
        return view('dashboard.projects.show',compact('project'));
    }
    
    
    public function edit(Project $project)
    {
        return view('dashboard.projects.edit',compact('project'));
    }
    
    
    public function update(Request $request, Project $project)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $project->update($request->all());
    
        return redirect()->route('projects.index')
                        ->with('success','Project updated successfully');
    }
    
    
    public function destroy(Project $project)
    {
        $project->delete();
    
        return redirect()->route('projects.index')
                        ->with('success','Project deleted successfully');
    }
}
