<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMixRequest;
use App\Http\Requests\UpdateMixRequest;
use App\Repositories\MixRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;

class MixController extends AppBaseController
{
    /** @var  MixRepository */
    private $mixRepository;

    public function __construct(MixRepository $mixRepo)
    {
        $this->mixRepository = $mixRepo;
    }

    /**
     * Display a listing of the Mix.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->mixRepository->pushCriteria(new RequestCriteria($request));
        $mixes = DB::table('mixes')->groupBy('sub_brand_id','name')->get();

        $recins = DB::table('stocks')->where('name','Recin')->get();
        if(!empty($recins))
        {
           $recin = $recins[0]->total_size;
        }else{

           $recin = 0;
        }    

        $talks = DB::table('stocks')->where('name','Talk')->get();
        if(!empty($talks))
        {
           $talk =  $talks[0]->total_size;
        }else{

           $talk = 0;
        } 


        $kataliss = DB::table('stocks')->where('name','Katalis')->get();
        if(!empty($kataliss)){
            $katalis = $kataliss[0]->total_size;
        }else{
            $katalis = 0;
        }

        $mets = DB::table('stocks')->where('name','Met')->get();
        if(!empty($mets)){
            $met =  $mets[0]->total_size;
        }else{
            $met = 0;
        }    

        $dempuls = DB::table('stocks')->where('name','Dempul')->get();
        if(!empty($dempuls)){
           $dempul = $dempuls[0]->total_size;
        }else{
           $dempul = 0;
        }


        return view('mixes.index')
           ->with(['mixes'=> $mixes,'recin'=>$recin,'talk'=>$talk,'katalis'=>$katalis,'met'=>$met,'dempul'=>$dempul]);
    }

    /**
     * Show the form for creating a new Mix.
     *
     * @return Response
     */
    public function create()
    {
        $stock = DB::table('stocks')->get();
        $brands = DB::table('brands')->where('setting','utama')->get();
        return view('mixes.create')->with(['stock'=>$stock,'brands'=>$brands]);
    }

    /**
     * Store a newly created Mix in storage.
     *
     * @param CreateMixRequest $request
     *
     * @return Response
     */
    public function store(request $request)
    {
        //$input = $request->all();
        if($request->size1 !="")
        {
           $recint = DB::table('stocks')->where('name','Recin')->first()->total_size;
           $recinTotal =  (int) $recint - (int) $request->size1;
           if($recint <0) {
                Flash::error('Stok Recin Kurang atau sudah habis');
                return redirect(route('mixes.index'));
           }else{
            
            // $recints = (int) $recint - (int) $recinTotal;
            $recintUpdate = DB::table('stocks')->where('name','Recin')->update(['total_size'=>$recinTotal]); 
           
           }
             
        }else{

            Flash::error('Takaran Recin Masih Kosong');
            return redirect(route('mixes.index'));
        }



        if($request->size2 !="")
        { 
            $talk = DB::table('stocks')->where('name','Talk')->first()->total_size;
            $talkTotal =  (int) $talk - (int) $request->size2;
            if($talkTotal <0) {
                Flash::error('Stok Talk Kurang atau sudah habis');
                return redirect(route('mixes.index'));

            }else{

                 
                $talkUpdate = DB::table('stocks')->where('id',$request->kode2)->update(['total_size'=>$talkTotal]); 
                
            }

        }else{
            
            Flash::error('Takaran Talk Masih Kosong');
            return redirect(route('mixes.index'));
        } 

        if($request->size3 !="")
        {
            $katalis = DB::table('stocks')->where('name','Katalis')->first()->total_size;
            $katalisTotal =  (int) $katalis - (int) $request->size3;
            if($katalisTotal <0)
            {
               Flash::error('Stok Katalis Kurang atau sudah habis');
                return redirect(route('mixes.index'));
            }else{
                
            $katalisUpdate = DB::table('stocks')->where('id',$request->kode3)->update(['total_size'=>$katalisTotal]);

            }    
            
        }else{
            
            Flash::error('Takaran Katalis Masih Kosong');
            return redirect(route('mixes.index'));
        }  

        if($request->size4 !="")
        {
           $met = DB::table('stocks')->where('name','Met')->first()->total_size;
           $metTotal =  (int) $met - (int) $request->size4;
           if($metTotal <0){
              Flash::error('Stok Met Kurang atau sudah habis');
                return redirect(route('mixes.index'));
           }else{
               $metUpdate = DB::table('stocks')->where('id',$request->kode4)->update(['total_size'=>$metTotal]);         
           }
          

        }else{
            
            Flash::error('Takaran Met Masih Kosong');
            return redirect(route('mixes.index'));
        } 

        if($request->size5 !="")
        {
           $dempul = DB::table('stocks')->where('name','Dempul')->first()->total_size;
           $dempulTotal =  (int) $dempul - (int) $request->size5;
           if($dempulTotal <0){
                Flash::error('Stok Dempul Kurang atau sudah habis');
                return redirect(route('mixes.index'));
           }else{
              $dempulUpdate = DB::table('stocks')->where('id',$request->kode5)->update(['total_size'=>$dempulTotal]); 
           }

           

        }else{
           

            Flash::error('Takaran Dempul Masih Kosong');
            return redirect(route('mixes.index'));
        }    

    if($request->name !="" && $recint >0 && $talkTotal >0 && $katalisTotal >0 && $metTotal >0 && $dempulTotal >0)
    {    
       DB::table('mixes')->insert(['name'=>$request->name,'recin'=>$request->size1,'talk'=>$request->size2,'katalis'=>$request->size3,'met'=>$request->size4,'dempul'=>$request->size5,'brand_id'=>$request->brand_id,'sub_brand_id'=>$request->sub_brand_id,'created_at'=> date('Y-m-d h:i:sa') ]);

       // // $mix = $this->mixRepository->create($input);
         $check = DB::table('stock_orders')->where(['name'=>$request->name,'brand_id'=>$request->brand_id,'sub_brand_id'=>$request->sub_brand_id])->first();
         if(empty($check))
         {
            $stock = 1;
            DB::table('stock_orders')->insert(['name'=>$request->name,'stock'=> $stock,'brand_id'=>$request->brand_id,'sub_brand_id'=>$request->sub_brand_id,'created_at'=> date('Y-m-d h:i:sa')]);
         }else{
            $stock = (int) $check->stock + (int) 1;
            DB::table('stock_orders')->where(['name'=>$request->name,'brand_id'=>$request->brand_id,'sub_brand_id'=>$request->sub_brand_id])->update(['stock'=> $stock,'updated_at'=> date('Y-m-d h:i:sa')]);
         }   

      


       Flash::success('Mix saved successfully.');
       return redirect(route('mixes.index'));

    }else{

        Flash::error('Form Bahan Belum Lengkap!');
        return redirect(route('mixes.index'));
    }
       

       
    }

    public function product($id){

       $mix =  DB::table('mixes')->where('id',$id)->first();
       
       DB::table('products')->insert(['name'=>$mix->name,'photo'=>'','price'=>'','description'=>'','theme'=>'','color'=>'','brand_id'=>$mix->brand_id,'sub_brand_id'=>$mix->sub_brand_id,'created_at'=>date('Y-m-d h:i:sa')]);

        Flash::success('Berhasil dipindahkan ke produk');
       return redirect(route('mixes.index'));
    }

    public function subkategori($id){

        $brands = DB::table('brands')->select('id','name')->where(['menu_id'=>$id])->get(); 
        return json_encode($brands);
       
     
    }

    public function status($type,$id){
        
       $mix = DB::table('mixes')->where(['id'=>$id])->first();  
       if($type =='publish')
       {
           
        DB::table('stock_orders')->where(['name'=>$mix->name,'brand_id'=>$mix->brand_id,'sub_brand_id'=>$mix->sub_brand_id])->update(['status'=>1]);
       // DB::table('sliders')->where(['id'=>$id])
        Flash::success('Berhasil bahan cetakan siap di publish');

       }else{
         DB::table('stock_orders')->where(['name'=>$mix->name,'brand_id'=>$mix->brand_id,'sub_brand_id'=>$mix->sub_brand_id])->update(['status'=>0]);  
        Flash::success('Bahan cetakan di unpublish'); 
       } 
        
       return redirect(route('mixes.index'));
    }


    /**
     * Display the specified Mix.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mix = $this->mixRepository->findWithoutFail($id);

        if (empty($mix)) {
            Flash::error('Mix not found');

            return redirect(route('mixes.index'));
        }

        return view('mixes.show')->with('mix', $mix);
    }

    /**
     * Show the form for editing the specified Mix.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mix = $this->mixRepository->findWithoutFail($id);

        if (empty($mix)) {
            Flash::error('Mix not found');

            return redirect(route('mixes.index'));
        }

        return view('mixes.edit')->with('mix', $mix);
    }

    /**
     * Update the specified Mix in storage.
     *
     * @param  int              $id
     * @param UpdateMixRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMixRequest $request)
    {
        $mix = $this->mixRepository->findWithoutFail($id);

        if (empty($mix)) {
            Flash::error('Mix not found');

            return redirect(route('mixes.index'));
        }

        $mix = $this->mixRepository->update($request->all(), $id);

        Flash::success('Mix updated successfully.');

        return redirect(route('mixes.index'));
    }

    /**
     * Remove the specified Mix from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mix = $this->mixRepository->findWithoutFail($id);

        if (empty($mix)) {
            Flash::error('Mix not found');

            return redirect(route('mixes.index'));
        }

        $this->mixRepository->delete($id);

        Flash::success('Mix deleted successfully.');

        return redirect(route('mixes.index'));
    }
}
