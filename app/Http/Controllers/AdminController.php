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
        $siswa_aktif = DB::table('sp_siswa')->select("*")->where('status',1)->where('status_siswa',0)->count();
        $tentor = DB::table('sp_tentor')->select("*")->where('status',1)->count();
        $siswa_lulus = DB::table('sp_siswa')->select("*")->where('status',1)->where('status_siswa',1)->count();
        $agenda = DB::table('sp_agenda')->select("*")->where('status',1)->orderby('jadwal_mulai','asc')->get();

        return view('admin/dashboard',['siswa_aktif'=>$siswa_aktif,'tentor'=>$tentor,'siswa_lulus'=>$siswa_lulus,'agenda'=>$agenda]);
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
        if(!$cek_data->isEmpty()){
            return redirect()->back()->with('error', 'Nama Mapel Sudah Ada!');
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
        $status = $request->input('status');
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

    public function hapus_mapel(Request $request){
        $id = $request->input('id_mapel');
        $id_detail_mapel = DB::table('sp_detail_mapel')->select('*')->where('id_mapel',$id)->get(1);
        $id_jadwal = DB::table('sp_jadwal')->select('*')->where('id_detail_mapel',@$id_detail_mapel[0]->id)->get(1);
        
        DB::table('sp_absensi_siswa')->where('id_jadwal',@$id_jadwal[0]->id)->delete();
        DB::table('sp_detail_mapel')->where('id_jadwal',@$id_jadwal[0]->id)->delete();
        DB::table('sp_jadwal_siswa')->where('id_jadwal',@$id_jadwal[0]->id)->delete();
        DB::table('sp_jadwal')->where('id_detail_mapel',$id)->delete();
        DB::table('sp_mata_pelajaran')->where('id',$id)->delete();
        return redirect()->back()->with('message', 'Data mata pelajaran berhasil dihapus!');

    }

    public function detail_mapel($id){ 
       
        $mapel = DB::table('sp_mata_pelajaran')->select("*")->get();
        $tentor =  DB::table('sp_tentor')->select("*")->get();
        if(Auth::user()->role == 'admin' ){
        $data= DB::table('view_detail_mapel')->select("*")->where('id_mapel',$id)->paginate(15);
        }else{
            $data= DB::table('view_detail_mapel')->select("*")->where('id_tentor',$id)->paginate(15);
        }
        return view('admin/detail_mapel',['data'=>$data,'mapel'=>$mapel,'tentor'=>$tentor]);
    }

    public function tambah_detail_mapel_proses(Request $request,$id_mapel){ 
        $id_tentor = $request->input('id_tentor');
        $cek_data = DB::table('sp_detail_mapel')->select("*")->where('id_mapel',$id_mapel)->where('id_tentor',$id_tentor)->get(1);
        if($cek_data->isEmpty()){
            DB::table('sp_detail_mapel')->insert([
                'id_mapel' => $id_mapel,
                'id_tentor' => $id_tentor,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->email,
                'status' => 1
            ]);
            return redirect()->back()->with('message', 'Tentor Dengan Mapel Ini Berhasil Ditambahkan!');
        }else{
            return redirect()->back()->with('error', 'Data Tentor Dengan Mapel Ini Sudah Ada!');
        }
    }

    public function edit_detail_mapel(Request $request){
        $id = $request->input('id_detail_mapel');
        
        $id_tentor = $request->input('id_tentor');
        $cek_data = DB::table('sp_detail_mapel')->select("*")->where('id',$id)->where('id_tentor',$id_tentor)->get();
        dd($cek_data);
        if($cek_data->isEmpty()){
            DB::table('sp_detail_mapel')->where('id',$id)->update([
                'id_tentor' => $id_tentor
             
            ]);
            return redirect()->back()->with('message', 'Tentor Dengan Mapel Ini Berhasil Diedit!');
        }else{
            return redirect()->back()->with('error', 'Data Tentor Dengan Mapel Ini Sudah Ada!');
        }
    }

    public function report_detail_mapel($id)
    {
        if(Auth::user()->email == 'tentor'){
            $data = DB::table('view_detail_mapel')->select("*")->where('id_tentor',$id)->orderby('created_at','desc')->get();
        }else{
            $data = DB::table('view_detail_mapel')->select("*")->where('id_mapel',$id)->orderby('created_at','desc')->get();
        }
       
     
        $pdf = PDF::setPaper('A4', 'potrait');
        $pdf->loadView('admin.report_detail_mapel', compact('data'));
        return $pdf->stream("Laporan_Detail_Mapel".'pdf');
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

    public function hapus_jadwal(Request $request){
        $id = $request->input('id_jadwal');
       DB::table('sp_jadwal')->where('id',$id)->delete();
       DB::table('sp_jadwal_siswa')->where('id_jadwal',$id)->delete();
       DB::table('sp_absensi_siswa')->where('id_jadwal',$id)->delete();
    return redirect()->back()->with('message', 'Jadwal berhasil dihapus!');
    }

    public function report_jadwal_mapel()
    {
        if(Auth::user()->email == 'siswa'){
            $id =  Helpers::get_siswa(Auth::user()->email,'id');
            $data = DB::table('view_jadwal_mapel_siswa')->select("*")->where('id_siswa',$id)->orderby('created_at','desc')->get();
        }elseif(Auth::user()->email == 'tentor'){
            $data = DB::table('view_jadwal_mapel')->select("*")->where('id_tentor',$id)->orderby('created_at','desc')->get();
 
        }else{
            $data = DB::table('view_jadwal_mapel')->select("*")->orderby('created_at','desc')->get();
        }
       
     
        $pdf = PDF::setPaper('A4', 'potrait');
        $pdf->loadView('admin.report_jadwal_mapel', compact('data'));
        return $pdf->stream("Laporan_Jadwal".'pdf');
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

    public function report_absensi($id)
    {
        $data = DB::table('view_absensi_siswa')->select("*")->where('id_jadwal',$id)->get();
        $jadwal =  DB::table('sp_jadwal')->select("jadwal_mulai")->where('id',$id)->get(1);
        $mapel =  DB::table('view_jadwal_mapel')->select("*")->where('id',$id)->get(1);
        $date =  date('d-m-Y', strtotime($jadwal[0]->jadwal_mulai));
     
        $pdf = PDF::setPaper('A4', 'potrait');
        $pdf->loadView('admin.report_absensi', compact('data', 'date'));
        return $pdf->stream("laporan_absensi-".$mapel[0]->nama_kelas.'-'.$mapel[0]->nama_mapel."-".$date.'pdf');
    }

    public function edit_absensi_siswa(Request $request){
        $id = $request->input('id_absensi_siswa');
        DB::table('sp_absensi_siswa')->where('id',$id)->update([
            'keterangan' => $request->input('keterangan'),
            'updated_at' => Carbon::now(),
            'updated_by' => Auth::user()->email
        ]);
        return redirect()->back()->with('message', 'Keterangan Absensi Berhasil Diupdate!');
    }

    public function hapus_absensi_siswa(Request $request){
        $id = $request->input('id_absensi_siswa');
        DB::table('sp_absensi_siswa')->where('id',$id)->delete();
        return redirect()->back()->with('message', 'Absensi Berhasil Dihapus!');
    }

    public function hapus_jadwal_siswa(Request $request){
        $id_siswa = $request->input('id_siswa');
        $id_jadwal = $request->input('id_jadwal');
       
        DB::table('sp_jadwal_siswa')->where('id_siswa',$id_siswa)->where('id_jadwal',$id)->delete();
        DB::table('sp_absensi_siswa')->where('id_siswa',$id_siswa)->where('id_jadwal',$id)->delete();
        return redirect()->back()->with('message', 'Data Berhasil Dihapus!');
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


    public function edit_materi(Request $request){
        $nama_mapel = Helpers::get_mapel($request->input('id_mapel'), 'nama_mapel');
        $id = $request->input('id_materi');
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
        $file_name = $nama_mapel.'_'.$request->input('nama_materi').'.'.$request->file->extension();  
        $request->file->move(public_path('materi'), $file_name);

        DB::table('sp_materi_mapel')->where('id',$id)->update([
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

    public function report_tentor()
    {
        $data = DB::table('sp_tentor')->select("*")->orderby('created_at','DESC')->paginate(15);
     
        $pdf = PDF::setPaper('A4', 'potrait');
        $pdf->loadView('admin.report_tentor', compact('data' ));
        return $pdf->stream("Laporan_Tentor".'pdf');
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

    public function edit_tentor(Request $request){
        $id = $request->input('id_tentor');
        DB::table('sp_tentor')->where('id',$id)->update([
            'nama'=> $request->input('nama'),
            'alamat'=> $request->input('alamat'),
            'telp'=> $request->input('telp'),
            'updated_at'=> Carbon::now(),
            'updated_by'=> Auth::user()->email,
            'status'=>$request->input('status')
        ]);
        
       
        return redirect()->back()->with('message', 'Data tentor berhasil diedit!');
    }

    public function admin(){
        $data = DB::table('sp_admin')->select("*")->orderby('created_at','DESC')->paginate(15);
        return view('admin/admin',['data'=>$data]);
    }

    public function report_admin ()
    {
        $data = DB::table('sp_admin')->select("*")->orderby('created_at','DESC')->paginate(15);
     
        $pdf = PDF::setPaper('A4', 'potrait');
        $pdf->loadView('admin.report_admin', compact('data' ));
        return $pdf->stream("Laporan_Admin".'pdf');
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

    public function edit_admin(Request $request){
        $id = $request->input('id_admin');
        DB::table('sp_admin')->where('id',$id)->update([
            'nama'=> $request->input('nama'),
           
            'alamat'=> $request->input('alamat'),
            'telp'=> $request->input('telp'),
            'updated_at'=> Carbon::now(),
            'updated_by'=> Auth::user()->email,
            'status'=>$request->input('status')
        ]);
        
       
        return redirect()->back()->with('message', 'Data admin berhasil diedit!');
    }

    public function edit_user(Request $request){
      
      
        $id = $request->input('id');
        DB::table('users')->where('id',$id)->update([
            'password'=>bcrypt($request->input('password')),
            'updated_at' => Carbon::now(),
            'updated_by' => Auth::user()->email
        ]);
        return redirect()->back()->with('message', 'Data user berhasil diedit!');
    }


    public function siswa(){
        $data = DB::table('sp_siswa')->select("*")->orderby('created_at','DESC')->paginate(15);
        $program = DB::table('sp_program')->select("*")->orderby('created_at','DESC')->paginate(15);
        return view('admin/siswa',['data'=>$data,'program'=>$program]);
    }

    public function report_siswa ()
    {
        $data = DB::table('sp_siswa')->select("*")->orderby('created_at','DESC')->paginate(15);
     
        $pdf = PDF::setPaper('A4', 'potrait');
        $pdf->loadView('admin.report_siswa', compact('data' ));
        return $pdf->stream("Laporan_Siswa".'pdf');
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

    public function edit_siswa(Request $request){
        $id = $request->input('id_siswa');
        DB::table('sp_siswa')->where('id',$id)->update([
            'nama'=> $request->input('nama'),
           
            'alamat'=> $request->input('alamat'),
            'telp'=> $request->input('telp'),
            'updated_at'=> Carbon::now(),
            'updated_by'=> Auth::user()->email,
            'status'=>$request->input('status')
        ]);
        
       
        return redirect()->back()->with('message', 'Data siswa berhasil diedit!');
    }

    public function program_belajar(){
        $data = DB::table('sp_program')->select("*")->orderby('created_at','DESC')->paginate(15);
        return view('admin/program_belajar',['data'=>$data]);
    }

    public function tambah_program(Request $request){
       
        DB::table('sp_program')->insert([
            'nama_program'=> $request->input('nama_program'),
           
            'keterangan'=> $request->input('keterangan'),
            'status'=> $request->input('status'),
            'harga'=> $request->input('harga'),
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->email
        ]);
        
       
        return redirect()->back()->with('message', 'Data program berhasil ditambah!');
    }

    public function edit_program(Request $request){
        $kode = $request->input('kode');
        DB::table('sp_program')->where('kode',$kode)->update([
            'nama_program'=> $request->input('nama_program'),
           
            'keterangan'=> $request->input('keterangan'),
            'status'=> $request->input('status'),
            'harga'=> $request->input('harga'),
           
        ]);
        
       
        return redirect()->back()->with('message', 'Data program berhasil diedit!');
    }

    public function hapus_program(Request $request){
        $kode = $request->input('kode');
        DB::table('sp_program')->where('kode',$kode)->delete();
        DB::table('sp_siswa')->where('kode_program',$kode)->update([
            'kode_program'=> null,
                    
        ]);
       
        return redirect()->back()->with('message', 'Data program berhasil dihapus!');
    }

    public function report_program()
    {
        $data = DB::table('sp_program')->select("*")->orderby('created_at','DESC')->paginate(15);
     
        $pdf = PDF::setPaper('A4', 'potrait');
        $pdf->loadView('admin.report_program', compact('data' ));
        return $pdf->stream("Laporan_Program".'pdf');
    }

    public function ruang_kelas(){
        $data = DB::table('sp_ruangan')->select("*")->orderby('created_at','DESC')->paginate(15);
        return view('admin/ruang_kelas',['data'=>$data]);
    }

    public function tambah_ruang_proses(Request $request){
        DB::table('sp_ruangan')->insert([
            'nama_ruang' => $request->input('nama_ruangan'),
            'kuota' => $request->input('kuota'),
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->email
        ]);

        return redirect()->back()->with('message', 'Data ruangan berhasil ditambahkan!');
    }

    public function edit_ruang(Request $request){
        $id = $request->input('id_ruang');
        DB::table('sp_ruangan')->where('id',$id)->update([
            'nama_ruang' => $request->input('nama_ruang'),
           
        ]);

        return redirect()->back()->with('message', 'Data ruangan berhasil diedit!');
    }

    public function edit_kelas(Request $request){
        $id = $request->input('id_kelas');
      
        DB::table('sp_kelas')->where('id',$id)->update([
            'nama_kelas' => $request->input('nama_kelas'),
            'updated_at' => Carbon::now(),
            'updated_by' => Auth::user()->email
        ]);
        return redirect()->back()->with('message', 'Data kelas berhasil diupdate!');
    }

    public function list_jadwal_skd(){
   
        $data = DB::table('sp_jadwal_ujian_skd')->select('*')->get(15);
        return view('admin/jadwal_skd',['data'=>$data]);
    }

    public function tambah_jadwal_skd_proses(Request $request){
        $string = date("Y/m/d", strtotime($request->input('tgl_ujian')));
        
        $jadwal_mulai =str_replace('/', '-', $string);
        $cek_data = DB::table('sp_jadwal_ujian_skd')->select("*")->wheredate('tgl_ujian',$jadwal_mulai)->get();
        if($cek_data->isEmpty()){
            DB::table('sp_jadwal_ujian_skd')->insert([
                'tgl_ujian' => $jadwal_mulai,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->email
            ]);
            return redirect()->back()->with('message', 'Data Jadwal SKD Berhasil Ditambahkan!');
        }else{
            return redirect()->back()->with('error', 'Data Jadwal SKD Sudah Ada!');
        }
    }

    public function edit_jadwal_skd(Request $request){
        $string = date("Y/m/d", strtotime($request->input('tgl_ujian')));
        
        $jadwal_mulai =str_replace('/', '-', $string);
        $id = $request->input('id_jadwal_skd');
        $cek_data = DB::table('sp_jadwal_ujian_skd')->select("*")->wheredate('tgl_ujian',$jadwal_mulai)->get();

        if($cek_data->isEmpty()){
            DB::table('sp_jadwal_ujian_skd')->where('id',$id)->update([
                'tgl_ujian' => $jadwal_mulai,
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::user()->email
            ]);
            return redirect()->back()->with('message', 'Data Jadwal SKD Berhasil Diedit!');
        }else{
            return redirect()->back()->with('error', 'Data Jadwal SKD Sudah Ada!');
        }
    }

    public function hapus_jadwal_skd(Request $request){
        $id = $request->input('id_jadwal_skd');
        DB::table('sp_nilai_skd')->where('id_jadwal_skd',$id)->delete();
        DB::table('sp_jadwal_ujian_skd')->where('id',$id)->delete();

        return redirect()->back()->with('message', 'Data Jadwal SKD Berhasil Dihapus!');
    }

    public function nilai_skd($id_jadwal){
        $siswa = DB::table('sp_siswa')->select("*")->where('status_siswa' , 0)->get();    
        if(Auth::user()->role == 'siswa'){
            // $id = Helpers::get_siswa(Auth::user()->email,'id');
            $data = DB::table('view_nilai_skd')->select("*")->where('id_siswa',$id_jadwal)->orderby('tgl_ujian','desc')->paginate(15);
        }else{
            $data = DB::table('view_nilai_skd')->select("*")->where('id_jadwal_skd',$id_jadwal)->orderby('twk','desc')->orderby('tiu','desc')
            ->orderby('tkp','desc')->paginate(15);           
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

    public function edit_nilai_skd(Request $request){
        $id = $request->input('id_nilai_skd');
        $tiu = $request->input('tiu');
        $twk = $request->input('twk');
       
        $tkp = $request->input('tkp');
        
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

            DB::table('sp_nilai_skd')->where('id',$id)->update([
               
                'twk' => $twk,
                'ket_twk' => $ket_twk,
                'tiu' => $tiu,
                'ket_tiu' => $ket_tiu,
                'tkp' => $tkp,
                'ket_tkp' => $ket_tkp,
               
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::user()->email,
            ]);
            return redirect()->back()->with('message', 'Data nilai SKD siswa berhasil Diedit!');

    }

    public function hapus_nilai_skd(Request $request){
        $id = $request->input('id_nilai_skd');
        DB::table('sp_nilai_skd')->where('id',$id)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus!');
    }

    public function report_nilai_skd ($id)
    {
        $data = DB::table('view_nilai_skd')->select("*")->where('id_jadwal_skd',$id)->get();
      
        $date =  date('d-m-Y', strtotime($data[0]->tgl_ujian));
     
        $pdf = PDF::setPaper('A4', 'potrait');
        $pdf->loadView('admin.report_nilai_skd', compact('data', 'date'));
        return $pdf->stream("Laporan_SKD-".$date.'pdf');
    }

    public function list_jadwal_utbk(){
     
        $data = DB::table('sp_jadwal_ujian_utbk')->select('*')->get(15);
        return view('admin/jadwal_utbk',['data'=>$data]);
    }

    public function tambah_jadwal_utbk_proses(Request $request){
        $string = date("Y/m/d", strtotime($request->input('tgl_ujian')));
        $jadwal_mulai =str_replace('/', '-', $string);
        $cek_data = DB::table('sp_jadwal_ujian_utbk')->select("*")->wheredate('tgl_ujian',$jadwal_mulai)->get();
     
        if($cek_data->isEmpty()){
           
            DB::table('sp_jadwal_ujian_utbk')->insert([
                'tgl_ujian' =>  $jadwal_mulai,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->email
            ]);
            return redirect()->back()->with('message', 'Data Jadwal UTBK Berhasil Ditambahkan!');
        }else{
            return redirect()->back()->with('error', 'Data Jadwal UTBK Sudah Ada!');
        }
    }

    public function edit_jadwal_utbk(Request $request){
        $string = date("Y/m/d", strtotime($request->input('tgl_ujian')));
        
        $jadwal_mulai =str_replace('/', '-', $string);
        $id = $request->input('id_jadwal_utbk');
        $cek_data = DB::table('sp_jadwal_ujian_utbk')->select("*")->wheredate('tgl_ujian',$jadwal_mulai)->get();

        if($cek_data->isEmpty()){
            DB::table('sp_jadwal_ujian_utbk')->where('id',$id)->update([
                'tgl_ujian' => $jadwal_mulai,
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::user()->email
            ]);
            return redirect()->back()->with('message', 'Data Jadwal UTBK Berhasil Diedit!');
        }else{
            return redirect()->back()->with('error', 'Data Jadwal UTBK Sudah Ada!');
        }
    }

    public function hapus_jadwal_utbk(Request $request){
        $id = $request->input('id_jadwal_utbk');
      
        DB::table('sp_nilai_utbk')->where('id_jadwal_utbk',$id)->delete();
        DB::table('sp_jadwal_ujian_utbk')->where('id',$id)->delete();

        return redirect()->back()->with('message', 'Data Jadwal UTBK Berhasil Dihapus!');
    }

    public function nilai_utbk($id_jadwal){
        $siswa = DB::table('sp_siswa')->select("*")->where('status_siswa' , 0)->get();  
        if(Auth::user()->role == 'siswa'){
            $data = DB::table('view_nilai_utbk')->select("*")->where('id_siswa',$id_jadwal)->orderby('tgl_ujian','desc')->paginate(15);
        }else{
            $data = DB::table('view_nilai_utbk')->select("*")->where('id_jadwal_utbk',$id_jadwal)->orderby('benar_tps','desc')->orderby('benar_tbi','desc')->paginate(15);           
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

    public function edit_nilai_utbk(Request $request){
      
            $id = $request->input('id_nilai_utbk'); 
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

            
            DB::table('sp_nilai_utbk')->where('id',$id)->update([
               
                'benar_tps' => $tps,
                'persen_tps' => $persen_tps,
                'ket_tps' => $ket_tps,
                'benar_tbi' => $tbi,
                'persen_tbi' => $persen_tbi,
                'ket_tbi' => $ket_tbi,
                'avg' => $avg,
                
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::user()->email,
            ]);

            return redirect()->back()->with('message', 'Data nilai UTBK siswa berhasil Diedit!');
        
    }

    public function hapus_nilai_utbk(Request $request){
        $id = $request->input('id_nilai_utbk');
        DB::table('sp_nilai_utbk')->where('id',$id)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus!');
    }

    public function report_nilai_utbk($id)
    {
        $data = DB::table('view_nilai_utbk')->select("*")->where('id_jadwal_utbk',$id)->get();
      
        $date =  date('d-m-Y', strtotime($data[0]->tgl_ujian));
     
        $pdf = PDF::setPaper('A4', 'potrait');
        $pdf->loadView('admin.report_nilai_utbk', compact('data', 'date'));
        return $pdf->stream("Laporan_UTBK-".$date.'pdf');
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

    public function edit_agenda(Request $request){

        $string = date("Y/m/d", strtotime($request->input('jadwal_mulai')));
        $jadwal_mulai =str_replace('/', '-', $string);
        $id = $request->input('id_agenda');
      
        DB::table('sp_agenda')->where('id',$id)->update([
            'nama_agenda' => $request->input('nama_agenda'),
            'jadwal_mulai' => $jadwal_mulai
        ]);

        return redirect()->back()->with('message', 'Data agenda berhasil diedit!');

    }





}