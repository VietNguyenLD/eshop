<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    public $timestamps = false;
    protected $fillable =['order_id','product_id','product_name','product_price','product_sales_quantity'];
    protected $primaryKey = 'order_details_id';
    protected $table = 'tbl_order_details';
    
    public function shippingModel(){
        return $this->belongsTo('App\Models\ShippingModel', 'shipping_id');
    }
    // public function provinceModel(){
    //     return $this->belongsTo('App\Models\ProvinceModel', 'fee_maqh');
    // }
    // public function wardsModel(){
    //     return $this->belongsTo('App\Models\WardsModel', 'fee_xaid');
    // }
}
