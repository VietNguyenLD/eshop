<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeShipModel extends Model
{
    public $timestamps = false;
    protected $fillable =['fee_matp','fee_maqh','fee_xaid','fee_feeship'];
    protected $primaryKey = 'fee_id';
    protected $table = 'tbl_feeship';
    
    public function cityModel(){
        return $this->belongsTo('App\Models\CityModel', 'fee_matp');
    }
    public function provinceModel(){
        return $this->belongsTo('App\Models\ProvinceModel', 'fee_maqh');
    }
    public function wardsModel(){
        return $this->belongsTo('App\Models\WardsModel', 'fee_xaid');
    }
}
