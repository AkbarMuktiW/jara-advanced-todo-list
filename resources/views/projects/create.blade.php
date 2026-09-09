<x-layouts.app title="Project Baru">
    <h1 class="mb-6 text-2xl font-bold">Project Baru</h1>
    <form method="POST" action="{{ route('projects.store') }}" class="max-w-xl space-y-4">@csrf
        <input name="name" placeholder="Nama project" class="w-full rounded border p-2" required>
        <textarea name="description" placeholder="Deskripsi" class="w-full rounded border p-2"></textarea>
        <button class="rounded bg-blue-600 px-4 py-2 text-white">Simpan</button>
    </form>
</x-layouts.app>
