<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'kelamin',
        'jabatan',
        'tglaktif_jabatan',
        'tglmasuk_jabatan',
        'status',
        'isactive',
    ];
    //
}
