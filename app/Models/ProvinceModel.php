<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProvinceModel extends Model
{
    public $timestamps = false;
    protected $fillable =['name_province','type','matp'];
    protected $primaryKey = 'maqh';
    protected $table = 'tbl_quanhuyen';
}
