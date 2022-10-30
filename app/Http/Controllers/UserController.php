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
            "status" => Status::all()
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
            'golongan' => 'required',
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
        
        $validatedData['status_id'] = '1';
        $validatedData['username'] = $validatedData['nip'];
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
        $rules = [
            'nip' => 'required',
            'name' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
            'level' => 'required',
            'status_id' => 'required',
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
        
        $validatedData['username'] = $validatedData['nip'];
        
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
