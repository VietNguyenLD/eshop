<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WardsModel extends Model
{
    public $timestamps = false;
    protected $fillable =['name_wards','type','maqh'];
    protected $primaryKey = 'xaid';
    protected $table = 'tbl_xaphuongthitran';
}
