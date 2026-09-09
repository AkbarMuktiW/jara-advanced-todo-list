<x-layouts.app title="Tugas Baru">
    <h1 class="mb-6 text-2xl font-bold">Tugas Baru</h1>
    <form method="POST" action="{{ route('projects.tasks.store', $project) }}" class="max-w-xl space-y-4">@csrf
        <input name="title" placeholder="Judul tugas" class="w-full rounded border p-2" required><textarea name="description" placeholder="Deskripsi" class="w-full rounded border p-2"></textarea>
        <select name="priority" class="w-full rounded border p-2"><option value="LOW">Rendah</option><option value="MEDIUM" selected>Sedang</option><option value="HIGH">Tinggi</option></select>
        <select name="status" class="w-full rounded border p-2"><option value="NOT_STARTED">Belum Dimulai</option><option value="IN_PROGRESS">Sedang Dikerjakan</option><option value="COMPLETED">Selesai</option></select>
        <input name="deadline" type="datetime-local" class="w-full rounded border p-2"><button class="rounded bg-blue-600 px-4 py-2 text-white">Simpan</button>
    </form>
</x-layouts.app>
