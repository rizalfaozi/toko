<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = DB::table('sliders')->where('status',1)->orderBy('id','desc')->limit('5')->get(); 
        
        $kategori = DB::table('brands')->where('setting','utama')->get(); 

         $productslide = DB::table('products')->where('status',1)->limit('8')->inRandomOrder()->get(); 

         $proterbaru = DB::table('products')->where('status',1)->limit('5')->orderBy('id','desc')->get(); 
          $product = DB::table('products')->where(['status'=>1])->get();  
         
         $propuler = DB::table('reports as a')
         ->select('b.id','c.name','b.price','b.photo')
         ->join('products as b','a.product_id','=','b.id')
         ->join('stock_orders as c','a.product_id','=','c.id')
         ->limit('5')->groupBy('a.product_id')->get();


       return view('frontend.app')->with(['kategori'=>$kategori,'slider'=>$slider,'product'=>$product,'productslide'=>$productslide,'proterbaru'=>$proterbaru,'propuler'=>$propuler]); 
    }

    



    public function detail($id){

     $slider = DB::table('sliders')->where('status',1)->orderBy('id','desc')->limit('5')->get(); 
      
        $kategori = DB::table('brands')->where('setting','utama')->get(); 

         $productslide = DB::table('products')->where('status',1)->limit('8')->inRandomOrder()->get(); 

         $proterbaru = DB::table('products')->where('status',1)->limit('5')->orderBy('id','desc')->get();  
         
         $product = DB::table('products')->where(['status'=>1,'id'=>$id])->first();  
         $category = DB::table('brands')->where(['id'=>$product->brand_id])->first()->name;  
         $subcategory = DB::table('brands')->where(['id'=>$product->sub_brand_id])->first()->name;  

         $prorelated = DB::table('products')
         ->where('id','!=', $product->id)
         ->where(['status'=>1,'brand_id'=>$product->brand_id,'sub_brand_id'=>$product->sub_brand_id])->get(); 
        

          $propuler = DB::table('reports as a')->select('b.id','c.name','b.price','b.photo')->join('products as b','a.product_id','=','b.id')->join('stock_orders as c','a.product_id','=','c.id')->limit('5')->groupBy('a.product_id')->get();
         
     return view('frontend.app')->with(['kategori'=>$kategori,'slider'=>$slider,'product'=>$product,'productslide'=>$productslide,'proterbaru'=>$proterbaru,'category'=>$category,'subcategory'=>$subcategory,'prorelated'=>$prorelated,'propuler'=>$propuler]); 

         

    }

        public function order($id){
          

        $product = DB::table('products')->where(['status'=>1,'id'=>$id])->first();   
        $slider = DB::table('sliders')->where('status',1)->orderBy('id','desc')->limit('5')->get(); 
      
        $kategori = DB::table('brands')->where('setting','utama')->get(); 
        $productslide = DB::table('products')->where('status',1)->limit('8')->inRandomOrder()->get(); 
        $proterbaru = DB::table('products')->where('status',1)->limit('5')->orderBy('id','desc')->get(); 

        $propuler = DB::table('reports as a')->select('b.id','c.name','b.price','b.photo')->join('products as b','a.product_id','=','b.id')->join('stock_orders as c','a.product_id','=','c.id')->limit('5')->groupBy('a.product_id')->get(); 
         
         return view('frontend.app')->with(['kategori'=>$kategori,'slider'=>$slider,'productslide'=>$productslide,'proterbaru'=>$proterbaru,'product'=>$product,'propuler'=>$propuler]);
        } 



        public function send(Request $request)
        {

        

         $ip_address = $_SERVER['REMOTE_ADDR'];  

         $name = $request->name;
         $product_name = $request->product_name;
         $product_id = $request->product_id;
         $price = $request->price;
         $email = $request->email;
         $phone = $request->phone;
         $city = $request->city;
         $address = $request->address;
         $qty = $request->qty;
         $description = $request->description;

         //$order = DB::table('reports')->where('')->where('product_id','like',''.$product_id.'%')->get();

         DB::table('reports')->insert(['name'=>$name,'product_id'=>$product_id,'product_name'=>$product_name,'email'=>$email,'phone'=>$phone,'city'=>$city,'address'=>$address,'qty'=>$qty,'description'=>$description,'price'=>$price,'ip_address'=>$ip_address,'status'=>0,'created_at'=>date('Y-m-d h:i:sa')]);

          return redirect(url('konfirmasi'));

        }  


   public function konfirmasi(){

           
        $slider = DB::table('sliders')->where('status',1)->orderBy('id','desc')->limit('5')->get(); 
      
        $kategori = DB::table('brands')->where('setting','utama')->get(); 
        $productslide = DB::table('products')->where('status',1)->limit('8')->inRandomOrder()->get(); 
        $proterbaru = DB::table('products')->where('status',1)->limit('5')->orderBy('id','desc')->get();  
        $propuler = DB::table('reports as a')->select('b.id','c.name','b.price','b.photo','b.product_id')->join('products as b','a.product_id','=','b.id')->join('stock_orders as c','b.product_id','=','c.id')->limit('5')->groupBy('a.product_id')->get(); 
         
         return view('frontend.app')->with(['kategori'=>$kategori,'slider'=>$slider,'productslide'=>$productslide,'proterbaru'=>$proterbaru,'propuler'=>$propuler]);

   }
   
     public function detberita($id){

        $sliderdet = DB::table('sliders')->where(['status'=>1,'id'=>$id])->first();   
        $slider = DB::table('sliders')->where('status',1)->orderBy('id','desc')->limit('5')->get(); 
      
        $kategori = DB::table('brands')->where('setting','utama')->get(); 
        $productslide = DB::table('products')->where('status',1)->limit('8')->inRandomOrder()->get(); 
         $proterbaru = DB::table('products')->where('status',1)->limit('5')->orderBy('id','desc')->get();  

          $propuler = DB::table('reports as a')->select('b.id','b.name','b.price','b.photo')->join('products as b','a.product_id','=','b.id')->limit('5')->groupBy('a.product_id')->get(); 
         
         return view('frontend.app')->with(['kategori'=>$kategori,'slider'=>$slider,'productslide'=>$productslide,'proterbaru'=>$proterbaru,'sliderdet'=>$sliderdet,'propuler'=>$propuler]);
    } 


      public function search(Request $request){

        $search = $request->cari;
        $slider = DB::table('sliders')->where('status',1)->orderBy('id','desc')->limit('5')->get(); 
        
        $kategori = DB::table('brands')->where('setting','utama')->get(); 

         $productslide = DB::table('products')->where('status',1)->limit('8')->inRandomOrder()->get(); 

         $proterbaru = DB::table('products')->where('status',1)->limit('5')->orderBy('id','desc')->get(); 
         $propuler = DB::table('reports as a')->select('b.id','b.name','b.price','b.photo')->join('products as b','a.product_id','=','b.id')->limit('5')->groupBy('a.product_id')->get(); 

        $product = DB::table('products as a')->select('a.id','a.photo','a.name','a.description','a.theme','a.color','b.slug as category','a.price','c.slug as subcategory','a.slug')->join('brands as b','a.brand_id','=','b.id')->join('brands as c','a.sub_brand_id','=','c.id')->where('a.name','Like',''.$search.'%')->where('a.status',1)->paginate(10);

       return view('frontend.app')->with(['kategori'=>$kategori,'slider'=>$slider,'product'=>$product,'productslide'=>$productslide,'proterbaru'=>$proterbaru,'propuler'=>$propuler]);



      }  


       public function searchreport(Request $request)
       {  

         $bulan = $request->bulan;
         $tahun = $request->tahun;

         $search = $tahun.'-'.$bulan;

         return redirect(url('search/reports/'.$search));


       }

       public function report($thn){

        $reports =  DB::table('reports')->where('created_at','LIKE',''.$thn.'%')->get();


        return view('reports.index')
           ->with('reports', $reports);
       }
    

}
