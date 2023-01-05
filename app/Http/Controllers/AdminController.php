<?php

namespace App\Http\Controllers;
use App\Helpers\helpers;
use Illuminate\Http\Request;
Use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Input;
use Auth;


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
        $data = DB::table('sp_mata_pelajaran')->select("*")->orderby('created_at','DESC')->paginate(15);
        return view('admin/mata_pelajaran',['data'=>$data]);
    }

    public function tambah_mapel_proses(Request $request){

        DB::table('sp_mata_pelajaran')->insert([
            'nama_mapel' => $request->input('nama_mapel'),
            'lama_belajar' => $request->input('lama_belajar'),
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->email,
            'status' => 1
        ]);
        return redirect()->back()->with('message', 'Mapel Berhasil Ditambahkan!');
    }

    public function detail_mapel(){ 
        $data= DB::table('view_detail_mapel')->select("*")->paginate(15);
        $mapel = DB::table('sp_mata_pelajaran')->select("*")->get();
        $tentor =  DB::table('sp_tentor')->select("*")->get();
        return view('admin/detail_mapel',['data'=>$data,'mapel'=>$mapel,'tentor'=>$tentor]);
    }

    public function detail_mapel_proses(){ 
        DB::insert('sp_detail_mapel')->insert([
            'id_mapel' => $request->input('id_mapel'),
            'id_tentor' => $request->input('id_tentor'),
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->email
        ]);
        return redirect()->back()->with('message', 'Mapel Berhasil Ditambahkan!');
    }
    
    public function jadwal_mapel(){
        $data= DB::table('view_jadwal_mapel')->select("*")->paginate(15);

        return view('admin/jadwal_mapel',['data'=>$data]);
    }

    public function view_kelas(){
        $data = DB::table('sp_kelas')->select("*")->orderby('created_at','DESC')->paginate(15);

        return view('admin/view_kelas',['data'=>$data]);
    }

    public function absensi(){
        return view('admin/absensi');
    }

    public function materi(){
        return view('admin/materi');
    }

    public function tentor(){
        $data = DB::table('sp_tentor')->select("*")->orderby('created_at','DESC')->paginate(15);
        return view('admin/tentor',['data'=>$data]);
    }

    public function tambah_tentor_proses(Request $request){
        DB::table('sp_tentor')->insert([
            'nama'=> $request->input('nama'),
            'email'=> $request->input('email'),
            'alamat'=> $request->input('alamat'),
            'telp'=> $request->input('telp'),
            'pendidikan_terakhir'=>$request->input('pendidikan_terakhir'),
            'created_at'=> Carbon::now(),
            'created_by'=> Auth::user()->email,
            'status'=>1
        ]);
        
        DB::table('users')->insert([
            'email'=>$request->input('email'),
            'nama'=> $request->input('nama'),
            'role'=> 'tentor',
            'password' => bcrypt('123456'),
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->email,
            'status' => 1
        ]);
        return redirect()->back()->with('message', 'Data Tentor Berhasil Ditambahkan!');
    }


    public function siswa(){
        $data = DB::table('sp_siswa')->select("*")->orderby('created_at','DESC')->paginate(15);
        $program = DB::table('sp_program')->select("*")->orderby('created_at','DESC')->paginate(15);
        return view('admin/siswa',['data'=>$data,'program'=>$program]);
    }

    public function tambah_siswa_proses(Request $request){
        DB::table('sp_siswa')->insert([
            'nama'=> $request->input('nama'),
            'email'=> $request->input('email'),
            'alamat'=> $request->input('alamat'),
            'telp'=> $request->input('telp'),
            'pendidikan_terakhir'=>$request->input('pendidikan_terakhir'),
            'created_at'=> Carbon::now(),
            'created_by'=> Auth::user()->email,
            'status'=>1,
            'status_siswa' => 0, //belum lulus
            'kode_program' => $request->input('program')
        ]);
        
        DB::table('users')->insert([
            'email'=>$request->input('email'),
            'nama'=> $request->input('nama'),
            'role'=> 'siswa',
            'password' => bcrypt('123456'),
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->email,
            'status' => 1
        ]);
        return redirect()->back()->with('message', 'Data Siswa Berhasil Ditambahkan!');
    }

    public function program_belajar(){
        $data = DB::table('sp_program')->select("*")->orderby('created_at','DESC')->paginate(15);
        return view('admin/program_belajar',['data'=>$data]);
    }

    public function ruang_kelas(){
        $data = DB::table('sp_ruangan')->select("*")->orderby('created_at','DESC')->paginate(15);
        return view('admin/ruang_kelas',['data'=>$data]);
    }
}