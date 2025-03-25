@extends('layouts.frontend')

@section('content')
<div class="container">
    <h4>Tambah Jabatan Baru untuk {{ $pegawai->nama }}</h4>
    <a href="{{ url('pegawai') }}" class="btn btn-danger mb-3">Kembali</a>
    
    <form action="{{ route('pegawai.storeNewJabatan') }}" method="POST">
        @csrf
        <!-- Pass the pegawai's existing information -->
        <input type="hidden" name="nip" value="{{ $pegawai->nip }}">
        <input type="hidden" name="nama" value="{{ $pegawai->nama }}">
        <input type="hidden" name="kelamin" value="{{ $pegawai->kelamin }}">
        
        <div class="form-group">
            <label for="jabatan">Jabatan Baru</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukkan jabatan baru" required>
        </div>
        {{-- <div class="form-group">
            <label for="tglmasuk_jabatan">Tanggal Masuk Jabatan</label>
            <input type="date" name="tglmasuk_jabatan" id="tglmasuk_jabatan" class="form-control" required>
        </div> --}}
        <div class="mb-3">
            <label>Tanggal Aktif Jabatan</label>
            <input type="text" id="tglaktif_jabatan" name="tglaktif_jabatan" class="form-control" placeholder="YYYY-MM-DD contoh: 2002-06-25">
            @error('tglaktif_jabatan')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status Karyawan</label>
            <select name="status" id="status" class="form-control" required>
                <option value="kontrak">Kontrak</option>
                <option value="permanen">Permanen</option>
            </select>
        </div>
        <!-- The new jabatan will be active by default -->
        <input type="hidden" name="isactive" value="active">
        <button type="submit" class="btn btn-primary mt-3">Tambah Jabatan Baru</button>
    </form>
</div>

@section('scripts')
    <!-- Include Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Initialize Flatpickr on both date fields with a standard format.
        flatpickr("#tglaktif_jabatan", {
            dateFormat: "Y-m-d"
        });
        // flatpickr("#tglmasuk_jabatan", {
        //     dateFormat: "Y-m-d"
        // });
    </script>
@endsection
