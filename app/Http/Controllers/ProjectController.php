<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // List all projects
    public function index()
    {
        return response()->json(Project::with('tasks.user')->get());
    }

    // Create new project (Admin only)
    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->validated());
        return response()->json($project->load('tasks'), 201);
    }

    // Show single project
    public function show(Project $project)
    {
        return response()->json($project->load('tasks.user'));
    }

    // Update project (Admin only)
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        return response()->json($project->load('tasks.user'));
    }

    // Delete project (Admin only)
    public function destroy(Request $request, Project $project)
    {
        // Verify admin
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        
        $project->delete();
        return response()->json(null, 204);
    }
}
