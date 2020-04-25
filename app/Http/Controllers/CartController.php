<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
session_start();

class CartController extends Controller
{
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
    }
    public function show_cart(){
        $category_product = DB::table('tbl_category_product')->where('category_status','1')
        ->orderby('category_id','desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        return view('pages.cart.show_cart')->with('category_product',$category_product)
        ->with('brand_product',$brand_product);
    }    
   
    public function save_cart(Request $request){
        $product_id = $request->input('productid_hidden');
        $quantity = $request->input('quantity');
        $product_info = DB::table('tbl_product')->where('product_id',$product_id)->first();

        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = '123';
        $data['options']['image'] = $product_info->product_image;

        Cart::add($data);

        return Redirect::to('/show-cart');
    }   
    public function delete_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request){
        $rowId = $request->input('rowId_cart');
        $qty = $request->input('cart_quantity');
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
}


