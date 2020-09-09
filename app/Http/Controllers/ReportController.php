<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Repositories\ReportRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;

class ReportController extends AppBaseController
{
    /** @var  ReportRepository */
    private $reportRepository;

    public function __construct(ReportRepository $reportRepo)
    {
        $this->reportRepository = $reportRepo;
    }

    /**
     * Display a listing of the Report.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->reportRepository->pushCriteria(new RequestCriteria($request));
        $reports = $this->reportRepository->all();

        return view('reports.index')
            ->with('reports', $reports);
    }

   public function showprint(Request $request)
    {
        
        $reports = DB::table('reports')->get();

        return view('reports.show_print')
            ->with('reports', $reports);
    }

    

    /**
     * Show the form for creating a new Report.
     *
     * @return Response
     */
    public function create()
    {

        

        $product = DB::table('products')->where('status',1)->get();
        return view('reports.create')->with(['product'=>$product]);
    }

    /**
     * Store a newly created Report in storage.
     *
     * @param CreateReportRequest $request
     *
     * @return Response
     */
    public function store(CreateReportRequest $request)
    {
        //$input = $request->all();

        $input['product_id'] = $request->product_id;
        $input['qty'] = $request->qty;
        $input['price'] = $request->price;
        $input['description'] = $request->description;
        $input['status'] = $request->status;

        $product = DB::table('products')->where('id',$request->product_id)->first();
        $stok = DB::table('stock_orders')->where('id',$product->product_id)->first()->stock;
   
        if($request->status ==1)
        {
            $jml = (int) $stok - (int) 1;
            DB::table('stock_orders')->where('id',$product->product_id)->update(['stock'=>$jml]);
        }else if($request->status ==2){
          $jml = (int) $stok + (int)1;
          DB::table('products')->where('id',$product->product_id)->update(['stock'=>$jml]);
        }
        
        if($stok != 0)
         {

          
           $report = DB::table('reports')->insert(['product_id'=>$request->product_id,'qty'=>$request->qty,'price'=>$request->price,'description'=>$request->description,'status'=>$request->status]);
        //$report = $this->reportRepository->update($request->all(), $id);

           Flash::success('Report saved successfully.');

           return redirect(route('reports.index'));

         }else{

              Flash::error('Stok produk kosong');
            return redirect(route('reports.index'));
         }

    }

    /**
     * Display the specified Report.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $report = $this->reportRepository->findWithoutFail($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        return view('reports.show')->with('report', $report);
    }


    public function price($id)
    {
        $products = DB::table('products as a')->select('a.id','a.price','b.stock')->join('stock_orders as b','a.product_id','=','b.id')->where('a.id',$id)->first();
        return json_encode($products);
          
    }

    /**
     * Show the form for editing the specified Report.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $report = $this->reportRepository->findWithoutFail($id);

 
       

        $product = DB::table('products')->where('status',1)->get();

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        return view('reports.edit')->with(['report'=> $report,'product'=>$product]);
    }

    /**
     * Update the specified Report in storage.
     *
     * @param  int              $id
     * @param UpdateReportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReportRequest $request)
    {
        $report = $this->reportRepository->findWithoutFail($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        $product = DB::table('products')->where('id',$report->product_id)->first();
        $stok = DB::table('stock_orders')->where('id',$product->product_id)->first()->stock;
   
       if($request->status ==1)
       {
            $jml = (int) $stok - (int) 1;
            DB::table('stock_orders')->where('id',$product->product_id)->update(['stock'=>$jml]);
       }else if($request->status ==2){
          $jml = (int) $stok + (int)1;
          DB::table('stock_orders')->where('id',$product->product_id)->update(['stock'=>$jml]);
       }
         if($stok != 0)
         {

          
        $report = DB::table('reports')->where('id',$report->id)->update(['product_id'=>$request->product_id,'qty'=>$request->qty,'price'=>$request->price,'description'=>$request->description,'status'=>$request->status]);
        //$report = $this->reportRepository->update($request->all(), $id);

        Flash::success('Report updated successfully.');

        return redirect(route('reports.index'));

         }else{

              Flash::error('Stok produk kosong');
            return redirect(route('reports.index'));
         }
    }

    /**
     * Remove the specified Report from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $report = $this->reportRepository->findWithoutFail($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        $this->reportRepository->delete($id);

        Flash::success('Report deleted successfully.');

        return redirect(route('reports.index'));
    }
}
