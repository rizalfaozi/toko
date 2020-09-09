<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Repositories\SliderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Criteria\allCriteria;
use Response;
use DB;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use Auth;

class SliderController extends AppBaseController
{
    /** @var  SliderRepository */
    private $sliderRepository;

    public function __construct(SliderRepository $sliderRepo)
    {
         $this->middleware('auth');
        $this->sliderRepository = $sliderRepo;
    }

    /**
     * Display a listing of the Slider.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sliderRepository->pushCriteria(new allCriteria($request));
        $sliders = $this->sliderRepository->all();

        return view('sliders.index')
            ->with('sliders', $sliders);
    }

    /**
     * Show the form for creating a new Slider.
     *
     * @return Response
     */
    public function create()
    {
       
        $products = DB::table('products as a')->join('stock_orders as b','a.product_id','=','b.id')->where('a.status',1)->select('a.id','b.name','a.brand_id','a.sub_brand_id')->get();
        $slider = '';
        return view('sliders.create')->with(['products'=>$products,'slider'=>$slider]);
    }

    /**
     * Store a newly created Slider in storage.
     *
     * @param CreateSliderRequest $request
     *
     * @return Response
     */
    public function store(CreateSliderRequest $request)
    {
        $input = array();
           $input['name'] = $request->name;
           $input['product_id'] = $request->product_id;
           $input['description'] = $request->description;
            $input['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

         if($request->status == "")
         {
            Flash::error('Status belum dipilih');
            return redirect(route('sliders.create'));
         }else{
            $input['status'] = $request->status;
         } 


           if($request->foto=='') 
            {
                        
                $input['foto'] = '';      

            }else{
              
              $date = date("Y-m-d");
              $time = date("H:i:s");   
              $fileFormat = ".jpg";
              
              $dates = explode('-',$date);
              $times = explode(':',$time);
              $fileName = $dates[0].$dates[1].$dates[2].$times[0].$times[1].$times[2];
              $fullPath = "files/photo/".$fileName.$fileFormat;
              $fullCrop = "files/photo/".$fileName.'-crop-'.$fileFormat;
                File::makeDirectory($request->foto, 0777, true, true);
                $img = Image::make($request->foto)->save($fullPath, 60);
                $imgs = Image::make($request->foto)->resize(560, 460)->save($fullCrop, 60);
                $input['foto'] = $fullPath;
                $input['foto_crop'] = $fullCrop;            
            }


        $slider = $this->sliderRepository->create($input);

        Flash::success('Slider saved successfully.');

        return redirect(route('sliders.index'));
    }

    /**
     * Display the specified Slider.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $slider = $this->sliderRepository->findWithoutFail($id);

        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('sliders.index'));
        }

        return view('sliders.show')->with('slider', $slider);
    }

    /**
     * Show the form for editing the specified Slider.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $slider = $this->sliderRepository->findWithoutFail($id);
        $products = DB::table('products as a')->join('stock_orders as b','a.product_id','=','b.id')->where('a.status',1)->select('a.id','b.name','a.brand_id','a.sub_brand_id')->get();
        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('sliders.index'));
        }



        return view('sliders.edit')->with(['slider'=> $slider,'products'=>$products]);
    }

    /**
     * Update the specified Slider in storage.
     *
     * @param  int              $id
     * @param UpdateSliderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSliderRequest $request)
    {
         $input = array();

        $slider = $this->sliderRepository->findWithoutFail($id);

        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('sliders.index'));
        }

          $input['product_id'] = $request->product_id;
          $input['description'] = $request->description;
          $input['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));


         if($request->foto =="")
        {

           $input['foto'] = $slider->foto;
           $input['foto_crop'] = $slider->foto_crop;
        }else{ 

           if($slider->foto !='') 
           {     
            unlink($slider->foto); 
             unlink($slider->foto_crop); 
           }   


          $date = date("Y-m-d");
          $time = date("H:i:s");   
          $fileFormat = ".jpg";
          
          $dates = explode('-',$date);
          $times = explode(':',$time);
          $fileName = $dates[0].$dates[1].$dates[2].$times[0].$times[1].$times[2];
          $fullPath = "files/photo/".$fileName.'-ori-'.$fileFormat;
          $fullCrop = "files/photo/".$fileName.'-crop-'.$fileFormat;
                File::makeDirectory($request->foto, 0777, true, true);
                $img = Image::make($request->foto)->save($fullPath, 60);
                $imgs = Image::make($request->foto)->resize(560, 460)->save($fullCrop, 60);
                $input['foto'] = $fullPath;
                $input['foto_crop'] = $fullCrop;

        }

        $slider = $this->sliderRepository->update($input, $id);

        Flash::success('Slider updated successfully.');

        return redirect(route('sliders.index'));
    }

    /**
     * Remove the specified Slider from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $slider = $this->sliderRepository->findWithoutFail($id);

        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('sliders.index'));
        }

        if($slider->foto !="")
        {
               unlink($slider->foto);    
        }

        $this->sliderRepository->delete($id);

        Flash::success('Slider deleted successfully.');

        return redirect(route('sliders.index'));
    }
}
