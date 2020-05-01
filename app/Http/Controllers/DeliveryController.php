<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CityModel;
use App\Models\ProvinceModel;
use App\Models\WardsModel;
use App\Models\FeeShipModel;

class DeliveryController extends Controller
{
    private $citys;
   
    function __construct() {
        $this->citys = new CityModel();

    }
    public function delivery(){
        $city  = $this->citys->orderby('matp','ASC')->get();
        return view('admin.delivery.add_delivery')->with(compact('city'));
       
    }
    public function select_delivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action'] == 'city'){
                $select_province = ProvinceModel::where('matp',$data['matp'])
                ->orderby('maqh','ASC')->get();
                $output.='<option>--- Chọn quận huyện ---</option>';
                foreach($select_province as $key => $val){
                    $output .= '<option value="'.$val->maqh.'">'.$val->name_province.'</option>';
                }
            }else{
                $select_wards = WardsModel::where('maqh',$data['matp'])
                ->orderby('xaid','ASC')->get();
                $output.='<option>--- Chọn quận huyện ---</option>';
                foreach($select_wards as $key => $val){
                    $output .= '<option value="'.$val->xaid.'">'.$val->name_wards.'</option>';
                }
            }
        }
        echo $output;
    }
    public function insert_delivery(Request $request){
        $data = $request->all();
        $fee_ship = new FeeShipModel();
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_xaid = $data['wards'];
        $fee_ship->fee_feeship = $data['fee_ship'];

        $fee_ship->save();
    }
}
