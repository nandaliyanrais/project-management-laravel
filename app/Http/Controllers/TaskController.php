<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Metode untuk menampilkan tugas dari suatu proyek
    public function index($projectId)
    {
        $project = Project::findOrFail($projectId);
        $tasks = $project->tasks;
        return view('tasks.index', compact('project', 'tasks'));
    }

    // Metode untuk menampilkan formulir membuat tugas
    public function create($projectId)
    {
        return view('tasks.create', compact('projectId'));
    }

    // Metode untuk menyimpan tugas yang baru dibuat
    public function store(Request $request, $projectId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Task::create([
            'project_id' => $projectId,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('tasks.index', $projectId)->with('success', 'Task created successfully.');
    }

    // Metode untuk menampilkan formulir mengedit tugas
    public function edit($projectId, $taskId)
    {
        $task = Task::findOrFail($taskId);
        return view('tasks.edit', compact('task'));
    }

    // Metode untuk menyimpan perubahan pada tugas yang sudah diedit
    public function update(Request $request, $projectId, $taskId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = Task::findOrFail($taskId);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('tasks.index', $projectId)->with('success', 'Task updated successfully.');
    }

    // Metode untuk menghapus sebuah tugas
    public function destroy($projectId, $taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->delete();

        return redirect()->route('tasks.index', $projectId)->with('success', 'Task deleted successfully.');
    }
}
