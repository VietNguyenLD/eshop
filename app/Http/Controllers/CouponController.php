<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\Models\CouponModel;
use Illuminate\Support\Facades\Redirect;
session_start();

class CouponController extends Controller
{

    public function add_coupon(){
        return view('admin.coupon.add_coupon');
    }
    public function all_coupon(){
        $coupon = CouponModel::orderby('coupon_id','desc')->get();
        return view('admin.coupon.all_coupon')->with(compact('coupon'));
    }
    public function save_coupon(Request $request){
        $data = [
            'coupon_name' => $request->input('coupon_name'),
            'coupon_code' => $request->input('coupon_code'),
            'coupon_time' => $request->input('coupon_times'),
            'coupon_condition' => $request->input('coupon_condition'),
            'coupon_money' => $request->input('coupon_money'),
        ];
        $coupon = new CouponModel();
        $coupon->insert($data);
        return Redirect::to('/add-coupon')->with('success','Thêm mã giảm giá thành công');
    }
    public function delete_coupon($coupon_id){
        $coupon = CouponModel::find($coupon_id);
        $coupon->delete();
        return Redirect::to('/all-coupon')->with('success','Xoá mã giảm giá thành công');
    }
}
