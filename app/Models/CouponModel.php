<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponModel extends Model
{
    protected $fillable = ['coupon_name','coupon_code','coupon_time','coupon_condition','coupon_money'];
    protected $primaryKey ='coupon_id';
    protected $table ='tbl_coupon';
}
