<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Aura</title>
</head>
<body>

    <h1>Aspirasi & Usulan Responsif Anda</h1>
    <hr>

    <nav style="display: flex; align-items: center; gap: 10px;">
        <a href="{{ route('aspirasi.index') }}">Home</a>

        @if(auth()->user()->role === 'admin')
            <a href="{{ route('users.index') }}">Management User</a>
        @elseif(auth()->user()->role === 'user')
            <a href="{{ route('aspirasi.create') }}">Buat Aspirasi Baru</a>
        @endif

        <p style="margin: 0;">Hai, {{ auth()->user()->name }}</p>

        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>
    
    <hr>
    <h2>{{ $title ?? '' }}</h2>
    @yield('content')
</body>
</html>