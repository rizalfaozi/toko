<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateadminsRequest;
use App\Http\Requests\UpdateadminsRequest;
use App\Repositories\AdminsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Criteria\adminsCriteria;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use DB;


class AdminsController extends AppBaseController
{
    /** @var  agentsRepository */
    private $adminsRepository;

    public function __construct(AdminsRepository $adminsRepo)
    {
        $this->adminsRepository = $adminsRepo;
    }

    /**
     * Display a listing of the agents.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $type = 'admin';
        $this->adminsRepository->pushCriteria(new adminsCriteria($type));
        $users = $this->adminsRepository->all();

        return view('admins.index')
            ->with(['admins'=> $users,'type'=>$type]);
    }

    /**
     * Show the form for creating a new agents.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $type = 'admin';

        return view('admins.create')->with(['type'=>$type]);

       
    }

    /**
     * Store a newly created agents in storage.
     *
     * @param CreateagentsRequest $request
     *
     * @return Response
     */
    public function store(CreateadminsRequest $request)
    {
        $type = 'admin';

        if($request->name ==""){
           Flash::error('Username masih kosong!!');
           return redirect(url('admins'));
        }else{

           $namez = DB::table('users')->where('name',$request->name)->first();
           if($namez ==null)
           {
             $input['name'] = $request->name;
           }else{
              Flash::error('Nama / Username sudah pernah digunakan!!');
             return redirect(url('admins'));
           }

         
             
        }

        if($request->email ==""){
           Flash::error('Email masih kosong!!');
           return redirect(url('admins'));
        }else{
           
           $email = DB::table('users')->where('email',$request->email)->first();
           if($email ==null)
           {
              $input['email'] = $request->email;  
           }else{
               Flash::error('Email sudah pernah digunakan!!');
               return redirect(url('admins'));
           }
          
           
        }

        if($request->phone ==""){
           Flash::error('Telp masih kosong!!');
           return redirect(url('admins'));
        }else{
           $input['phone'] = $request->phone; 
        } 

        if($request->status ==""){
           Flash::error('Status belum di pilih!!');
           return redirect(url('admins'));
        }else{
           $input['status'] = $request->status; 
        }

        if($request->password ==""){
           Flash::error('Password belum di isi!!');
           return redirect(url('admins'));
        }else{
            $input['password'] = bcrypt($request->password);
        }
        
        
        $input['type'] = $type;
     
  

      

         if($request->photo=='') 
            {
                        
                $input['photo'] = '';      

            }else{
              
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

        $user = $this->adminsRepository->create($input);

        Flash::success('Admin Berhasil disimpan..');
        return redirect(url('admins'));
       
    }

    /**
     * Display the specified agents.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id,Request $request)
    {
       
       $users = $this->adminsRepository->findWithoutFail($id);
        $type = 'admin';
        if (empty($users)) {
            Flash::error('Admin not found');

            return redirect(route('admins.index'));
        }

        return view('admins.show')->with(['admins'=> $users,'type'=>$type]);
        
    }

    /**
     * Show the form for editing the specified agents.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id,Request $request)
    {
        $users = $this->adminsRepository->findWithoutFail($id);
        $type = 'admin';
        if (empty($users)) {
            Flash::error('Admin not found');

            return redirect(url('admins'));
        }


        return view('admins.edit')->with(['admins'=> $users,'type'=>$type]);


    }

    public function update($id, UpdateadminsRequest $request)
    {
        $users = $this->adminsRepository->findWithoutFail($id);
        $type = 'admin';
        if (empty($users)) {
            Flash::error('Admin not found');

            return redirect(route('admins.index'));
        }

         if($request->name ==""){
           Flash::error('Username masih kosong!!');
           return redirect(url('admins'));
        }else{

           // $namez = DB::table('users')->where('name',$request->name)->first();
           // if($namez ==null)
           // {
             $input['name'] = $request->name;
           // }else{
           //    Flash::error('Nama / Username sudah pernah digunakan!!');
           //   return redirect(url('admins'));
           // }

         
             
        }

        if($request->email ==""){
           Flash::error('Email masih kosong!!');
           return redirect(url('admins'));
        }else{
           
           // $email = DB::table('users')->where('email',$request->email)->first();
           // if($email ==null)
           // {
              $input['email'] = $request->email;  
           // }else{
           //     Flash::error('Email sudah pernah digunakan!!');
           //     return redirect(url('admins'));
           // }
          
           
        }

        if($request->phone ==""){
           Flash::error('Telp masih kosong!!');
           return redirect(url('admins'));
        }else{
           $input['phone'] = $request->phone; 
        } 

        if($request->status ==""){
           Flash::error('Status belum di pilih!!');
           return redirect(url('admins'));
        }else{
           $input['status'] = $request->status; 
        }

       
       
       
         $input['type'] = $type;
       
         if($request->password =="")
         {
            $input['password'] = $users->password;
         }else{
             $input['password'] = bcrypt($request->password);
         }   

       

        if($request->photo =="")
        {

           $input['photo'] = $users->photo;

        }else{ 


           if($users->photo!='') 
           {     
             unlink($users->photo); 
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
         
          $users = $this->adminsRepository->update($input, $id);
        
          
          Flash::success('Admin Berhasil diupdate..');

           return redirect(url('admins'));
    }

    /**
     * Remove the specified agents from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {

        $users = $this->adminsRepository->findWithoutFail($id);
        if($users->photo !="")
        {
               unlink($users->photo);    
        }    
   
        if (empty($users)) {
            Flash::error('Admin not found');

            return redirect(route('admins.index'));
        }

        $this->adminsRepository->delete($id);

        Flash::success('Admin deleted successfully.');

        return redirect(url('admins'));
        
    }
}
