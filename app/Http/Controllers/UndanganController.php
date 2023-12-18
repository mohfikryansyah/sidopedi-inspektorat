<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Undangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UndanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('authentication.admin.UndanganResource.index', [
            'users' => User::all(),
            'undangans' => Undangan::all(),
            'header' => 'Undangan',
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
            'undangan' => 'required|file|max:1024',
        ]);

        $validasi['undangan'] = $request->file('undangan')->store('undangan');

        // dd($validasi);

        Undangan::create($validasi);

        return redirect()
            ->back()
            ->with('success', 'Berhasil membuat undangan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Undangan $undangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Undangan $undangan)
    {
        return view('authentication.admin.UndanganResource.edit', [
            'users' => User::all(),
            'undangan' => $undangan,
            'undangans' => Undangan::with(['pegawai'])->get(),
            'header' => 'Ubah Undangan',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Undangan $undangan)
    {
        $validasi = $request->validate([
            'undangan' => 'mimes:pdf|file|max:1024',
        ]);

        $undangan = Undangan::find($undangan->id);

        if ($request->hasFile('undangan')) {
            Storage::delete($undangan->undangan);
            $validasi['undangan'] = $request->file('undangan')->store('undangan');
        }

        Undangan::where('id', $undangan->id)->update($validasi);

        return redirect('/undangan')->with('success', 'Berhasil mengubah undangan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Undangan $undangan)
    {
        $undangan = Undangan::find($undangan->id);
        Storage::delete($undangan->undangan);
        Undangan::destroy($undangan->id);

        return redirect()->back()->with('success', 'Berhasil menghapus undangan!');
    }
}
