<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Repositories\StockRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;

class StockController extends AppBaseController
{
    /** @var  StockRepository */
    private $stockRepository;

    public function __construct(StockRepository $stockRepo)
    {
        $this->stockRepository = $stockRepo;
    }

    /**
     * Display a listing of the Stock.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->stockRepository->pushCriteria(new RequestCriteria($request));
        $stocks = $this->stockRepository->all();

        $recins = DB::table('stocks_details')->where('name','Recin')->get();
        if(!empty($recins))
        {
           $recin = $recins[0]->total_size;
        }else{

           $recin = 0;
        }    

        $talks = DB::table('stocks_details')->where('name','Talk')->get();
        if(!empty($talks))
        {
           $talk =  $talks[0]->total_size;
        }else{

           $talk = 0;
        } 


        $kataliss = DB::table('stocks_details')->where('name','Katalis')->get();
        if(!empty($kataliss)){
            $katalis = $kataliss[0]->total_size;
        }else{
            $katalis = 0;
        }

        $mets = DB::table('stocks_details')->where('name','Met')->get();
        if(!empty($mets)){
            $met =  $mets[0]->total_size;
        }else{
            $met = 0;
        }    

        $dempuls = DB::table('stocks_details')->where('name','Dempul')->get();
        if(!empty($dempuls)){
           $dempul = $dempuls[0]->total_size;
        }else{
           $dempul = 0;
        }

        return view('stocks.index')
            ->with(['stocks'=> $stocks,'recin'=>$recin,'talk'=>$talk,'katalis'=>$katalis,'met'=>$met,'dempul'=>$dempul]);
    }

    /**
     * Show the form for creating a new Stock.
     *
     * @return Response
     */
    public function create()
    {
        return view('stocks.create');
    }

    /**
     * Store a newly created Stock in storage.
     *
     * @param CreateStockRequest $request
     *
     * @return Response
     */
    public function store(CreateStockRequest $request)
    {
        $input = $request->all();

        $stock = $this->stockRepository->create($input);

        $total = $stock->size*$stock->qty;
        $name = $stock->name;

        if($stock->other == "liter")
        {
            $other = "Liter";
        }else{
            $other = "Lembar"; 
        }    
        DB::table('stocks_details')->insert(['name'=>$name,'total_size'=>$total,'other'=>$other,'created_at'=> date('Y-m-d h:i:sa') ]);

        Flash::success('Stock saved successfully.');

        return redirect(route('stocks.index'));
    }

    /**
     * Display the specified Stock.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stock = $this->stockRepository->findWithoutFail($id);

        if (empty($stock)) {
            Flash::error('Stock not found');

            return redirect(route('stocks.index'));
        }

        return view('stocks.show')->with('stock', $stock);
    }

    /**
     * Show the form for editing the specified Stock.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stock = $this->stockRepository->findWithoutFail($id);

        if (empty($stock)) {
            Flash::error('Stock not found');

            return redirect(route('stocks.index'));
        }

        return view('stocks.edit')->with('stock', $stock);
    }

    /**
     * Update the specified Stock in storage.
     *
     * @param  int              $id
     * @param UpdateStockRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockRequest $request)
    {
        $stock = $this->stockRepository->findWithoutFail($id);

        if (empty($stock)) {
            Flash::error('Stock not found');

            return redirect(route('stocks.index'));
        }

        $stock = $this->stockRepository->update($request->all(), $id);

        Flash::success('Stock updated successfully.');

        return redirect(route('stocks.index'));
    }

    /**
     * Remove the specified Stock from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stock = $this->stockRepository->findWithoutFail($id);
         $total = $stock->size*$stock->qty;

         $total_size = DB::table('stocks_details')->where('name',$stock->name)->first()->total_size;
         if($total_size < $total)
         {
             Flash::error('Data stock tidak bisa dihapus');

             return redirect(route('stocks.index'));

         }else{
            $result = $total_size-$total;
            DB::table('stocks_details')->update(['total_size'=>$result]);
         }   

         
        if (empty($stock)) {
            Flash::error('Stock not found');

            return redirect(route('stocks.index'));
        }

        $this->stockRepository->delete($id);

        Flash::success('Stock deleted successfully.');

        return redirect(route('stocks.index'));
    }
}
