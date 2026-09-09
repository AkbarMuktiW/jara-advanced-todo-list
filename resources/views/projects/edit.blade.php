<x-layouts.app title="Edit Project">
    <h1 class="mb-6 text-2xl font-bold">Edit Project</h1>
    <form method="POST" action="{{ route('projects.update', $project) }}" class="max-w-xl space-y-4">@csrf @method('PUT')
        <input name="name" value="{{ $project->name }}" class="w-full rounded border p-2" required>
        <textarea name="description" class="w-full rounded border p-2">{{ $project->description }}</textarea>
        <button class="rounded bg-blue-600 px-4 py-2 text-white">Simpan</button>
    </form>
</x-layouts.app>
