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
                'nip' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'kelamin' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'tglaktif_jabatan' => 'required|date',
                'tglmasuk_jabatan' => 'required|date',
                'status' => 'required|string|max:255',
                'isactive' => 'required|string|max:255',
            ]
            );

            Pegawai::create([
                'nip' => $request->nip,
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
                'nip' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'kelamin' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'tglaktif_jabatan' => 'required|date',
                'tglmasuk_jabatan' => 'required|date',
                'status' => 'required|string|max:255',
                'isactive' => 'required|string|max:255',
            ]
            );

            $pegawai->update([
                'nip' => $request->nip,
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

    public function dashboard()
{
    // Hitung total pegawai yang aktif (misalnya isactive = '1' menandakan aktif)
    $totalActive = Pegawai::where('isactive', 'Active')->count();

    // Hitung pegawai aktif berdasarkan jenis kelamin
    $totalMale = Pegawai::where('isactive', 'Active')->where('kelamin', 'Laki-laki')->count();
    $totalFemale = Pegawai::where('isactive', 'Active')->where('kelamin', 'Perempuan')->count();

    // Hitung karyawan permanen dan kontrak (sesuaikan nilai status sesuai database, misalnya 'permanen' dan 'kontrak')
    $totalPermanen = Pegawai::where('status', 'permanen')->count();
    $totalKontrak = Pegawai::where('status', 'kontrak')->count();

    return view('admin.dashboard', compact('totalActive', 'totalMale', 'totalFemale', 'totalPermanen', 'totalKontrak'));
}

}
