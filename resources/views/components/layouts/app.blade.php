<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'JARA' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
<nav class="flex items-center justify-between border-b bg-white px-6 py-4">
    <a href="{{ route('projects.index') }}" class="font-bold">JARA</a>
    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-sm text-red-600">Logout</button>
        </form>
    @endauth
</nav>
<main class="mx-auto max-w-5xl p-6">
    @if (session('success')) <div class="mb-4 rounded bg-green-100 p-3 text-green-800">{{ session('success') }}</div> @endif
    @if ($errors->any()) <div class="mb-4 rounded bg-red-100 p-3 text-red-800"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div> @endif
    {{ $slot }}
</main>
</body>
</html>
