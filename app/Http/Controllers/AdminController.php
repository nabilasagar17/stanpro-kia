<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;

class AdminController extends Controller
{
    //

    public function dashboard(){
        return view('admin/dashboard');
    }

    public function user_management(Request $request){
        if($request->input('search') != NULL){
            $data = DB::table('users')->select("*")
            ->where('nama', 'like', '%' . $request->input('search') . '%')
            ->orwhere('email', 'like', '%' . $request->input('search'))
            ->orwhere('role', 'like', '%' . $request->input('search'))
            ->orderby('created_at','desc')
            ->paginate(15);
        }else{
            $data = DB::table('users')->select("*")->orderby('created_at','desc')->paginate(15);
        }
        return view('admin/user_management',['data' => $data]);
    }

    public function view_materi(){
        return view('admin/materi');
    }

    public function view_mapel(){
        return view('admin/mata_pelajaran');
    }

    public function detail_mapel(){
        return view('admin/detail_mapel');
    }

    public function jadwal_mapel(){
        return view('admin/jadwal_mapel');
    }

    public function view_kelas(){
        return view('admin/view_kelas');
    }

    public function absensi(){
        return view('admin/absensi');
    }

    public function materi(){
        return view('admin/materi');
    }

    public function tentor(){
        $data = DB::table('sp_tentor')->select("*")->orderby('nama','DESC')->paginate(15);
        return view('admin/tentor',['data'=>$data]);
    }
    public function siswa(){
        $data = DB::table('sp_siswa')->select("*")->orderby('nama','DESC')->paginate(15);
        return view('admin/siswa',['data'=>$data]);
    }

    public function program_belajar(){
        $data = DB::table('sp_program')->select("*")->orderby('nama_program','DESC')->paginate(15);
        return view('admin/program_belajar',['data'=>$data]);
    }
}