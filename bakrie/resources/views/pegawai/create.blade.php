@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Masukkan data Pegawai</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pegawai.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label>NIP</label>
                                <input type="text" name="nip" class="form-control">
                                @error('nip')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control">
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Jenis Kelamin</label>
                                <select name="kelamin" class="form-select" aria-label="Default select example">
                                    <option selected value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('kelamin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan" class="form-control">
                                @error('jabatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tanggal Aktif Jabatan -->
                            <div class="mb-3">
                                <label>Tanggal Aktif Jabatan</label>
                                <input type="text" id="tglaktif_jabatan" name="tglaktif_jabatan" class="form-control" placeholder="YYYY-MM-DD contoh: 2002-06-25">
                                @error('tglaktif_jabatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tanggal Masuk Jabatan -->
                            <div class="mb-3">
                                <label>Tanggal Masuk</label>
                                <input type="text" id="tglmasuk_jabatan" name="tglmasuk_jabatan" class="form-control" placeholder="YYYY-MM-DD contoh: 2002-06-25">
                                @error('tglmasuk_jabatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Status Karyawan</label>
                                <input type="text" name="status" class="form-control">
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Active?</label>
                                <div class="form-check">
                                    <input type="radio" id="active" name="isactive" value="active" class="form-check-input">
                                    <label for="active" class="form-check-label">Active</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="nonactive" name="isactive" value="non active" class="form-check-input">
                                    <label for="nonactive" class="form-check-label">Non Active</label>
                                </div>
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
    <!-- Include Flatpickr JS (if not already in your layout) -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Initialize Flatpickr on both date fields with a standard format.
        flatpickr("#tglaktif_jabatan", {
            dateFormat: "Y-m-d"
        });
        flatpickr("#tglmasuk_jabatan", {
            dateFormat: "Y-m-d"
        });
    </script>
@endsection
