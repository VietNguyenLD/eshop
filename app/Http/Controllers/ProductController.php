<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
session_start();

class ProductController extends Controller
{
    public function add_product(){
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }
    public function all_product(){
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','tbl_product.brand_id')->orderby('tbl_product.product_id','desc')
        ->get();
        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }
    public function save_product(Request $request){
        $data = array();
        $data['product_name'] =$request->input('product_name');
        $data['product_price'] =$request->input('product_price');
        $data['product_desc'] =$request->input('product_desc');
        $data['product_content'] =$request->input('product_content');
        $data['category_id'] =$request->input('product_category');
        $data['brand_id'] =$request->input('product_brand');
        $data['product_status'] =$request->input('product_status');
        $get_image = $request->product_image;
    
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $doc = 'v.';
            // current lay dau - explode phan tach chuoi
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).$doc.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;

            DB::table('tbl_product')->insert($data);
            return Redirect::to('/add-product')->with('success','Thêm sản phẩm thành công');
        }
        DB::table('tbl_product')->insert($data);
        return Redirect::to('/add-product')->with('success','Thêm sản phẩm thành công');
    }
    public function unactive_product( $product_id ){
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' => 0]);
        return Redirect::to('/all-product')->with('success','Ẩn sản phẩm thành công');
    }
    public function active_product( $product_id ){
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' => 1]);
        return Redirect::to('/all-product')->with('success','Hiển thị sản phẩm thành công');
    }
    public function edit_product($product_id){
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)
        ->with('cate_product', $cate_product)->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
    public function update_product($product_id, Request $request){
        $data = array();
        $data['product_name'] =$request->input('product_name');
        $data['product_price'] =$request->input('product_price');
        $data['product_desc'] =$request->input('product_desc');
        $data['product_content'] =$request->input('product_content');
        $data['category_id'] =$request->input('product_category');
        $data['brand_id'] =$request->input('product_brand');
        $data['product_status'] =$request->input('product_status');
        $get_image = $request->product_image;
        if($get_image){
            $name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$name_image));
            $new_image = $name_image.rand(0,99).$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            return Redirect::to('/all-product')->with('success','Cập nhật sản phẩm thành công');
        }
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        return Redirect::to('/all-product')->with('success','Cập nhật sản phẩm thành công');
    }
    public function delete_product( $product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->delete(); 
        return Redirect::to('/all-product')->with('success','Xoá mục sản phẩm thành công');
    }

    //END PRODUCT ADMIN

    public function detail_product($product_id){
        $category_product = DB::table('tbl_category_product')->where('category_status','1')
        ->orderby('category_id','desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        $detail_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        return view('pages.product.show_detail')->with('detail_product',$detail_product)
        ->with('category_product',$category_product)
        ->with('brand_product',$brand_product);
    }

}
