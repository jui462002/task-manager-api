<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // List all tasks (Admin only)
    public function index(Request $request)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        
        return response()->json(Task::with(['project', 'user'])->get());
    }

    // Get current user's tasks
    public function userTasks(Request $request)
    {
        $user = $request->user();
        return response()->json(Task::where('user_id', $user->id)->with(['project', 'user'])->get());
    }

    // Create new task (Admin only)
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        return response()->json($task->load(['project', 'user']), 201);
    }

    // Show single task
    public function show(Task $task)
    {
        return response()->json($task->load(['project', 'user']));
    }

    // Update task
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return response()->json($task->load(['project', 'user']));
    }

    // Delete task (Admin only)
    public function destroy(Request $request, Task $task)
    {
        // Verify admin
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        
        $task->delete();
        return response()->json(null, 204);
    }
}
