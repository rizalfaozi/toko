<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBrandsRequest;
use App\Http\Requests\UpdateBrandsRequest;
use App\Repositories\BrandsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Criteria\brandsCriteria;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use DB;


class BrandsController extends AppBaseController
{
    /** @var  agentsRepository */
    private $BrandsRepository;

    public function __construct(BrandsRepository $brandsRepo)
    {
        $this->BrandsRepository = $brandsRepo;
    }

    /**
     * Display a listing of the agents.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
      
        $this->BrandsRepository->pushCriteria(new brandsCriteria($request));
        $brands = $this->BrandsRepository->all();

        return view('brands.index')
            ->with(['brands'=> $brands]);
    }

    /**
     * Show the form for creating a new agents.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $kategori = DB::table('brands')->get();
    
        
        $jml = count($kategori);

        
        return view('brands.create')->with(['kategori'=>$kategori,'jml'=>$jml]);

       
    }

    /**
     * Store a newly created agents in storage.
     *
     * @param CreateagentsRequest $request
     *
     * @return Response
     */
    public function store(CreateBrandsRequest $request)
    {
    
  
       
      
        


        
         $input['name'] = $request->name;
          $input['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name))); 
         $input['setting'] = $request->setting;
         $input['menu_id'] = $request->menu_id;
      
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

        $brands = $this->BrandsRepository->create($input);

        Flash::success('Brand Berhasil disimpan..');
        return redirect(url('brands'));
       
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
       
       $brands = $this->BrandsRepository->findWithoutFail($id);
       
        if (empty($brands)) {
            Flash::error('Brand not found');

            return redirect(route('brands.index'));
        }

        return view('brands.show')->with(['brands'=> $brands]);
        
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
        $brands = $this->BrandsRepository->findWithoutFail($id);
        $kategori = DB::table('brands')->get();
        $jml = count($kategori);
        if (empty($brands)) {
            Flash::error('User not found');

            return redirect(url('brands'));
        }

       

       
        return view('brands.edit')->with(['brands'=> $brands,'kategori'=>$kategori,'jml'=>$jml]);


    }

    public function update($id, UpdateBrandsRequest $request)
    {
        $brands = $this->BrandsRepository->findWithoutFail($id);
         $input['setting'] = $request->setting;
         $input['menu_id'] = $request->menu_id;
        
        if($request->name ==""){
           Flash::error('Nama kategori tidak boleh kosong');

            return redirect(url('brands'));
        }else{
           $input['name'] = $request->name; 
            $input['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name))); 
        }


        if($request->photo =="")
        {

           $input['photo'] = $brands->photo;

        }else{ 


           if($brands->photo!='') 
           {     
             unlink($brands->photo); 
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

      
         
          $brands = $this->BrandsRepository->update($input, $id);
        
          
          Flash::success('Brands Berhasil diupdate..');

           return redirect(url('brands'));
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

        $brands = $this->BrandsRepository->findWithoutFail($id);
        if($brands->photo !="")
        {
               unlink($brands->photo);    
        }    
   
        if (empty($brands)) {
            Flash::error('Brand not found');

            return redirect(route('brands.index'));
        }

        $this->BrandsRepository->delete($id);

        Flash::success('Brand berhasil dihapus');

        return redirect(url('brands'));
        
    }
}
