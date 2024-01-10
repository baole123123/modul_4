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
        $items = Order::join('customers', 'orders.customer_id', '=', 'customers.id')
        ->select('orders.*', 'customers.name as customer_name', 'customers.name as customer_name')
        ->get();

        return view('order.index', compact('items'));


    }
    public function destroy($id)
    {
        // Xử lý xóa đơn hàng với $id

        // Ví dụ:
        $item = Order::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', __('sys.destroy_item_success1'));
    }
    // public function index()
    // {
    //     // $this->authorize('viewAny', Order::class);
    //     $items = Order::select('customer_id', DB::raw('MAX(created_at) as last_order'))
    //     ->groupBy('customer_id')
    //     ->get();
    //     return view('order.index',compact('items'));
    // }
    public function detail($id)
    {
        // $this->authorize('view', Order::class);
        $items = DB::table('orders')
        ->join('customers', 'orders.customer_id', '=', 'customers.id')
        ->join('orderdetail', 'orders.id', '=', 'orderdetail.order_id')
        ->join('products', 'orderdetail.product_id', '=', 'products.id')
        ->select('orders.*', 'customers.name as customer_name', 'products.name as product_name', 'products.price as product_price', 'orderdetail.*')
        ->where('orders.customer_id', '=', $id)
        ->orderBy('orders.date_at', 'DESC')
        ->get();

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
    // public function destroy($id)
    // {
    //     //
    // }

    public function exportOrder(){
        // return Excel::download(new OrderExport, 'order.xlsx');
    }
}
