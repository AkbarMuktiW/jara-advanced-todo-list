<x-layouts.app title="Login">
    <h1 class="mb-6 text-2xl font-bold">Login</h1>
    <form method="POST" action="{{ route('login.store') }}" class="max-w-md space-y-4">
        @csrf
        <input name="email" type="email" value="{{ old('email') }}" placeholder="Email" class="w-full rounded border p-2" required>
        <input name="password" type="password" placeholder="Password" class="w-full rounded border p-2" required>
        <label class="block"><input name="remember" type="checkbox"> Ingat saya</label>
        <button class="rounded bg-blue-600 px-4 py-2 text-white">Login</button>
    </form>
    <a href="{{ route('register') }}" class="mt-4 inline-block text-blue-600">Buat akun</a>
</x-layouts.app>
