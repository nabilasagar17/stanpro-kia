<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function dashboard(){
        return view('admin/dashboard');
    }

    public function user_management(){
        return view('admin/user_management');
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
}