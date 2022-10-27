<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Status;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pegawai.data-pegawai', [
            "pegawai" => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pegawai.add-pegawai', [
            "pegawai" => User::all(),
            "status" => Status::all()
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
            'name' => 'required',
            'nip' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
            'level' => 'required',
            'status_id' => 'required',
            'phone' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/data-pegawai')->with('success', 'Data Pegawai Berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.pegawai.show-pegawai', [
            "user" => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $pegawai)
    {
        return view('dashboard.pegawai.edit-pegawai', [
            "pegawai" => $pegawai,
            "status" => Status::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $pegawai)
    {
        $validatedData = $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'email' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
            'status_id' => 'required',
            'level' => 'required',
            'phone' => 'required'
        ]);
        
        User::where('id', $pegawai->id)->update($validatedData);

        return redirect('/data-pegawai')->with('success', 'Data Pegawai Berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $pegawai)
    {
        User::destroy($pegawai->id);

        return redirect('/data-pegawai')->with('success', 'Data Pegawai Berhasil dihapus.');
    }
}
