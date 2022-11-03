<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RubahJadwalController extends Controller
{
    public function index()
    {
        if (auth()->user()->level === "Admin") {
            return view('dashboard.rubah-jadwal.perubahan-jadwal', [
                'jadwal' => Jadwal::where('request', '=', true)
            ]);
        } else {
            return view('dashboard.rubah-jadwal.perubahan-jadwal', [
                'jadwal' => Jadwal::where('user_id', Auth::user()->id)->get()
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
        $checkTipeJadwal = $request->tipe_jadwal;

        if($checkTipeJadwal != 1){
            $validatedData = $request->validate([
                'user_id' => 'required',
                'tanggal' => 'required',
                'keterangan' => ''
            ]);

            $validatedData['kegiatan_id'] = null;
            $validatedData['angkatan'] = null;
            $validatedData['jp'] = '15';
            $validatedData['waktu_mulai'] = $validatedData['tanggal'] . " 00:00:00";
            $validatedData['waktu_selesai'] = $validatedData['tanggal'] . " 23:59:00";
            
        } else {
            $validatedData = $request->validate([
                'kegiatan_id' => 'required',
                'user_id' => 'required',
                'tanggal' => 'required',
                'waktu_mulai' => 'required',
                'waktu_selesai' => 'required',
                'jp' => 'required',
                'angkatan' => 'required',
                'keterangan' => ''
            ]);
   
            $validatedData['waktu_mulai'] = $validatedData['tanggal'] . " " . $validatedData['waktu_mulai'];
            $validatedData['waktu_selesai'] = $validatedData['tanggal'] . " ".$validatedData['waktu_selesai'];
        }
        
        unset($validatedData['tanggal']);

        if(!is_numeric($validatedData['user_id'])){
            $getUserName = $validatedData['user_id'];
            $getId = User::where('name', $getUserName)->first()->id;
    
            $validatedData['user_id'] = $getId;
        }

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

    public function showFull(User $user)
    {
        return view('dashboard.jadwal.showfull-jadwal', [
            $user_id = $user->id,
            'user' => $user,
            'jadwal' => Jadwal::where('user_id', $user_id)->get()
        ]);
    }

    public function checkJadwal(Request $request)
    {
        $tanggal_mulai = $request->tanggal.' '.$request->mulai;
        $tanggal_selesai = $request->tanggal.' '.$request->selesai;
        
        $arr_user_id = [];
        $bentrok = DB::table('jadwals')->select('user_id')->whereRaw("
        (waktu_mulai <= STR_TO_DATE('$tanggal_mulai', '%Y-%m-%d %H:%i') AND waktu_selesai >= STR_TO_DATE('$tanggal_mulai', '%Y-%m-%d %H:%i')) OR
        (waktu_mulai <= STR_TO_DATE('$tanggal_selesai', '%Y-%m-%d %H:%i') AND waktu_selesai >= STR_TO_DATE('$tanggal_selesai', '%Y-%m-%d %H:%i')) OR 
        (waktu_mulai >= STR_TO_DATE('$tanggal_mulai', '%Y-%m-%d %H:%i') AND waktu_selesai <= STR_TO_DATE('$tanggal_selesai', '%Y-%m-%d %H:%i'))
        ")->get()->toArray();
        foreach($bentrok as $item){
            $arr_user_id[] = $item->user_id;
        }
        $checking = DB::table('users')->whereNotIn('id', $arr_user_id)->get();
        
        echo json_encode([
            'data' => $checking,
            'debug' => [
                'tanggal_mulai' => $tanggal_mulai,
                'tanggal_selesai' => $tanggal_selesai,
                'arr_user_id' => $arr_user_id,
            ]
        ]);
    }

    public function checkJadwalUpdate(Request $request)
    {
        $tanggal_mulai = $request->tanggal.' '.$request->mulai;
        $tanggal_selesai = $request->tanggal.' '.$request->selesai;
        $id = 1; //harusna diambil ti $request
        
        $arr_user_id = [];
        $bentrok = DB::table('jadwals')->select('user_id')->whereRaw("
        ((waktu_mulai <= STR_TO_DATE('$tanggal_mulai', '%Y-%m-%d %H:%i') AND waktu_selesai >= STR_TO_DATE('$tanggal_mulai', '%Y-%m-%d %H:%i')) OR
        (waktu_mulai <= STR_TO_DATE('$tanggal_selesai', '%Y-%m-%d %H:%i') AND waktu_selesai >= STR_TO_DATE('$tanggal_selesai', '%Y-%m-%d %H:%i')) OR 
        (waktu_mulai >= STR_TO_DATE('$tanggal_mulai', '%Y-%m-%d %H:%i') AND waktu_selesai <= STR_TO_DATE('$tanggal_selesai', '%Y-%m-%d %H:%i'))) 
        AND id != '$id'
        ")->get()->toArray();
        foreach($bentrok as $item){
            $arr_user_id[] = $item->user_id;
        }
        
        $checking = DB::table('users')->whereNotIn('id', $arr_user_id)->get();
        
        echo json_encode([
            'data' => $checking,
            'debug' => [
                'tanggal_mulai' => $tanggal_mulai,
                'tanggal_selesai' => $tanggal_selesai,
                'arr_user_id' => $arr_user_id,
            ]
        ]);
    }
}
