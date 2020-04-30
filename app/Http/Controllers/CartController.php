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
    public function check_coupon(Request $request){
        $data = $request->all();
        print_r($data);
    }
    public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart == true){
            // $key la session_id --- $qty la so luong
            foreach($data['cart_qty'] as $key => $qty){
                foreach($cart as $session => $val){
                    if($val['session_id'] == $key){
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('success','Cập nhật sản phẩm thành công');
        }
    }
    public function delete_sp_ajax($session_id){
        $cart = Session::get('cart');
        
        if($cart == true){
            foreach($cart as $key => $value){
                if($value['session_id'] == $session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('success','Xoá sản phẩm thành công');
        }else{
            return redirect('/gio-hang')->with('error','Xoá sản phẩm thất bại');
        }
     
    }
    public function gio_hang(){
        $category_product = DB::table('tbl_category_product')->where('category_status','1')
        ->orderby('category_id','desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        return view('pages.cart.cart_ajax')->with('category_product',$category_product)
        ->with('brand_product',$brand_product);
    }
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }
       
        Session::save();

    }  
    public function delete_all_product_cart(){
        $cart = Session::get('cart');
        if($cart == true){
            Session::forget('cart');
            return redirect()->back()->with('warning','Xoá tất giỏ hàng thành công');
        }
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
        Cart::destroy();
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


