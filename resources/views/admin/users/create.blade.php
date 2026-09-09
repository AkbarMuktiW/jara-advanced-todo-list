<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Tambah Pengguna</title>
</head>
<body>
<main>
    <h1>Tambah Akun Pengguna</h1>
    @if ($errors->any())
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    @endif
    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <label>Nama <input name="name" value="{{ old('name') }}" required></label>
        <label>Email <input name="email" type="email" value="{{ old('email') }}" required></label>
        <label>Password <input name="password" type="password" required></label>
        <label>Konfirmasi password <input name="password_confirmation" type="password" required></label>
        <label>Role
            <select name="role" required>
                <option value="USER">USER</option>
                <option value="ADMIN">ADMIN</option>
            </select>
        </label>
        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('admin.users.index') }}">Kembali</a>
</main>
</body>
</html>
