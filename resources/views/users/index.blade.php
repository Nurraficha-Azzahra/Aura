@extends('layouts.app')

@section('content')
<h1>Management User</h1>

<a href="{{ route('users.create') }}"
    style="display: inline-block;padding:8px 12px;background: white;color:black;text-decoration:none;border:1px solid black;border-radius:4px;margin-bottom:15px"> 
    + Tambah User Baru
</a>

@if(session('success'))
    <p style="color: green; margin-top:15px;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Username</th>
            <th>NIS</th>
            <th>Kelas</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->nis }}</td>
            <td>{{ $user->kelas }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <a href="{{ route('users.edit', $user )}}">Edit</a>
                <form action="{{ route('users.destroy', $user )}}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background:none;border:none;color:red;cursor:pointer;">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection



