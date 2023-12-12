<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('ADMIN')) {
            $laporan = Laporan::with(['pegawai'])->get();
        } else {
            $laporan = Laporan::with(['pegawai'])->where('user_id', $user->id)->get();
        }
        
        return view('authentication.pegawai.index', [
            'laporans' => $laporan,
            'header' => 'Laporan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'user_id' => 'required',
            'laporan' => 'required|max:1024',
        ]);

        $validasi['laporan'] = $request->file('laporan')->store('laporan');

        Laporan::create($validasi);

        return redirect()
            ->back()
            ->with('success', 'Berhasil mengirim laporan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        return view('authentication.pegawai.LaporanResource.edit', [
            'laporan' => $laporan,
            'laporans' => Laporan::where('user_id', auth()->user()->id)
                ->with(['pegawai'])
                ->get(),
            'header' => 'Ubah Laporan',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        $validasi = $request->validate([
            'user_id' => 'required',
            'laporan' => 'mimes:pdf|file|max:1024',
        ]);

        $laporan = Laporan::find($laporan->id);

        if ($request->hasFile('laporan')) {
            Storage::delete($laporan->laporan);
            $validasi['laporan'] = $request->file('laporan')->store('laporan');
        }

        Laporan::where('id', $laporan->id)->update($validasi);

        return redirect('/laporan')->with('success', 'Berhasil mengubah laporan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        $laporan = Laporan::find($laporan->id);
        Storage::delete($laporan->laporan);
        Laporan::destroy($laporan->id);

        return redirect()
            ->back()
            ->with('success', 'Berhasil menghapus laporan!');
    }
}
