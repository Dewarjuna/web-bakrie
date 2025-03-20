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
                        <p>{{ $pegawai->nip }}</p>
                    </div>
                    <div class="mb-3">
                        <label>Nama</label>
                        <p>{{ $pegawai->nama }}</p>
                    </div>
                    <div class="mb-3">
                        <label>Jenis Kelamin</label>
                        <p>{{ $pegawai->kelamin }}</p>
                    </div>
                    <!-- Informasi pegawai lainnya -->

                    <!-- Bagian Riwayat Jabatan -->
                    @if($history->count())
                        <h5>Riwayat Jabatan:</h5>
                        @foreach($history as $record)
                        @php
                        $startYear = \Carbon\Carbon::parse($record->tglmasuk_jabatan)->year;
                        if($record->isactive == 'active'){
                            // Jika masih aktif, pKW tahun sekarang
                            $endYear = \Carbon\Carbon::now()->year;
                        } else {
                            // Jika tidak aktif, PAKE tahun dari tglaktif_jabatan
                            $endYear = \Carbon\Carbon::parse($record->tglaktif_jabatan)->year;
                        }
                        $duration = $endYear - $startYear;
                    @endphp
                            <p>
                                {{ $record->nama }} sudah menjabat sebagai {{ $record->jabatan }} 
                                selama {{ $duration }} tahun dari tahun {{ $startYear }} sampai tahun {{ $endYear }}.
                            </p>
                        @endforeach
                    @endif
                    @if (Auth::guard('admin')->check())
                    <a href="{{ route('pegawai.history', $pegawai->nip) }}" class="btn btn-info">Kelola Jabatan</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
