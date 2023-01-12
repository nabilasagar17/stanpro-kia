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

}

 ?>