@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>LAPORAN DATA PEGAWAI
                            @if (Auth::guard('admin')->check())
                            <a href="{{ url('pegawai/create') }}" class="btn btn-primary float-end">Add New Pegawai</a>
                            @endif
                        </h4>
                        @if (Auth::guard('admin')->check())
                            <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-stiped table-bordered">
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pegawai as $pegawai)
                                <tr>
                                    <td>{{$pegawai->nip}}</td>
                                    <td>{{$pegawai->nama}}</td>
                                    <td>{{$pegawai->kelamin}}</td>
                                    <td>{{$pegawai->jabatan}}</td>
                                    <td>{{$pegawai->tglaktif_jabatan}}</td>
                                    <td>{{$pegawai->tglmasuk_jabatan}}</td>
                                    <td>{{$pegawai->status}}</td>
                                    <td>{{$pegawai->isactive}}</td>
                                    
                                    <td>
                                        @if (Auth::guard('admin')->check())
                                            <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-success">Edit</a>
                                        @endif
                                        <a href="{{ route('pegawai.show', $pegawai->id) }}" class="btn btn-success">Show</a>
                                        @if (Auth::guard('admin')->check())
                                        <!-- Tombol untuk kelola jabatan lama -->
                                        <a href="{{ route('pegawai.history', $pegawai->nip) }}" class="btn btn-info">Kelola Jabatan</a>
                                        @endif
                                        @if (Auth::guard('admin')->check())
                                            <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        @endif
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