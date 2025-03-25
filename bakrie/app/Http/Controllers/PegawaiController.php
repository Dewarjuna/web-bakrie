<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PegawaiController extends Controller
{
    // ... other methods (index, create, store, show, edit, update, destroy, history, dashboard) ...

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawais = Pegawai::select('pegawai.*')
            ->join(
                DB::raw('(SELECT nip, MAX(tglaktif_jabatan) as max_tgl FROM pegawai GROUP BY nip) as latest'),
                function($join) {
                    $join->on('pegawai.nip', '=', 'latest.nip')
                         ->on('pegawai.tglaktif_jabatan', '=', 'latest.max_tgl');
                }
            )
            ->paginate(10);

        return view('pegawai.index', ['pegawai' => $pegawais]);
    }

    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource (for new employee) in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'kelamin' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'tglaktif_jabatan' => 'required|date',
            'tglmasuk_jabatan' => 'required|date',
            'status' => 'required|string|max:255',
            'isactive' => 'required|string|max:255',
        ]);

        // For new employee creation, no existing record to disable.
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

    public function show(Pegawai $pegawai)
    {
        // Get all job history records for the employee.
        $history = Pegawai::where('nip', $pegawai->nip)
                          ->orderBy('tglmasuk_jabatan', 'asc')
                          ->get();

        return view('pegawai.show', compact('pegawai', 'history'));
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nip' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'kelamin' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'tglaktif_jabatan' => 'required|date',
            'tglmasuk_jabatan' => 'required|date',
            'status' => 'required|string|max:255',
            'isactive' => 'required|string|max:255',
        ]);

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

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect('/pegawai')->with('status','Data Pegawai telah dihapus');
    }

    public function dashboard()
    {
        $totalActive = Pegawai::where('isactive', 'Active')->count();
        $totalMale = Pegawai::where('isactive', 'Active')->where('kelamin', 'Laki-laki')->count();
        $totalFemale = Pegawai::where('isactive', 'Active')->where('kelamin', 'Perempuan')->count();
        $totalPermanen = Pegawai::where('status', 'permanen')->where('isactive', 'Active')->count();
        $totalKontrak = Pegawai::where('status', 'kontrak')->where('isactive', 'Active')->count();

        return view('admin.dashboard', compact('totalActive', 'totalMale', 'totalFemale', 'totalPermanen', 'totalKontrak'));
    }

    public function history($nip)
    {
        $histories = Pegawai::where('nip', $nip)->orderBy('tglaktif_jabatan', 'asc')->get();
        return view('pegawai.history', compact('histories'));
    }

    /**
     * Show form for adding a new jabatan (job position) without altering "tanggal masuk".
     */
    public function newJabatan($nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->first();
        return view('pegawai.newjabatan', compact('pegawai'));
    }

    /**
     * Store new jabatan for an existing employee.
     * This method does not require the "tglmasuk_jabatan" field from the form.
     */
    public function storeNewJabatan(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'kelamin' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'tglaktif_jabatan' => 'required|date',
            'status' => 'required|string|max:255',
            'isactive' => 'required|string|max:255',
        ]);

        DB::transaction(function () use ($request) {
            // Retrieve the existing employee record to keep the original "tanggal masuk"
            $existingPegawai = Pegawai::where('nip', $request->nip)->first();

            // Ensure that there is an existing record
            if (!$existingPegawai) {
                abort(404, 'Employee not found');
            }

            // Disable the current active jabatan for this employee.
            Pegawai::where('nip', $request->nip)
                ->where('isactive', 'active')
                ->update(['isactive' => 'inactive', 'updated_at' => Carbon::now()]);

            // Create a new record with the new jabatan and new active date,
            // while preserving the original "tanggal masuk" from the existing record.
            Pegawai::create([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'kelamin' => $request->kelamin,
                'jabatan' => $request->jabatan,
                'tglaktif_jabatan' => $request->tglaktif_jabatan,
                'tglmasuk_jabatan' => $existingPegawai->tglmasuk_jabatan,
                'status' => $request->status,
                'isactive' => $request->isactive,
            ]);
        });

        return redirect('/pegawai')->with('status', 'Jabatan baru berhasil ditambahkan');
    }
}
