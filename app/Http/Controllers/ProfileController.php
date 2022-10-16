<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        
        User::where('id', $user->id)->update($validatedData);

        return redirect('/profile')->with('success', 'Data Profile Berhasil diubah.');
    }

    public function changePassword(Request $request)
    {

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect('/profile')->with('successPassword', 'Password Berhasil diubah.');
    }
}