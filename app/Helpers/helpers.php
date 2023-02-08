<?php
namespace App\Helpers;
use Illuminate\Http\Request;
use Auth;
use DB;


class Helpers{

    public function field_program($kode,$field){
        $data = DB::table('sp_program')->select($field)->where('kode',$kode)->get(1);
    
        return @$data[0]->$field;
    }

    public function get_mapel($id,$field){
        $data = DB::table('sp_mata_pelajaran')->select($field)->where('id',$id)->get(1);
        return @$data[0]->$field;
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

    public function get_kelas(){
        $kelas =  DB::table('sp_kelas')->select("*")->get();
        return $kelas;
    }

    public function cek_jadwal_is_null($id_mapel,$id_siswa){
        $jadwal = DB::table('sp_jadwal_siswa')->select("*")->where('id_jadwal',$id_mapel)->where('id_siswa',$id_siswa)->get();
      
        return $jadwal;
    }

    public function get_absensi_is_null($id_jadwal){
        $jadwal = DB::table('sp_absensi_siswa')->select("*")->where('id_jadwal',$id_jadwal)->get();
      
        return $jadwal;
    }

}

 ?>