<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Golongan;
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
            "pegawai" => User::all()->sortBy('name')
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
            "golongan" => Golongan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {

        $rules = [
            'name' => 'required',
            'jabatan' => 'required',
            'golongan_id' => 'required',
            'level' => 'required',
        ];

        if($request->nip != $user->nip){
            $rules['nip'] = 'required|unique:users';
        }

        if($request->email != $user->email){
            $rules['email'] = 'unique:users';
        }

        if($request->phone != $user->phone){
            $rules['phone'] = 'unique:users';
        }

        $validatedData = $request->validate($rules);
        
        $validatedData['password'] = $validatedData['nip'];

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
            "golongan" => Golongan::all()
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
        $rules = [
            'nip' => 'required',
            'name' => 'required',
            'jabatan' => 'required',
            // 'golongan' => 'required',
            'level' => 'required',
            'status_anggota' => 'required'
        ];

        if($request->nip != $pegawai->nip){
            $rules['nip'] = 'required|unique:users';
        }

        if($request->email != $pegawai->email){
            $rules['email'] = 'unique:users';
        }

        if($request->phone != $pegawai->phone){
            $rules['phone'] = 'unique:users';
        }

        $validatedData = $request->validate($rules);
        
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
