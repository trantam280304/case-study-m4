<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index()
    {
        // $this->authorize('viewAny', Order::class);
        $items=Order::orderBy('id','DESC')->get();
        return view('admin.order.index',compact('items'));
    }
    public function detail($id)
    {
        // $this->authorize('view', Order::class);
        $items=DB::table('orderdetail')
        ->join('orders','orderdetail.order_id','=','orders.id')
        ->join('products','orderdetail.product_id','=','products.id')
        ->select('products.*', 'orderdetail.*','orders.id')
        ->where('orders.id','=',$id)->get();
        // dd($items);
        return view('order.orderdetail',compact('items'));
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
        //
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

    public function exportOrder(){
        // return Excel::download(new OrderExport, 'order.xlsx');
    }
}