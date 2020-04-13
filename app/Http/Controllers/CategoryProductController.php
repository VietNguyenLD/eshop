<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProductController extends Controller
{
    public function add_category_product(){
        return view('admin.add_category_product');
    }
    public function all_category_product(){
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }
    public function save_category_product(Request $request){
        $data = array();
        $data['category_name'] = $request->input('category_product_name');
        $data['category_desc'] = $request->input('category_product_desc');
        $data['category_status'] = $request->input('category_product_status');
        DB::table('tbl_category_product')->insert($data);
        return Redirect::to('/add-category-product')->with('success','Thêm danh mục thành công');
    }
    public function unactive_category_product( $category_product_id ){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status' => 0]);
        return Redirect::to('/all-category-product')->with('success','Ẩn danh mục danh mục thành công');
    }
    public function active_category_product( $category_product_id ){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status' => 1]);
        return Redirect::to('/all-category-product')->with('success','Hiển thị danh mục thành công');
    }
    public function edit_category_product($category_product_id){
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }
    public function update_category_product($category_product_id, Request $request){
        $data = array();
        $data['category_name'] = $request->input('category_product_name');
        $data['category_desc'] = $request->input('category_product_desc');
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        return Redirect::to('/all-category-product')->with('success','Cập nhật mục danh mục thành công');
    }
    public function delete_category_product( $category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete(); 
        return Redirect::to('/all-category-product')->with('success','Xoá mục danh mục thành công');
    }

    // AND FUNCTION ADMIN PAGE



    public function show_category_home( $category_product_id){
        $category_product = DB::table('tbl_category_product')->where('category_status','1')
        ->orderby('category_id','desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        $category_by_id = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_product.category_id',$category_product_id)->get();

        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_product_id)
        ->limit(1)->get();


        return view('pages.category.show_category')->with('category_product',$category_product)
        ->with('brand_product',$brand_product)
        ->with('category_by_id',$category_by_id)
        ->with('category_name',$category_name);
    }
}
