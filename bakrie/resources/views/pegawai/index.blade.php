@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <h4>LAPORAN DATA PEGAWAI</h4>
            </div>
            <div class="col-md-6 text-end">
                @if (Auth::guard('admin')->check())
                    <a href="{{ url('pegawai/create') }}" class="btn btn-primary btn-sm me-2">Add New Pegawai</a>
                    <a href="{{ url('admin/dashboard') }}" class="btn btn-primary btn-sm">Dashboard</a>
                @else
                    <a href="{{ url('dashboard') }}" class="btn btn-primary btn-sm">Dashboard</a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jabatan</th>
                                    <th>Tanggal Aktif Jabatan</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Status Karyawan</th>
                                    <th>Is_Active</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pegawai as $pegawai)
                                    <tr>
                                        <td>{{ $pegawai->nip }}</td>
                                        <td>{{ $pegawai->nama }}</td>
                                        <td>{{ $pegawai->kelamin }}</td>
                                        <td>{{ $pegawai->jabatan }}</td>
                                        <td>{{ $pegawai->tglaktif_jabatan }}</td>
                                        <td>{{ $pegawai->tglmasuk_jabatan }}</td>
                                        <td>{{ $pegawai->status }}</td>
                                        <td>{{ $pegawai->isactive }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Actions">
                                                @if (Auth::guard('admin')->check())
                                                    <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                                @endif
                                                <a href="{{ route('pegawai.show', $pegawai->id) }}" class="btn btn-success btn-sm me-2">Show</a>
                                                @if (Auth::guard('admin')->check())
                                                    <a href="{{ route('pegawai.newjabatan', $pegawai->nip) }}" class="btn btn-primary btn-sm me-2">Tambah Jabatan Baru</a>
                                                @endif
                                                @if (Auth::guard('admin')->check())
                                                    <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
