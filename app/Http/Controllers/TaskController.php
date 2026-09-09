<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Tampilkan daftar task dalam satu project, dengan filter & sorting.
     */
    public function index(Request $request, Project $project)
    {
        $query = $project->tasks();

        if ($request->filled('status')) {
            $query->status($request->status);
        }

        if ($request->filled('priority')) {
            $query->priority($request->priority);
        }

        if ($request->filled('sort') && $request->sort === 'deadline') {
            $query->orderByDeadline();
        } else {
            $query->latest();
        }

        $tasks = $query->get();
        $progress = $project->progress();

        return view('tasks.index', compact('project', 'tasks', 'progress'));
    }

    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:LOW,MEDIUM,HIGH',
            'deadline' => 'nullable|date',
        ]);

        $validated['project_id'] = $project->id;
        $validated['created_by'] = auth()->id();
        $validated['status'] = 'NOT_STARTED';

        Task::create($validated);

        return redirect()
            ->route('projects.tasks.index', $project)
            ->with('success', 'Task berhasil ditambahkan.');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:LOW,MEDIUM,HIGH',
            'deadline' => 'nullable|date',
        ]);

        $task->update($validated);

        return redirect()
            ->route('projects.tasks.index', $task->project_id)
            ->with('success', 'Task berhasil diperbarui.');
    }

    public function destroy(Task $task)
    {
        $projectId = $task->project_id;
        $task->delete();

        return redirect()
            ->route('projects.tasks.index', $projectId)
            ->with('success', 'Task berhasil dihapus.');
    }

    public function updateStatus(Request $request, Task $task)
    {
        $validated = $request->validate([
            'status' => 'required|in:NOT_STARTED,IN_PROGRESS,COMPLETED',
        ]);

        $task->update($validated);

        return redirect()
            ->back()
            ->with('success', 'Status task diperbarui.');
    }
}