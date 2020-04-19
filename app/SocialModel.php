<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialModel extends Model
{
    public $timestamps = false;

    protected $fillable = ['provider_user_id','provider','user'];
    protected $primaryKey ='user_id';
    protected $table ='tbl_social';
    public function login(){
        return $this->belongsTo('App\SocialModel', 'user');
    }
   
}
