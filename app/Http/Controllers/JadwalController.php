<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\User;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->level === "Admin") {
            return view('dashboard.jadwal.data-jadwal', [
                'jadwal' => Jadwal::all()
            ]);
        } else {
            return view('dashboard.jadwal.data-jadwal', [
                'jadwal' => Jadwal::where('user_id', Auth::id())
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jadwal.add-jadwal', [
            "kegiatan" => Kegiatan::all(),
            "pegawai" => User::all()
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
            'kegiatan_id' => 'required',
            'user_id' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'jp' => 'required',
            'angkatan' => 'required'
        ]);

        Jadwal::create($validatedData);

        return redirect('/')->with('success', 'Jadwal Berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        return view('dashboard.jadwal.show-jadwal', [
            "jadwal" => $jadwal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        return view('dashboard.jadwal.edit-jadwal', [
            "kegiatan" => Kegiatan::all(),
            "pegawai" => User::all(),
            "jadwal" => $jadwal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $validatedData = $request->validate([
            'kegiatan_id' => 'required',
            'user_id' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'jp' => 'required',
            'angkatan' => 'required'
        ]);

        Jadwal::where('id', $jadwal->id)->update($validatedData);

        return redirect('/')->with('success', 'Jadwal Berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        Jadwal::destroy($jadwal->id);

        return redirect('/')->with('success', 'Jadwal Berhasil dihapus.');
    }

    // public function checkJP(Request $request)
    // {
    //     $jp = Kegiatan::select(Jadwal::class, 'jp', $request->kegiatan_id);
    //     return response()->json(['jp' => $jp]);
    // }
}
