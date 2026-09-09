<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function create(Request $request, Project $project): View
    {
        $this->authorizeAccess($request, $project);

        return view('tasks.create', compact('project'));
    }

    public function store(Request $request, Project $project): RedirectResponse
    {
        $this->authorizeAccess($request, $project);
        $task = $project->tasks()->create($this->validated($request) + ['created_by' => $request->user()->id]);

        return redirect()->route('projects.show', $project)->with('success', 'Tugas berhasil dibuat.');
    }

    public function edit(Request $request, Project $project, Task $task): View
    {
        $this->authorizeTask($request, $project, $task);

        return view('tasks.edit', compact('project', 'task'));
    }

    public function update(Request $request, Project $project, Task $task): RedirectResponse
    {
        $this->authorizeTask($request, $project, $task);
        $task->update($this->validated($request));

        return redirect()->route('projects.show', $project)->with('success', 'Tugas berhasil diperbarui.');
    }

    public function destroy(Request $request, Project $project, Task $task): RedirectResponse
    {
        $this->authorizeTask($request, $project, $task);
        $task->delete();

        return back()->with('success', 'Tugas berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority' => ['required', 'in:LOW,MEDIUM,HIGH'],
            'status' => ['required', 'in:NOT_STARTED,IN_PROGRESS,COMPLETED'],
            'deadline' => ['nullable', 'date'],
        ]);
    }

    private function authorizeTask(Request $request, Project $project, Task $task): void
    {
        $this->authorizeAccess($request, $project);
        abort_unless($task->project_id === $project->id, 404);
    }

    private function authorizeAccess(Request $request, Project $project): void
    {
        abort_unless(
            $project->owner_id === $request->user()->id
            || $project->members()->whereKey($request->user()->id)->exists(),
            403
        );
    }
}
