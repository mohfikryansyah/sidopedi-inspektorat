<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dinas;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DinasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {
        return view('authentication.admin.PerjalananDinasResource.index', [
            'dinas' => Dinas::paginate(8),
            'header' => 'Perjalanan Dinas'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authentication.admin.PerjalananDinasResource.create', [
            'users' => User::all(),
            'dinas' => Dinas::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'user_id' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        $validasi['start'] = Carbon::createFromFormat('d/m/Y', $request->input('start'))->format('Y-m-d');
        $validasi['end'] = Carbon::createFromFormat('d/m/Y', $request->input('end'))->format('Y-m-d');
        // $validasi['start'] = request()->input('start');
        // $validasi['end'] = request()->input('end');
        Dinas::create($validasi);

        return redirect(route('perjalanan-dinas.index'))->with('success', 'Berhasil Menambahkan Data Perjalanan Dinas!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dinas $perjalanan_dina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dinas $perjalanan_dina)
    {
        $perjalanan_dina->start = Carbon::createFromFormat('Y-d-m', $perjalanan_dina->start)->format('m-d-Y');
        $perjalanan_dina->end = Carbon::createFromFormat('Y-d-m', $perjalanan_dina->end)->format('m-d-Y');
        return view('authentication.admin.PerjalananDinasResource.edit', [
            'users' => User::all(),
            'dinas' => $perjalanan_dina,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dinas $perjalanan_dina)
    {
        $validasi = $request->validate([
            'user_id' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        $validasi['start'] = Carbon::createFromFormat('d/m/Y', $request->input('start'))->format('Y-m-d');
        $validasi['end'] = Carbon::createFromFormat('d/m/Y', $request->input('end'))->format('Y-m-d');
        
        Dinas::where('id', $perjalanan_dina->id)->update($validasi);

        return redirect('/perjalanan-dinas')->with('success', 'Berhasil mengubah perjalanan dinas!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dinas $perjalanan_dina)
    {
        $perjalanan_dina = Dinas::find($perjalanan_dina->id);
        Dinas::destroy($perjalanan_dina->id);

        return redirect()
            ->back()
            ->with('success', 'Berhasil menghapus perjalanan dinas!');
    }

    public function toggleStatus(Dinas $dinas)
    {
        $isActive['perjalanan_dinas'] = request()->input('isActive');
        
        Dinas::where('id', $dinas->id)->update($isActive);

        return response()->json(['message' => 'Status updated successfully']);
    }
}
