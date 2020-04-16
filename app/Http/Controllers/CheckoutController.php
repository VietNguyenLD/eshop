<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function login_checkout(){
        $category_product = DB::table('tbl_category_product')->where('category_status','1')
        ->orderby('category_id','desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        return view('checkout.login_checkout')->with('category_product',$category_product)
        ->with('brand_product',$brand_product);
    }
    public function add_customer(Request $request){
        $data = array();
        $data =[
            'customer_name' => $request->input('customer_name'),
            'customer_email' => $request->input('customer_email'),
            'customer_password' => $request->input('customer_password'),
            'customer_phone' => $request->input('customer_phone')];
        // insertGetId insert DB va lay id gan vao bien insert_customer    
        $insert_customer = DB::table('tbl_customers')->insertGetId($data); 

        Session::put('customer_id',$insert_customer);
        Session::put('customer_name',$request->input('customer_name'));
        return Redirect::to('/checkout');
    }
    public function checkout(){
        echo 'dasdas';
    }
}
