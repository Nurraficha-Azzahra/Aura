@extends('layouts.app')

@section('content')
<h1>Tambah User Baru</h1>

 <form method="POST" action="{{ route('users.store') }}">
    @csrf
    <table cellpadding="5" cellspacing="0">
        <tr>
            <td><label>Username:</label></td>
            <td><input type="text" name="username" value="{{ old('username') }}" required></td>
        </tr>

        <tr>
            <td><label>Nama:</label></td>
            <td><input type="text" name="name" value="{{ old('name') }}" required></td>
        </tr>

        <tr>
            <td><label>NIS:</label></td>
            <td><input type="text" name="nis" value="{{ old('nis') }}"></td>
        </tr>

        <tr>
            <td><label>Kelas:</label></td>
            <td><input type="text" name="kelas" value="{{ old('kelas') }}"></td>
        </tr>
        
        <tr>
            <td><lable>Password:</lable></td>
            <td><input type="password" name="password" required></td>
        </tr>

        <tr>
            <td><label>Konfirmasi Password:</label></td>
            <td><input type="password" name="password_confirmation" required></td>
        </tr>

        <tr>
            <td colspan="2">
            <button type="submit">Simpan</button>
            </td>
        </tr>
    </table>
 </form>
 @endsection