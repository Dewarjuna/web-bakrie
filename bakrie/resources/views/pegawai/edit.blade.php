@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ubah Data Pegawai</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label>NIP</label>
                                <input type="text" name="nip" class="form-control" 
                                    value="{{ old('nip', $pegawai->nip) }}">
                                @error('nip')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" 
                                    value="{{ old('nama', $pegawai->nama) }}">
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Jenis Kelamin</label>
                                <select name="kelamin" class="form-select" aria-label="Default select example">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('kelamin', $pegawai->kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('kelamin', $pegawai->kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('kelamin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" 
                                    value="{{ old('jabatan', $pegawai->jabatan) }}">
                                @error('jabatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Tanggal Aktif Jabatan</label>
                                <input type="text" id="tglaktif_jabatan" name="tglaktif_jabatan" class="form-control" 
                                    value="{{ old('tglaktif_jabatan', $pegawai->tglaktif_jabatan) }}" placeholder="YYYY-MM-DD">
                                @error('tglaktif_jabatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Tanggal Masuk Jabatan</label>
                                <input type="text" id="tglmasuk_jabatan" name="tglmasuk_jabatan" class="form-control" 
                                    value="{{ old('tglmasuk_jabatan', $pegawai->tglmasuk_jabatan) }}" placeholder="YYYY-MM-DD">
                                @error('tglmasuk_jabatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Status Karyawan</label>
                                <input type="text" name="status" class="form-control" 
                                    value="{{ old('status', $pegawai->status) }}">
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>IsActive</label>
                                <input type="text" name="isactive" class="form-control" 
                                    value="{{ old('isactive', $pegawai->isactive) }}">
                                @error('isactive')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- If using Flatpickr for date selection, include and initialize it -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#tglaktif_jabatan", {
            dateFormat: "Y-m-d"
        });
        flatpickr("#tglmasuk_jabatan", {
            dateFormat: "Y-m-d"
        });
    </script>
@endsection
