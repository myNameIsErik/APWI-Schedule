<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RubahJadwalController extends Controller
{
    public function index()
    {
        if (auth()->user()->level === "Admin") {
            return view('dashboard.jadwal.data-jadwal', [
                'jadwal' => Jadwal::all()
            ]);
        } else {
            return view('dashboard.jadwal.data-jadwal', [
                'jadwal' => Jadwal::where('user_id', Auth::user()->id)->get()
            ]);
        }
    }
}
