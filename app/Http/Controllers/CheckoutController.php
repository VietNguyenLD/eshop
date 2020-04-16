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
            'customer_password' => md5($request->input('customer_password')),
            'customer_phone' => $request->input('customer_phone')];
        // insertGetId insert DB va lay id gan vao bien insert_customer    
        $insert_customer_id = DB::table('tbl_customers')->insertGetId($data); 

        Session::put('customer_id',$insert_customer_id);
        Session::put('customer_name',$request->input('customer_name'));
        return Redirect::to('/checkout');
    }
    public function show_checkout(){
        $category_product = DB::table('tbl_category_product')->where('category_status','1')
        ->orderby('category_id','desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        return view('checkout.show_checkout')->with('category_product',$category_product)
        ->with('brand_product',$brand_product);
    }
    public function save_checkout_customer(Request $request){
        $data = array();
        $data =[
            'shipping_name' => $request->input('shipping_name'),
            'shipping_email' => $request->input('shipping_email'),
            'shipping_address' => $request->input('shipping_address'),
            'shipping_phone' => $request->input('shipping_phone'),
            'shipping_note' => $request->input('shipping_note')];
        // insertGetId insert DB va lay id gan vao bien insert_customer    
        $insert_shipping_id = DB::table('tbl_shipping')->insertGetId($data); 

        Session::put('shipping_id',$insert_shipping_id);
    
        return Redirect::to('/payment');
    }
    public function payment(){

    }
    public function logout_checkout(){
        Session::forget('customer_id');
        Session::forget('customer_name');
        return Redirect::to('/login-checkout');
    }
    public function login_customer(Request $request){
        $email = $request->input('email_customer');
        $password = md5($request->input('password_customer'));
        $result = DB::table('tbl_customers')
        ->where('customer_email',$email)->where('customer_password',$password)->first();
        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
        }else{
            return Redirect::to('/login-checkout');
        } 

    }
}
