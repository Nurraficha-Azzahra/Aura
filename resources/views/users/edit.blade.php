@extends('layouts.app')

@section('content')
<h1>Edit User</h1>

<form method="POST" action="{{ route('users.update', $user)}}">
    @csrf
    @method('PUT')
    <table cellpadding="5" cellspacing="0">
        <tr>
            <td><label>Username:</label></td>
            <td><input type="text" name="username" value="{{ old('username', $user->username) }}" required></td>
        </tr>

        <tr>
            <td><lable>Nama:</lable></td>
            <td><input type="text" name="name" value="{{ old('name', $user->name )}}" required></td>
        </tr>
        
        <tr>
            <td><lable>NIS:</lable></td>
            <td><input type="text" name="nis" value="{{ old('nis', $user->nis) }}" required></td>
        </tr>

        <tr>
            <td><label>Kelas:</label></td>
            <td><input type="text" name="kelas" value="{{ old('kelas', $user->kelas) }}" required></td>
        </tr>

        <tr>
            <td><label>Password:</label></td>
            <td><input type="password" name="password"></td>
        </tr>

        <tr>
            <td><label>Konfigurasi Password:</label></td>
            <td><input type="password" name="password_confirmation"></td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit">Update</button>
            </td>
        </tr>
    </table>
</form>
@endsection
