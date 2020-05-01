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
    public function select_feeship(Request $request){
        $fee_ship = FeeShipModel::orderby('fee_id','DESC')->get();
        $output = '';
        $output .= '<div class="table-responsive">
            <table class="table table-bordered">
                <thread>
                    <tr>
                        <th>Tên thành phố</th>
                        <th>Tên quận huyện</th>
                        <th>Tên xã phường</th>
                        <th>Phí ship</th>
                    </tr>
                </thread>
                <tbody>';
                foreach($fee_ship as $key => $val){
                    $output .= '
                        <tr>
                            <td>'.$val->cityModel->name_city.'</td>
                            <td>'.$val->provinceModel->name_province.'</td>
                            <td>'.$val->wardsModel->name_wards.'</td>
                            <td contenteditable class="fee_feeship_edit" data-feeship_id="'.$val->fee_id.'">'.number_format($val->fee_feeship,0,',','.').'</td>
                        </tr>
                    ';
                }
                    
                $output .= '    
                </tbody>
            </table>
        </div>';
        echo $output;
    }
    public function update_delivery(Request $request){
        $data = $request->all();
        $fee_ship = FeeShipModel::find($data['feeship_id']);
        $fee_value = rtrim($data['fee_value'],'.');//cat dau cham
        $fee_ship->fee_feeship = $fee_value;
        $fee_ship->save();
    }
}
