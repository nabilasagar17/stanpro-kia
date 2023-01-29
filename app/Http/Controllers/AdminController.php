<?php

namespace App\Http\Controllers;
use App\Helpers\helpers;
use Illuminate\Http\Request;
Use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Input;
use Auth;
use PDF;


class AdminController extends Controller
{
    //

    public function dashboard(){
        return view('admin/dashboard');
    }

    public function user_management(Request $request){
            if(Auth::user()->role == 'admin'){
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
        }else{
            $data = DB::table('users')->select("*")
            ->where('email', Auth::user()->email)
            ->orderby('created_at','desc')
            ->paginate(15);
        }
        return view('admin/user_management',['data' => $data]);
    }

    


    public function view_mapel(){
        $data = DB::table('sp_mata_pelajaran')->select("*")->orderby('created_at','DESC')->paginate(15);
        return view('admin/mata_pelajaran',['data'=>$data]);
    }

    public function tambah_mapel_proses(Request $request){
        $nama_mapel = $request->input('nama_mapel');
        $cek_data = DB::table('sp_mata_pelajaran')->select('nama_mapel')->where('nama_mapel',$nama_mapel)->get(1);
        if($cek_data == null){
            return redirect()->back()->with('message', 'Nama Mapel Sudah Ada!');
        }else{
            DB::table('sp_mata_pelajaran')->insert([
                'nama_mapel' => $nama_mapel,
                'lama_belajar' => $request->input('lama_belajar'),
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->email,
                'status' => 1
            ]);
            return redirect()->back()->with('message', 'Mapel Berhasil Ditambahkan!');
        }
    }

    public function edit_mapel_proses(Request $request){
        $id = $request->input('id_mapel');
        $nama_mapel = $request->input('nama_mapel');
      
        $cek_data = DB::table('sp_mata_pelajaran')->select('nama_mapel')->where('nama_mapel',$nama_mapel)->get(1);
        if($cek_data == null){
            return redirect()->back()->with('message', 'Nama Mapel Sudah Ada!');
        }else{
            DB::table('sp_mata_pelajaran')->where('id',$id)->update([
                'nama_mapel' => $nama_mapel,
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::user()->email,
                'status' => 1
            ]);
            return redirect()->back()->with('message', 'Mapel Berhasil Ditambahkan!');
        }
    }

    public function detail_mapel($id){ 
        $data= DB::table('view_detail_mapel')->select("*")->where('id_mapel',$id)->paginate(15);
        $mapel = DB::table('sp_mata_pelajaran')->select("*")->get();
        $tentor =  DB::table('sp_tentor')->select("*")->get();
        return view('admin/detail_mapel',['data'=>$data,'mapel'=>$mapel,'tentor'=>$tentor]);
    }

    public function tambah_detail_mapel_proses(Request $request,$id_mapel){ 
        DB::table('sp_detail_mapel')->insert([
            'id_mapel' => $id_mapel,
            'id_tentor' => $request->input('id_tentor'),
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->email,
            'status' => 1
        ]);
        return redirect()->back()->with('message', 'Mapel Berhasil Ditambahkan!');
    }
    
    public function jadwal_mapel(){

        if(Auth::user()->role == 'tentor'){
            $id_tentor = Helpers::get_tentor(Auth::user()->email,'id');
            $data = DB::table('view_jadwal_mapel')->select("*")
            ->where('email_tentor',Auth::user()->email)
            ->orderby('created_at','DESC')
            ->paginate(15);
         
        }else{
            $data= DB::table('view_jadwal_mapel')->select("*")->orderby('created_at','DESC')->paginate(15);
        }
        return view('admin/jadwal_mapel',['data'=>$data]);
    }

    public function tambah_jadwal_proses(Request $request){

        $string = date("Y/m/d", strtotime($request->input('tanggal')));
        
        $tanggal =str_replace('/', '-', $string);
        $dates = $tanggal;
        $jam_mulai = $request->input('time_start');
        $jam_selesai = $request->input('time_end');
        $jadwal_mulai =  $dates . ' ' . $jam_mulai . ':00';
        $jadwal_selesai =  $dates . ' ' . $jam_selesai . ':00';
        // dd($jadwal_mulai);
        DB::table('sp_jadwal')->insert([
            'kode_ruang' => $request->input('ruangan'),
            'id_detail_mapel' => $request->input('detail_mapel'), 
            'id_tentor' => $request->input('id_tentor'),
            'kuota_kelas' => $request->input('kuota'),
            'id_kelas' => $request->input('kelas'),
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->email,
            'jadwal_mulai' => $jadwal_mulai,
            'jadwal_selesai' => $jadwal_selesai
        ]);
        return redirect()->back()->with('message', 'Jadwal Berhasil Ditambahkan!');
    }

    public function kelas(){
        $data = DB::table('sp_kelas')->select("*")->orderby('created_at','DESC')->paginate(15);

        return view('admin/kelas',['data'=>$data]);
    }

    public function tambah_kelas_proses(Request $request){
        DB::table('sp_kelas')->insert([
            'nama_kelas' => $request->input('nama_kelas'),
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->email
        ]);

        return redirect()->back()->with('message', 'Kelas Berhasil Ditambahkan!');
    }

    

    public function detail_absensi($id){
        $data = DB::table('view_jadwal_mapel_siswa')->select("*")->where('id_jadwal',$id)->get();
        return view('admin/absensi',['data'=>$data]);
    }

    public function laporan_absensi($id){
        $data = DB::table('view_absensi_siswa')->select("*")->where('id_jadwal',$id)->get();
        return view('admin/laporan_absensi',['data'=>$data]);
    }

    public function tambah_absensi_proses(Request $request){
        $inputvalue = [];
        $id_jadwal = $request->input('id_jadwal');
        $id_siswa = $request->input('id_siswa');
        $keterangan = $request->input('keterangan');
      
       
        for($i=0;$i<count($id_siswa);$i++){
        
            $inputvalue[] = [ 
                            'id_jadwal'     => $id_jadwal[$i] ,
                            'id_siswa'   => $id_siswa[$i],
                            'keterangan' => $keterangan[$i],   
                            'created_by'    => Auth::user()->email,
                            'created_at'    => Carbon::now()
                        ];}
     
        DB::table('sp_absensi_siswa')->insert($inputvalue);
        return redirect()->back()->with('message', 'Jadwal Berhasil Ditambahkan!'); 
    }

    public function materi(){
        $data = DB::table('sp_materi_mapel')->select("*")->orderby('created_at','DESC')->paginate(15);
        $mapel = DB::table('sp_mata_pelajaran')->select("*")->orderby('created_at','DESC')->get();
        return view('admin/materi',['data'=>$data,'mapel'=>$mapel]);
    }

    public function download_materi($nama_file)
    {
    	$filePath = public_path(('materi').'/'.$nama_file);
    	$headers = ['Content-Type: application/pdf'];
    	$fileName = $nama_file;

    	return response()->download($filePath, $fileName, $headers);
    }

    public function tambah_materi_proses(Request $request){
        $nama_mapel = Helpers::get_mapel($request->input('id_mapel'), 'nama_mapel');
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
        $file_name = $nama_mapel.'_'.$request->input('nama_materi').'.'.$request->file->extension();  
        $request->file->move(public_path('materi'), $file_name);

        DB::table('sp_materi_mapel')->insert([
            'file_path' => $file_name,
            'id_mapel' => $request->input('id_mapel'),
            'nama_materi' => $request->input('nama_materi'),
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->email
        ]);
        return redirect()->back()->with('message', 'Jadwal Berhasil Ditambahkan!');
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

    public function admin(){
        $data = DB::table('sp_admin')->select("*")->orderby('created_at','DESC')->paginate(15);
        return view('admin/admin',['data'=>$data]);
    }

    public function tambah_admin_proses(Request $request){
        DB::table('sp_admin')->insert([
            'nama'=> $request->input('nama'),
            'email'=> $request->input('email'),
            'alamat'=> $request->input('alamat'),
            'telp'=> $request->input('telp'),
            'created_at'=> Carbon::now(),
            'created_by'=> Auth::user()->email,
            'status'=>1
        ]);
        
        DB::table('users')->insert([
            'email'=>$request->input('email'),
            'nama'=> $request->input('nama'),
            'role'=> 'admin',
            'password' => bcrypt('123456'),
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->email,
            'status' => 1
        ]);
        return redirect()->back()->with('message', 'Data Admin Berhasil Ditambahkan!');
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

    public function tambah_ruang_proses(Request $request){
        DB::table('sp_ruangan')->insert([
            'nama_ruang' => $request->input('nama_ruang'),
            'kuota' => $request->input('kuota'),
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->email
        ]);

        return redirect()->back()->with('message', 'Data Siswa Berhasil Ditambahkan!');
    }

    public function list_jadwal_skd(){
   
        $data = DB::table('sp_jadwal_ujian_skd')->select('*')->get(15);
        return view('admin/jadwal_skd',['data'=>$data]);
    }

    public function tambah_jadwal_skd_proses(Request $request){
        $string = date("Y/m/d", strtotime($request->input('tgl_ujian')));
        
        $jadwal_mulai =str_replace('/', '-', $string);
     
        DB::table('sp_jadwal_ujian_skd')->insert([
            'tgl_ujian' => $jadwal_mulai,
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->email
        ]);
        return redirect()->back()->with('message', 'Data Jadwal SKD Berhasil Ditambahkan!');
    }

    public function nilai_skd($id_jadwal){
        $siswa = DB::table('sp_siswa')->select("*")->where('status_siswa' , 0)->get();    
        if(Auth::user()->role == 'siswa'){
            $id = Helpers::get_siswa(Auth::user()->email,'id');
            $data = DB::table('view_nilai_skd')->select("*")->where('id_siswa',$id)->where('id_jadwal_skd',$id_jadwal)->paginate(15);
        }else{
            $data = DB::table('view_nilai_skd')->select("*")->where('id_jadwal_skd',$id_jadwal)->paginate(15);           
        }
        return view('admin/nilai_skd',['data'=>$data, 'siswa'=>$siswa]);
    }

    public function tambah_nilai_skd_proses(Request $request,$id_jadwal){
        $id_siswa = $request->input('id_siswa');
        $cek_data  =  DB::table('sp_nilai_skd')->select("*")->where('id_siswa',$id_siswa)->where('id_jadwal_skd',$id_jadwal)->get();
       
        if($cek_data->isEmpty()){
           
            $twk = $request->input('twk');
            $tiu = $request->input('tiu');
            $tkp = $request->input('tkp');
           
            $tgl_ujian = $request->input('tgl_ujian');
        
            if($twk >= 65){
                $ket_twk = 1;
            }else{
                $ket_twk = 0;
            }

            if($tiu >= 80){
                $ket_tiu = 1;
            }else{
                $ket_tiu = 0;
            }

            if($tkp >= 166){
                $ket_tkp = 1;
            }else{
                $ket_tkp = 0;
            }

            DB::table('sp_nilai_skd')->insert([
                'id_siswa' => $id_siswa,
                'twk' => $twk,
                'ket_twk' => $ket_twk,
                'tiu' => $tiu,
                'ket_tiu' => $ket_tiu,
                'tkp' => $tkp,
                'ket_tkp' => $ket_tkp,
                'id_jadwal_skd' => $id_jadwal,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->email,
            ]);

            return redirect()->back()->with('message', 'Data Nilai SKD Siswa Berhasil Ditambahkan!');
        }else{
            dd("hai");
            return redirect()->back()->with('message', 'Data Nilai SKD Siswa Sudah Ada!');

        }
    }

    public function list_jadwal_utbk(){
     
        $data = DB::table('sp_jadwal_ujian_utbk')->select('*')->get(15);
        return view('admin/jadwal_utbk',['data'=>$data]);
    }

    public function tambah_jadwal_utbk_proses(Request $request){
        $string = date("Y/m/d", strtotime($request->input('tgl_ujian')));
        
        $jadwal_mulai =str_replace('/', '-', $string);
        DB::table('sp_jadwal_ujian_utbk')->insert([
            'tgl_ujian' =>  $jadwal_mulai,
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->email
        ]);
        return redirect()->back()->with('message', 'Data Jadwal SKD Berhasil Ditambahkan!');
    }

    public function nilai_utbk($id_jadwal){
        $siswa = DB::table('sp_siswa')->select("*")->where('status_siswa' , 0)->get();  
        if(Auth::user()->role == 'siswa'){
            $id = Helpers::get_siswa(Auth::user()->email,'id');
            $data = DB::table('view_nilai_utbk')->select("*")->where('id_siswa',$id)->paginate(15);
        }else{
            $data = DB::table('view_nilai_utbk')->select("*")->where('id_jadwal_utbk',$id_jadwal)->paginate(15);           
        }
        return view('admin/nilai_utbk',['data'=>$data,'siswa'=>$siswa]);
    }

    public function tambah_nilai_utbk_proses(Request $request,$id_jadwal){
        $id_siswa = $request->input('id_siswa');
        $cek_data  =  DB::table('sp_nilai_utbk')->select("*")->where('id_siswa',$id_siswa)->where('id_jadwal_utbk',$id_jadwal)->get();
        if($cek_data->isEmpty()){
            $tps = $request->input('tps');
            $tbi = $request->input('tbi');
            $persen_tps = (100/60)*$tps;
            $persen_tbi = (100/20)*$tbi;
            $avg = ($persen_tps + $persen_tbi)/2;


            if($persen_tps >= 50){
                $ket_tps = 1;
            }else{
                $ket_tps = 0;
            }

            if($persen_tbi >= 40){
                $ket_tbi = 1;
            }else{
                $ket_tbi = 0;
            }

            
            DB::table('sp_nilai_utbk')->insert([
                'id_siswa' => $request->input('id_siswa'),
                'benar_tps' => $tps,
                'persen_tps' => $persen_tps,
                'ket_tps' => $ket_tps,
                'benar_tbi' => $tbi,
                'persen_tbi' => $persen_tbi,
                'ket_tbi' => $ket_tbi,
                'avg' => $avg,
                'id_jadwal_utbk' => $id_jadwal,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->email,
            ]);

            return redirect()->back()->with('message', 'Data Nilai UTBK Siswa Berhasil Ditambahkan!');
        }else{
            return redirect()->back()->with('message', 'Data Nilai UTBK Siswa Sudah Ada!');
        }
    }

  

    public function agenda(){
        $data = DB::table('sp_agenda')->select('*')->orderby('created_at','desc')->paginate(15);
        return view('admin/agenda',['data'=>$data]);
    }

    public function tambah_agenda(Request $request){
        $string = date("Y/m/d", strtotime($request->input('jadwal_mulai')));
        
        $jadwal_mulai =str_replace('/', '-', $string);
      
      
        DB::table('sp_agenda')->insert([
            'nama_agenda' => $request->input('nama_agenda'),
            'jadwal_mulai' => $jadwal_mulai,
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->email
        ]);
        return redirect()->back()->with('message', 'Data Siswa Berhasil Ditambahkan!');

    }


}