<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{   
    public $timestamps = false;
    protected $fillable =['name_city','type'];
    protected $primaryKey = 'matp';
    protected $table = 'tbl_tinhthanhpho';
}
