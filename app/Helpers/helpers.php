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

}

 ?>