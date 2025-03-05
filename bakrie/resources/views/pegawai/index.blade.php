@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>LAPORAN DATA PEGAWAI
                            <a href="{{ url('pegawai/create') }}" class="btn btn-primary float-end">Add New Pegawai</a>
                        </h4>
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
                                    <td>{{$pegawai->id}}</td>
                                    <td>{{$pegawai->nama}}</td>
                                    <td>{{$pegawai->kelamin}}</td>
                                    <td>{{$pegawai->jabatan}}</td>
                                    <td>{{$pegawai->tglaktif_jabatan}}</td>
                                    <td>{{$pegawai->tglmasuk_jabatan}}</td>
                                    <td>{{$pegawai->status}}</td>
                                    <td>{{$pegawai->isactive}}</td>
                                    <td>
                                        <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('pegawai.show', $pegawai->id) }}" class="btn btn-success">Show</a>
                                        <a href="{{ route('pegawai.destroy', $pegawai->id) }}" class="btn btn-success">Delete</a>
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