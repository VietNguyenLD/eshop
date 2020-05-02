<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OrderManagerController extends Controller
{
    public function index(){
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->paginate(10);

        $manager_order = view('admin.manager_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manager_order', $manager_order);
    }
    public function view_order($order_id){

        $order_by_id = DB::table('tbl_order')->where('tbl_order.order_id',$order_id)
        ->join('tbl_customers','tbl_customers.customer_id','tbl_order.customer_id')
        ->join('tbl_shipping','tbl_shipping.shipping_id','tbl_order.shipping_id')
        ->join('tbl_order_details','tbl_order_details.order_id','tbl_order.order_id')
        ->select('tbl_order.*','tbl_customers.*','tbl_order_details.*','tbl_shipping.*')->get();

        
        $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('admin.view_order',$manager_order_by_id);
    }
}
