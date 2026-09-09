<x-layouts.app title="Register">
    <h1 class="mb-6 text-2xl font-bold">Registrasi</h1>
    <form method="POST" action="{{ route('register.store') }}" class="max-w-md space-y-4">
        @csrf
        <input name="name" value="{{ old('name') }}" placeholder="Nama" class="w-full rounded border p-2" required>
        <input name="email" type="email" value="{{ old('email') }}" placeholder="Email" class="w-full rounded border p-2" required>
        <input name="password" type="password" placeholder="Password" class="w-full rounded border p-2" required>
        <input name="password_confirmation" type="password" placeholder="Konfirmasi password" class="w-full rounded border p-2" required>
        <button class="rounded bg-blue-600 px-4 py-2 text-white">Daftar</button>
    </form>
</x-layouts.app>
