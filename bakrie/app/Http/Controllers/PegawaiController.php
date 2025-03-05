<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawais = Pegawai::paginate(10);
        return view('pegawai.index', ['pegawai' => $pegawais]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|string|max:255',
                'kelamin' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'tglaktif_jabatan' => 'required|string|max:255',
                'tglmasuk_jabatan' => 'required|string|max:255',
                'status' => 'required|string|max:255',
                'isactive' => 'required|string|max:255',
            ]
            );

            Pegawai::create([
                'nama' => $request->nama,
                'kelamin' => $request->kelamin,
                'jabatan' => $request->jabatan,
                'tglaktif_jabatan' => $request->tglaktif_jabatan,
                'tglmasuk_jabatan' => $request->tglmasuk_jabatan,
                'status' => $request->status,
                'isactive' => $request->isactive,
            ]);

            return redirect('/pegawai')->with('status', 'Data pegawai berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        return view('pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate(
            [
                'nama' => 'required|string|max:255',
                'kelamin' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'tglaktif_jabatan' => 'required|string|max:255',
                'tglmasuk_jabatan' => 'required|string|max:255',
                'status' => 'required|string|max:255',
                'isactive' => 'required|string|max:255',
            ]
            );

            Pegawai::update([
                'nama' => $request->nama,
                'kelamin' => $request->kelamin,
                'jabatan' => $request->jabatan,
                'tglaktif_jabatan' => $request->tglaktif_jabatan,
                'tglmasuk_jabatan' => $request->tglmasuk_jabatan,
                'status' => $request->status,
                'isactive' => $request->isactive,
            ]);

            return redirect('/pegawai')->with('status', 'Data pegawai berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect('/pegawai')->with('status','Data Pegawai telah dihapus');
    }
}
