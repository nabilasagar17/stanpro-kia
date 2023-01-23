<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Helpers\helpers;
use Illuminate\Http\Request;
Use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Input;
use Auth;

class TentorController extends Controller
{
    public function jadwal_mapel(){
        $id_tentor = Helpers::get_tentor(Auth::user()->email,'id');
        $data = DB::table('view_jadwal_mapel')
        ->where('id_tentor',$id_tentor)
        ->orderby('created_at','DESC')
        ->paginate(15);

        return view('admin/jadwal_mapel',['data'=>$data]);
    }


}
