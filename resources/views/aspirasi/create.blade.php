@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('aspirasi.store') }}" enctype="multipart/form-data">
    @csrf

    <table cellpadding="5">
        <tr>
            <td>Judul</td>
            <td>
                <input type="text" name="title" value="{{ old('title') }}" required>
            </td> 
        </tr>
        <tr>
            <td>Kategori</td>
            <td>
                <select name="kategori_id" required>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}"
                            {{ old('kategori_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>
        
        <tr>
            <td>Deskripsi</td>
            <td>
                <input type="text" name="description" value="{{ old('description') }}">
            </td>
        </tr>

        <tr>
            <td>Foto</td>
            <td>
                <input type="file" name="foto" accept="image/*">
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit">Kirim</button>
            </td>
        </tr>
    </table>
</form>
@endsection