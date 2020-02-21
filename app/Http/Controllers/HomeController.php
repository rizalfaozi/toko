<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';

        $grafik = ['Grafik'];
        $style = array(['fontSize'=>'10px','fontFamily'=>'Verdana, sans-serif']);
        $label = array(['align'=>'right','style'=>$style]);

        $data1 = [240];
        $data2 = [230];
        $data3 = [220];
        $data4 = [210];
        $data5 = [200];
        $data6 = [190];
        $data7 = [250];
        $data8 = [300];
        $data9 = [270];
        $data10 = [190];
        $data11 = [150];
        $data12 = [180];

        $series1 = array('name'=>'Januari','data'=>$data1);
        $series2 = array('name'=>'Februari','data'=>$data2);
        $series3 = array('name'=>'Maret','data'=>$data3);
        $series4 = array('name'=>'April','data'=>$data4);
        $series5 = array('name'=>'Mei','data'=>$data5);
        $series6 = array('name'=>'Juni','data'=>$data6);
        $series7 = array('name'=>'Juli','data'=>$data7);
        $series8 = array('name'=>'Agustus','data'=>$data8);
        $series9 = array('name'=>'September','data'=>$data9);
        $series10 = array('name'=>'Oktober','data'=>$data10);
        $series11 = array('name'=>'November','data'=>$data11);
        $series12 = array('name'=>'Desember','data'=>$data12);

        // $data['chart'] = array('color'=>'column','marginTop'=>80); 
        // $data['credits'] = array('enabled'=>false); 
        // $data['tooltip'] = array('shared'=>false,'crosshairs'=>false);
        // $data['title'] = array('text'=>'JUMLAH ALERT');
        // $data['subtitle'] = array('text'=>'TAHUN 2019'); 


        // $data['xAxis'] = array('categories'=>$grafik,'labels'=>$label);
        // $data['legend'] = array('enabled'=>true);
        $data = array($series1,$series2,$series3,$series4,$series5,$series6,$series7,$series8,$series9,$series10,$series11,$series12);

        return view('home')->with(['type'=>$title,'data'=>$data]);
    }


    public function getDatajson()
    {
        
      $alert = DB::tabel('alert')->count();

    }

    public function profile(){
    $user = Auth::user();
   
    return view('teams.show')->with(['teams'=>$user,'type'=>'Profile']);
   }

   public function password(){
    
    return view('teams.password')->with('type','Ubah Password');
   }


   public function updateuser(Request $request){
     $user = Auth::user();

      if($request->name ==""){
           Flash::error('Username masih kosong!!');
           return redirect(url('teams'));
        }else{
           $input['name'] = $request->name;  
        }

        if($request->email ==""){
           Flash::error('Email masih kosong!!');
           return redirect(url('teams'));
        }else{
           $input['email'] = $request->email;  
        }

        if($request->phone ==""){
           Flash::error('Telp masih kosong!!');
           return redirect(url('teams'));
        }else{
           $input['phone'] = $request->phone; 
        } 

        if($request->status ==""){
           Flash::error('Status belum di pilih!!');
           return redirect(url('teams'));
        }else{
           $input['status'] = $request->status; 
        }


       
        $input['username'] = '';
        
      
        if($request->address ==""){
           $input['address'] = '';
        }else{
           $input['address'] = $request->address; 
        }
       
       
        $input['nik'] = '';
       


        
        $input['alternative_phone'] = '';
       

       
        $input['blood_type'] = '';
        $input['active_period'] = '0000-00-00';  
        $input['transport_type'] = '';  
        $input['color'] = '';  
        $input['apps_group'] = '';  
        $input['transport_number'] = '';

       
   
         $input['type'] = $type;
         if($request->password =="")
         {
            $input['password'] = $teams->password;
         }else{
             $input['password'] = bcrypt($request->password);
         }   

       

        if($request->photo =="")
        {

           $input['photo'] = $teams->photo;

        }else{ 


           if($teams->photo!='') 
           {     
             unlink($teams->photo); 
           }   


          $date = date("Y-m-d");
          $time = date("H:i:s");   
          $fileFormat = ".jpg";
          
          $dates = explode('-',$date);
          $times = explode(':',$time);
          $fileName = $dates[0].$dates[1].$dates[2].$times[0].$times[1].$times[2];
          $fullPath = "files/photo/".$fileName.$fileFormat;

          File::makeDirectory($request->photo, 0777, true, true);

          $img = Image::make($request->photo)->save($fullPath, 60);
          $input['photo'] = $fullPath;

        }

          $input['status'] = $request->status;
         
          DB::table('users')->where('id',$user->id)->update($input);

      Flash::success('Profile updated successfully.');

      return redirect(url('home'));


   }


    public function updatepassword(Request $request){
     $user = Auth::user();

      if (!Auth::validate(array('email' => Auth::user()->email, 'password' => $request->old_password)))
      {

        Flash::error('Password not match.!!');
        return redirect(url('password')); 
      }else{

        if($request->password != $request->password_replace)
        {

          Flash::error('Password not match.!!');
          return redirect(url('password')); 
        }else{  
 
        DB::table('users')
       ->where('id',$user->id)
       ->update(['password'=> bcrypt($request->password)]);

        Flash::success('Password updated successfully.');
        return redirect(url('home'));

        }

      }

   }

   public function notifications(){

     $alert = DB::table('alerts as a')
     ->select('a.id','b.name','b.photo','a.created_at')
     ->join('users as b','a.user_id','=','b.id')
     ->where('a.status','false')
     ->get();

      $data = array();
      for($i=0; $i<count($alert); $i++)
      {
       $data[$i]['id'] = $alert[$i]->id;
       $data[$i]['photo'] = $alert[$i]->photo;
       $data[$i]['name'] = $alert[$i]->name;
       $data[$i]['created_at'] = $this->tgl($alert[$i]->created_at);

       

      }

   

     return response()->json(['status'=>true,'data'=>$data,'jml'=>count($alert) ,'message'=>'Data Alert By Team']);
      
       

   }


   public function grafik(){

        $grafik = array('Grafik');
        $style = array(['fontSize'=>'10px','fontFamily'=>'Verdana, sans-serif']);
        $label = array(['align'=>'right','style'=>$style]);

        $data1 = array('240');
        $data2 = array('150');
        $data3 = array('100');

        $series1 = array(['name'=>'Januari','data'=>$data1]);
        $series2 = array(['name'=>'Februari','data'=>$data2]);
        $series3 = array(['name'=>'Maret','data'=>$data3]);

        $data['chart'] = array(['color'=>'column','marginTop'=>80]); 
        $data['credits'] = array(['enabled'=>false]); 
        $data['tooltip'] = array(['shared'=>false,'crosshairs'=>false]);
        $data['title'] = array(['text'=>'JUMLAH ALERT']);
        $data['subtitle'] = array(['text'=>'TAHUN 2019']); 


        $data['xAxis'] = array(['categories'=>$grafik,'labels'=>$label]);
        $data['legend'] = array(['enabled'=>true]);
        $data['series'] = array($series1,$series2,$series3);

        return response()->json(['data'=>$data]);
   }

   public function tgl($tgl, $hari_tampil = true){

        $bulan  = array("Januari"
                        , "Februari"
                        , "Maret"
                        , "April"
                        , "Mei"
                        , "Juni"
                        , "Juli"
                        , "Agustus"
                        , "September"
                        , "Oktober"
                        , "November"
                        , "Desember");
        $hari   = array("Senin"
                        , "Selasa"
                        , "Rabu"
                        , "Kamis"
                        , "Jum'at"
                        , "Sabtu"
                        , "Minggu");
        $tahun_split    = substr($tgl, 0, 4);
        $bulan_split    = substr($tgl, 5, 2);
        $hari_split     = substr($tgl, 8, 2);
        $tmpstamp       = mktime(0, 0, 0, $bulan_split, $hari_split, $tahun_split);
        $bulan_jadi     = $bulan[date("n", $tmpstamp)-1];
        $hari_jadi      = $hari[date("N", $tmpstamp)-1];
        if(!$hari_tampil)
        $hari_jadi="";
        return $hari_jadi.", ".$hari_split." ".$bulan_jadi." ".$tahun_split;

    }
}
