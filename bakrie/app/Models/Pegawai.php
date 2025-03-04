<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    //
    protected $table = 'pegawais';
    protected $primaryKey = 'NIP';
    protected $fillable = [
        'NIP',
        'nama',
        'jenis kelamin',
        'jabatan',
        'tanggal aktif jabatan',
        'tanggal masuk',
        'status karyawan',
        'IsActive'
    ];
    public $timestamps = true;
}
