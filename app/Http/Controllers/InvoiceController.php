<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice as ModelInvoice;
use App\Models\Product as ModelProduct;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $invoices = ModelInvoice::all();
        return $invoices;
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = ModelInvoice::find($id);
        return $invoice;
    }

    public function totalPrice($id){
        //1.1
        $totalPrice = ModelProduct::select( DB::raw(' SUM(price * quantity) as invoice_total'))
            ->where('invoice_id', '=', $id)
            ->groupBy('invoice_id')
            ->get();
        return $totalPrice;
    }

    public function idsByQuantity(){
        //1.2
        $ids = ModelProduct::select('invoice_id', 'quantity')
            ->where('quantity', '>', 100)
            ->get();
        return $ids;
    }

    public function namesByFinalValue(){
        //1.3
        $names = ModelProduct::select('name', DB::raw(' (price * quantity) as final_value'))
            ->where(DB::raw(' (price * quantity)'), '>', 1000000 )
            ->get();

        return $names;
    }

    public function test(){
        return array(
            'test' => 'testing'
        );
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
