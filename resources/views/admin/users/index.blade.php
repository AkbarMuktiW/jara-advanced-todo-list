<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Pengguna</title>
</head>
<body>
<main>
    <h1>Pengelolaan Pengguna</h1>
    @if (session('success')) <p>{{ session('success') }}</p> @endif
    <a href="{{ route('admin.users.create') }}">Tambah akun</a>
    <table>
        <thead><tr><th>Nama</th><th>Email</th><th>Role</th><th>Project</th><th>Tugas</th><th>Aksi</th></tr></thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->owned_projects_count }}</td>
                <td>{{ $user->created_tasks_count }}</td>
                <td>
                    @if (! $user->is(auth()->user()))
                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    @else
                        Akun aktif
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</main>
</body>
</html>
