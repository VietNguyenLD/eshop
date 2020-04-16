<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(){
        $category_product = DB::table('tbl_category_product')->where('category_status','1')
        ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')
        ->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')
        ->limit(6)->get();
        foreach($all_product as $value){
            $product_id[] = $value->product_id;
        }
       
        
        return view('pages.home')->with('category_product',$category_product)->with('brand_product',$brand_product)
        ->with('all_product',$all_product);
    }
    public function search_product(Request $request){
        $keywords = $request->input('keywords_submit');
        $category_product = DB::table('tbl_category_product')->where('category_status','1')
        ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->paginate(6);
        return view('pages.product.search')->with('category_product',$category_product)
        ->with('brand_product',$brand_product)->with('search_product',$search_product);      
    }
}
