<x-layouts.app title="Edit Tugas">
    <h1 class="mb-6 text-2xl font-bold">Edit Tugas</h1>
    <form method="POST" action="{{ route('projects.tasks.update', [$project, $task]) }}" class="max-w-xl space-y-4">@csrf @method('PUT')
        <input name="title" value="{{ $task->title }}" class="w-full rounded border p-2" required><textarea name="description" class="w-full rounded border p-2">{{ $task->description }}</textarea>
        <select name="priority" class="w-full rounded border p-2">@foreach (['LOW'=>'Rendah','MEDIUM'=>'Sedang','HIGH'=>'Tinggi'] as $value => $label)<option value="{{ $value }}" @selected($task->priority === $value)>{{ $label }}</option>@endforeach</select>
        <select name="status" class="w-full rounded border p-2">@foreach (['NOT_STARTED'=>'Belum Dimulai','IN_PROGRESS'=>'Sedang Dikerjakan','COMPLETED'=>'Selesai'] as $value => $label)<option value="{{ $value }}" @selected($task->status === $value)>{{ $label }}</option>@endforeach</select>
        <input name="deadline" type="datetime-local" value="{{ $task->deadline?->format('Y-m-d\TH:i') }}" class="w-full rounded border p-2"><button class="rounded bg-blue-600 px-4 py-2 text-white">Simpan</button>
    </form>
</x-layouts.app>
