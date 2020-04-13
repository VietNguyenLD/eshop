<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProductController extends Controller
{
    public function add_brand_product(){
        return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $all_brand_product = DB::table('tbl_brand_product')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }
    public function save_brand_product(Request $request){
        $data = array();
        $data['brand_name'] = $request->input('brand_product_name');
        $data['brand_desc'] = $request->input('brand_product_desc');
        $data['brand_status'] = $request->input('brand_product_status');
        DB::table('tbl_brand_product')->insert($data);
        return Redirect::to('/add-brand-product')->with('success','Thêm danh mục thành công');
    }
    public function unactive_brand_product( $brand_product_id ){
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status' => 0]);
        return Redirect::to('/all-brand-product')->with('success','Ẩn danh mục danh mục thành công');
    }
    public function active_brand_product( $brand_product_id ){
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status' => 1]);
        return Redirect::to('/all-brand-product')->with('success','Hiển thị danh mục thành công');
    }
    public function edit_brand_product($brand_product_id){
        $edit_brand_product = DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }
    public function update_brand_product($brand_product_id, Request $request){
        $data = array();
        $data['brand_name'] = $request->input('brand_product_name');
        $data['brand_desc'] = $request->input('brand_product_desc');
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update($data);
        return Redirect::to('/all-brand-product')->with('success','Cập nhật mục danh mục thành công');
    }
    public function delete_brand_product( $brand_product_id){
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->delete(); 
        return Redirect::to('/all-brand-product')->with('success','Xoá mục danh mục thành công');
    }

    //END ADMIN


    public function show_brand_home( $brand_product_id){
        $category_product = DB::table('tbl_category_product')->where('category_status','1')
        ->orderby('category_id','desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        $brand_by_id = DB::table('tbl_product')
        ->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')
        ->where('tbl_product.brand_id',$brand_product_id)->get();

        $brand_name = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id',$brand_product_id)
        ->limit(1)->get();

        return view('pages.brand.show_brand')->with('category_product',$category_product)
        ->with('brand_product',$brand_product)
        ->with('brand_by_id',$brand_by_id)
        ->with('brand_name',$brand_name);
    }
}
