<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use DataTables;
use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.orderView');
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
        $order = Order::find($id);

        $orderPro = DB::table('order_products')
            ->select('order_products.*', 'products.product_name')
            ->leftJoin('products', 'products.id', '=', 'order_products.pid')
            ->where('order_products.oid', $id)->get();

        return view('admin.orderDetail')->with(['order' => $order, 'products' => $orderPro]);
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

    public function datatable()
    {
        return DataTables::of(Order::query())
            ->editColumn('order_by', function ($order) {
                $order = Order::find($order->id);
                return $order->firstname . ' ' . $order->lastname;
            })
            ->addColumn('manage', function ($order) {
                return '<a href="order/' . $order->id . '" class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i></a>&nbsp;<a href="order/' . $order->id . '/delete" class="btn btn-sm btn-outline-danger ml-5"><i class="fa fa-trash"></i></a>';
            })
            ->rawColumns(['order_by', 'manage'])
            ->make(true);
    }
}
