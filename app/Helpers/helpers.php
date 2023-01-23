<?php
namespace App\Helpers;
use Illuminate\Http\Request;
use Auth;
use DB;


class Helpers{

    public function field_program($kode,$field){
        $data = DB::table('sp_program')->select($field)->get(1);
        return $data[0]->$field;
    }

    public function get_mapel($id,$field){
        $data = DB::table('sp_mata_pelajaran')->select($field)->get(1);
        return $data[0]->$field;
    }

    public function get_tentor($email,$field){
        $data = DB::table('sp_tentor')->select($field)->where('email',$email)->get(1);
        return @$data[0]->$field;
    }

    public function get_siswa($email,$field){
        $data = DB::table('sp_siswa')->select($field)->where('email',$email)->get(1);
        return @$data[0]->$field;
    }

    public function get_detail_mapel(){
        $detail_mapel = DB::table('view_detail_mapel')->select("*")->get();
        return $detail_mapel;
    }

    public function get_ruangan(){
        $ruangan =  DB::table('sp_ruangan')->select("*")->get();
        return $ruangan;
    }

    public function cek_jadwal_is_null($id_mapel,$id_siswa){
        $jadwal = DB::table('sp_preview_jadwal')->select("*")->where('id_jadwal_mapel',$id_mapel)->where('id_siswa',$id_siswa)->get();
        return @$jadwal;
    }

}

 ?>