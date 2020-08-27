<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Intervention\Image\ImageManagerStatic as Image;
use App\Criteria\ProductsCriteria;
use File;
use DB;



class ProductController extends AppBaseController
{
    /** @var  ProdukRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productRepository->pushCriteria(new ProductsCriteria($request));
        //$this->productRepository->pushCriteria(new RequestCriteria($request));
        $product = $this->productRepository->all();

        return view('products.index')
            ->with('product', $product);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        $brands = DB::table('brands')->where('setting','utama')->get();
        return view('products.create')->with(['brands'=>$brands]);
    }

     public function subkategori($id)
    {
       
        $subbrands = DB::table('brands')->where(['menu_id'=>$id])->get();
        return $subbrands;
    }


     public function subkategoriselect($produkid,$id)
    {
        
        $data['data'] = DB::table('brands')->where(['menu_id'=>$id])->get();
        $data['produk'] =  DB::table('products')->where('id',$produkid)->first()->sub_brand_id; 

        return $data;
    }

    public function publish($id)
    {
       $product = DB::table('products')->where(['id'=>$id])->update(['status'=>1]);
        Flash::success('Publish Produk Berhasil.');
        return redirect(route('product.index'));
    } 

    public function unpublish($id)
    {
       $product = DB::table('products')->where(['id'=>$id])->update(['status'=>0]);
        Flash::success('Unpublish Produk Berhasil.');
        return redirect(route('product.index'));
    }    

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
         

         if($request->name ==""){
            Flash::error('Nama produk masih kosong');
            return redirect(route('product.create'));
         }else{
           $input['name'] = $request->name; 
           $input['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name))); 
         } 

          if($request->brand_id == "")
         {
            Flash::error('Brand produk belum dipilih');
            return redirect(route('product.create'));
         }else{
            $input['brand_id'] = $request->brand_id;
         } 

          $input['sub_brand_id'] = $request->sub_brand_id;
         
         if($request->price == "")
         {
            Flash::error('Harga produk masih kosong');
            return redirect(route('product.create'));
         }else{
            $input['price'] = $request->price;
         } 

         if($request->stok == "")
         {
            Flash::error('Stok masih kosong');
            return redirect(route('product.create'));
         }else{
            $input['stok'] = $request->stok;
         } 

         $input['noted'] = $request->noted;
         $input['description'] = $request->description;
         $input['theme'] = $request->theme;
         $input['color'] = $request->color;
         $input['status'] = $request->status; 
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
        

        $product = $this->productRepository->create($input);

        Flash::success('Product insert successfully.');

        return redirect(route('product.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('product.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->findWithoutFail($id);
        $brands = DB::table('brands')->where('setting','utama')->get();
        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('product.index'));
        }

        return view('products.edit')->with(['product'=> $product,'brands'=>$brands]);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProdukRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('product.index'));
        }

       

           if($request->photo =="")
        {

           $input['photo'] = $product->photo;

        }else{ 


           if($product->photo!='') 
           {     
             unlink($product->photo); 
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

         if($request->name ==""){
            Flash::error('Nama produk masih kosong');
            return redirect(route('product.create'));
         }else{
           $input['name'] = $request->name; 
           $input['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name))); 
         } 

          if($request->brand_id == "")
         {
            Flash::error('Brand produk belum dipilih');
            return redirect(route('product.create'));
         }else{
            $input['brand_id'] = $request->brand_id;
         } 

          $input['sub_brand_id'] = $request->sub_brand_id;

         if($request->price == "")
         {
            Flash::error('Harga produk masih kosong');
            return redirect(route('product.create'));
         }else{
            $input['price'] = $request->price;
         } 

         

         
         $input['description'] = $request->description;
         $input['theme'] = $request->theme;
         $input['color'] = $request->color;
        $product = $this->productRepository->update($input, $id);

        Flash::success('Product updated successfully.');

        return redirect(route('product.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('product.index'));
        }
         

         if($product->photo !="")
         {
           unlink($product->photo);
         }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('product.index'));
    }
}
