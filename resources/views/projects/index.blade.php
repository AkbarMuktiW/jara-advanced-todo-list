<x-layouts.app title="Projects">
    <div class="mb-6 flex items-center justify-between"><h1 class="text-2xl font-bold">Project Saya</h1><a href="{{ route('projects.create') }}" class="rounded bg-blue-600 px-4 py-2 text-white">Project Baru</a></div>
    <div class="grid gap-4 md:grid-cols-2">
        @forelse ($projects as $project)
            <a href="{{ route('projects.show', $project) }}" class="rounded bg-white p-5 shadow">
                <h2 class="font-bold">{{ $project->name }}</h2><p class="text-sm text-gray-600">{{ $project->description }}</p>
                <span class="mt-3 block text-sm">{{ $project->tasks_count }} tugas</span>
            </a>
        @empty <p>Belum ada project.</p> @endforelse
    </div>
</x-layouts.app>
