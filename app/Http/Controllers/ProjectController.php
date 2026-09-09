<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        $projects = Project::query()
            ->where('owner_id', $user->id)
            ->orWhereHas('members', fn ($query) => $query->whereKey($user->id))
            ->with('owner')
            ->withCount('tasks')
            ->latest()
            ->get();

        return view('projects.index', compact('projects'));
    }

    public function create(): View
    {
        return view('projects.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $project = $request->user()->ownedProjects()->create($data);
        $project->members()->attach($request->user()->id);

        return redirect()->route('projects.show', $project)->with('success', 'Project berhasil dibuat.');
    }

    public function show(Request $request, Project $project): View
    {
        abort_unless($this->canAccess($request, $project), 403);

        $project->load(['owner', 'members', 'tasks.assignees']);

        return view('projects.show', compact('project'));
    }

    public function edit(Request $request, Project $project): View
    {
        abort_unless($project->owner_id === $request->user()->id, 403);

        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        abort_unless($project->owner_id === $request->user()->id, 403);

        $project->update($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]));

        return redirect()->route('projects.show', $project)->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Request $request, Project $project): RedirectResponse
    {
        abort_unless($project->owner_id === $request->user()->id, 403);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project berhasil dihapus.');
    }

    private function canAccess(Request $request, Project $project): bool
    {
        return $project->owner_id === $request->user()->id
            || $project->members()->whereKey($request->user()->id)->exists();
    }
}
