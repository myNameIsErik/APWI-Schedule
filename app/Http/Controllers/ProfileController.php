<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.index', [
            'profiles' => User::where('id', Auth::user()->id)->get()
        ]);
    }

    public function edit(User $user)
    {
        return view('profile.edit-profile', [
            "user" => $user,
            "golongan" => Golongan::all()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'jabatan' => '',
            'golongan_id' => '',
            'status_anggota' => ''
        ];

        if($request->nip != $user->nip){
            $rules['nip'] = 'required|unique:users';
        }

        if(($request->email != null) && ($request->email != $user->email)){
            $rules['email'] = 'unique:users';
        }

        if(($request->phone != null) && ($request->phone != $user->phone)){
            $rules['phone'] = 'unique:users';
        }

        $validatedData = $request->validate($rules);
        
        if($request->email == null){
            $validatedData['email'] = null;
        }
        
        if($request->phone == null){
            $validatedData['phone'] = null;
        }
        
        User::where('id', $user->id)->update($validatedData);

        Alert::success('Congrats', 'Data Profile Berhasil diubah!');
        return redirect('/profile');
        // return redirect('/profile')->with('success', 'Data Profile Berhasil diubah.');
    }

    public function changePassword(Request $request)
    {

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        Alert::success('Congrats', 'Password Berhasil diubah!');
        return redirect('/profile');
        // return redirect('/profile')->with('successPassword', 'Password Berhasil diubah.');
    }
}
