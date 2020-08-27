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


    

    /**
     * Show the form for creating a new Report.
     *
     * @return Response
     */
    public function create()
    {

        $tgl_skr = date('Ymd');
        $reports_id = "";
        $cek_kode = DB::table('reports')
        ->select('order_id')
        ->where('order_id','like',''.$tgl_skr.'%')->get();
        if(empty($cek_kode->order_id))
        {

            $max = DB::table('reports')->max('order_id');
            if($max ==null)
            {
                $invoice_code = $tgl_skr.'001';
            }else{
                $invoice_code = $max+1;
            }    
            
        }   

        $product = DB::table('products')->where('status',1)->get();
        return view('reports.create')->with(['order_id'=>$invoice_code,'product'=>$product,'reports_id'=>$reports_id]);
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
        $input = $request->all();

        $report = $this->reportRepository->create($input);

        Flash::success('Report saved successfully.');

        return redirect(route('reports.index'));
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

        $tgl_skr = date('Ymd');
        $reports_id = $report->id;
          
        $invoice_code = $report->order_id;
       

        $product = DB::table('products')->where('status',1)->get();

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        return view('reports.edit')->with(['order_id'=>$invoice_code,'report'=> $report,'product'=>$product,'reports_id'=>$reports_id]);
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
        $stok = $product->stok;
   
       if($request->status ==1)
       {
            $jml = (int) $stok - (int) 1;
            DB::table('products')->where('id',$report->product_id)->update(['stok'=>$jml]);
       }else if($request->status ==2){
          $jml = (int) $stok + (int)1;
          DB::table('products')->where('id',$report->product_id)->update(['stok'=>$jml]);
       }
         if($stok != 0)
         {

          
           $report = DB::table('reports')->update(['product_id'=>$request->product_id,'qty'=>$request->qty,'price'=>$request->price,'description'=>$request->description,'status'=>$request->status]);
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
