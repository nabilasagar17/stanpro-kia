<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Helpers\helpers;
use Illuminate\Http\Request;
Use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Input;
use Auth;

class SiswaController extends Controller
{
    //
    public function program(){
        $data = DB::table('sp_program')->select("*")->where('status',1)->get();
        return view('siswa/program',['data' => $data]);
    }

    public function tambah_jadwal(Request $request){
        DB::table('sp_jadwal_siswa')->insert([
            'id_jadwal' => $request->input('id_mapel'),
            'id_siswa' => Helpers::get_siswa(Auth::user()->email,'id'),
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->email
        ]);

        return redirect()->back()->with('message', 'Jadwal Berhasil Ditambahkan!');
    
    }

    public function jadwal_siswa(){
        $id_siswa = Helpers::get_siswa(Auth::user()->email,'id');
        $data = DB::table('view_jadwal_mapel_siswa')->select("*")->where('id_siswa', $id_siswa)->paginate(15);
        return view('siswa/jadwal_siswa',['data' => $data]);
    }

    public function update_jadwal_siswa(Request $request){
        $id = $request->input('id_jadwal');
        
        DB::table('sp_jadwal_siswa')->where('id',$id)->update([
            'updated_at' => Carbon::now(),
            'updated_by' => Auth::user()->email,
            'selesai' => 1
        ]);
        return redirect()->back()->with('message', 'Jadwal Berhasil Ditambahkan!');
    }

    public function update_program_siswa(Request $request){
        $id_siswa = Helpers::get_siswa(Auth::user()->email,'id');
      
        DB::table('sp_siswa')->where('id',$id_siswa)->update([
            'updated_at' => Carbon::now(),
            'updated_by' => Auth::user()->email,
            'kode_program' => $request->input('id_program'),
        ]);
        return redirect()->back()->with('message', 'Program berhasil diupdate!');
    }
}