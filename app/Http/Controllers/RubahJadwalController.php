<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RubahJadwalController extends Controller
{
    public function index()
    {
        if (auth()->user()->level === "Admin") {
            return view('dashboard.rubah-jadwal.perubahan-jadwal', [
                'jadwal' => Jadwal::where('request', true)->get()
            ]);
        } else {
            return view('dashboard.rubah-jadwal.perubahan-jadwal', [
                'jadwal' => Jadwal::where('user_id', Auth::user()->id)->
                                where('request', true)->get()
            ]);
        }
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        return view('dashboard.rubah-jadwal.edit-jadwal', [
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
            'alasan' => 'required'
        ]);
        $validatedData['request'] = 1;

        Jadwal::where('id', $jadwal->id)->update($validatedData);

        Alert::success('Congrats', 'Permintaan Berhasil Terkirim!');
        return redirect('/');
        // return redirect('/')->with('success', 'Permintaan Berhasil Terkirim.');
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

        Alert::success('Congrats', 'Jadwal Berhasil dihapus!');
        return redirect('/');
        // return redirect('/')->with('success', 'Jadwal Berhasil dihapus.');
    }

    public function tolakJadwal(Jadwal $jadwal)
    {
        $data = [];
        $data['request'] = false;
        $data['alasan'] = null;

        Jadwal::where('id', $jadwal->id)->update($data);

        Alert::success('Congrats', 'Jadwal ditolak!');
        return redirect('/perubahan-jadwal');
        // return redirect('/perubahan-jadwal')->with('success', 'Jadwal Ditolak.');
    }
}
