<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kegiatan.data-kegiatan', [
            "kegiatan" => Kegiatan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kegiatan.add-kegiatan', [
            "kegiatan" => Kegiatan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_kegiatan' => 'required|unique:users',
            'nama_kegiatan' => 'required',
        ]);

        Kegiatan::create($validatedData);

        return redirect('/data-kegiatan')->with('success', 'Kegiatan Berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('dashboard.kegiatan.edit-kegiatan', [
            "kegiatan" => $kegiatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validatedData = $request->validate([
            'kode_kegiatan' => 'required',
            'nama_kegiatan' => 'required',
        ]);

        Kegiatan::where('id', $kegiatan->id)->update($validatedData);

        return redirect('/data-kegiatan')->with('success', 'Kegiatan Berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        Kegiatan::destroy($kegiatan->id);

        return redirect('/data-kegiatan')->with('success', 'Kegiatan Berhasil dihapus.');
    }
}
