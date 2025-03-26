@extends('layouts.frontend')

@section('content')
<div class="container">
    <h4>Riwayat Jabatan - {{ $histories->first()->nama ?? 'Pegawai' }}</h4>
    <a href="{{ url('pegawai') }}" class="btn btn-danger float-start">Back</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Jabatan</th>
                <th>Tanggal Aktif Jabatan</th>
                <th>Tanggal Masuk</th>
                <th>Status Karyawan</th>
                <th>Is Active</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($histories as $history)
            <tr>
                <td>{{ $history->jabatan }}</td>
                <td>{{ $history->tglaktif_jabatan }}</td>
                <td>{{ $history->tglmasuk_jabatan }}</td>
                <td>{{ $history->status }}</td>
                <td>{{ $history->isactive }}</td>
                <td>
                    <a href="{{ route('pegawai.edit', $history->id) }}" class="btn btn-success">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
