<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratTugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratTugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $user = Auth::user();
        if ($user->hasRole('ADMIN')) {
            $SuratTugas = SuratTugas::with(['pegawai'])->latest()->get();
        } else {
            $SuratTugas = SuratTugas::with(['pegawai'])->where('user_id', $user->id)->latest()->get();
        }
        
        return view('authentication.admin.SuratTugasResource.index', [
            'users' => User::all(),
            'surat' => $SuratTugas,
            'header' => 'Surat Tugas'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authentication.admin.SuratTugasResource.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validasi = $request->validate([
            'user_id' => 'required',
            'surat_tugas' => 'required|file|max:1024',
            'judul' => 'required|max:255',
        ]);

        $validasi['surat_tugas'] = $request->file('surat_tugas')->store('surat-tugas');

        // dd($validasi);

        SuratTugas::create($validasi);

        return redirect()->back()->with('success', 'Berhasil mengirim surat tugas!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratTugas $surat_tuga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratTugas $surat_tuga)
    {
        return view('authentication.admin.SuratTugasResource.edit', [
            'users' => User::all(),
            'surat_tuga' => $surat_tuga,
            'surat' => SuratTugas::with(['pegawai'])->get(),
            'header' => 'Ubah Surat Tugas'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratTugas $surat_tuga)
    {
        $validasi = $request->validate([
            'user_id' => 'required',
            'surat_tugas' => 'mimes:pdf|file|max:1024',
            'judul' => 'required|max:255',
        ]);
        
        $suratTugas = SuratTugas::find($surat_tuga->id);

        if ($request->hasFile('surat_tugas')) {
            Storage::delete($suratTugas->surat_tugas);
            $validasi['surat_tugas'] = $request->file('surat_tugas')->store('surat-tugas');
        }

        SuratTugas::where('id', $surat_tuga->id)->update($validasi);

        return redirect('/surat-tugas')->with('success', 'Berhasil mengubah surat tugas!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratTugas $surat_tuga)
    {
        $suratTugas = SuratTugas::find($surat_tuga->id);
        Storage::delete($suratTugas->surat_tugas);
        SuratTugas::destroy($surat_tuga->id);

        return redirect()->back()->with('success', 'Berhasil menghapus surat tugas!');
    }
}
