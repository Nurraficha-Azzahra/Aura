@extends('layouts.app')

@section('content')

@if(session('success'))
    <p style="color:mediumvioletred; margin-top:15px;">{{ session('success') }}</p>
@endif

<table border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>#</th>
            <th>Tanggal</th>
            @if (auth()->user()->role == 'admin')
            <th>Nama</th>
            <th>NIS</th>
            <th>Kelas</th>
            @endif
            <th>Judul</th>
            <th>Kategori</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($aspirasi as $aspirasi)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $aspirasi->created_at->format('d-m-Y') }}</td>
            @if(auth()->user()->role == 'admin')
            <td>{{ $aspirasi->user->name }}</td>
            <td>{{ $aspirasi->user->nis }}</td>
            <td>{{ $aspirasi->user->kelas }}</td>
            @endif
            <td>
                <a href="{{ route('aspirasi.show', $aspirasi->id) }}">
                    {{ $aspirasi->title }}
                </a>
            </td>
            <td>{{ $aspirasi->kategori->nama_kategori ?? '-' }}</td>
            <td>
                @if(auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('aspirasi.updateStatus', $aspirasi) }}">
                    @csrf
                    <select name="status" onchange="this.form.submit()">
                        <option value="diajukan" {{ $aspirasi->status == 'diajukan' ? 'seleted' : '' }}>Diajukan</option>
                        <option value="diproses" {{ $aspirasi->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="ditolak" {{ $aspirasi->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        <option value="diterima" {{ $aspirasi->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="selesai" {{ $aspirasi->sttaus == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
            </form>
            @else
            {{ $aspirasi->status }}
            @endif
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection