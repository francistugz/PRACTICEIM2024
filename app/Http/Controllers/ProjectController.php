<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Client;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index()
    {
        $projects = Project::with('client')->get(); // Eager load clients for performance
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        $clients = Client::all(); // Fetch clients for the dropdown
        return view('projects.create', compact('clients'));
    }

    /**
     * Store a newly created project in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'project_name' => 'required|string|max:255',
            'address' => 'required|string',
            'project_status' => 'required|in:pending,in_progress,completed,cancelled',
        ]);

        Project::create($validated);

        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    /**
     * Show the form for editing a project.
     */
    public function edit(Project $project)
    {
        $clients = Client::all(); // Fetch clients for the dropdown
        return view('projects.edit', compact('project', 'clients'));
    }

    /**
     * Update the specified project in the database.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'project_name' => 'required|string|max:255',
            'address' => 'required|string',
            'project_status' => 'required|in:pending,in_progress,completed,cancelled',
        ]);

        $project->update($validated);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified project from the database.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
}
