<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    protected $fillable =['brand_name','brand_desc','brand_status'];
    protected $primaryKey = 'brand_id';
    protected $table = 'tbl_brand_product';
}