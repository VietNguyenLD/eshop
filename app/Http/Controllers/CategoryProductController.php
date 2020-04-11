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
}
