@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Pegawai
                            <a href="{{ url('pegawai') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div> 
                    <div class="card-body">
                        <div class="mb-3">
                            <label>NIP</label>
                            <p>
                                {{ $pegawai->id }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Nama</label>
                            <p>
                                {!! $pegawai->nama !!}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Jenis Kelamin</label>
                            <p>
                                {!! $pegawai->kelamin !!}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Jabatan</label>
                            <p>
                                {!! $pegawai->jabatan !!}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Tanggal Aktif Jabatan</label>
                            <p>
                                {!! $pegawai->tglaktif_jabatan !!}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Tanggal Masuk Jabatan</label>
                            <p>
                                {!! $pegawai->tglmasuk_jabatan !!}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Status Karyawan</label>
                            <p>
                                {!! $pegawai->status !!}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>IsActive</label>
                            <p>
                                {!! $pegawai->isactive !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection