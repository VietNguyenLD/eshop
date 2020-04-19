<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\LoginAdminModel;
use App\SocialModel;
use Validator;
use App\Rules\Captcha; 
use Socialite;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }

    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri  
            $account_name = Login::where('admin_id',$account->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('admin-dashboard')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $viet = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = LoginAdminModel::where('admin_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = LoginAdminModel::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => ''

                ]);
            }
            $viet->login()->associate($orang);
            $viet->save();

            $account_name = LoginAdminModel::where('admin_id',$account->user)->first();

            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('admin-dashboard')->with('message', 'Đăng nhập Admin thành công');
        } 
    }


    public function show_dashboard(){
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $data = $request->validate([
            'admin_email' => 'required',
            'admin_password' => 'required',
            'g-recaptcha-response' => new Captcha(),
        ]);

        $admin_email = $request->input('admin_email');
        $admin_password = md5($request->input('admin_password'));
      
        $result = LoginAdminModel::where('admin_email',$admin_email)
        ->where('admin_password',$admin_password)->first();
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('/admin-dashboard');
        }else{
            Session::put('message','Bạn sai mật khẩu hoặc email!! Làm ơn nhập lại');
            return Redirect::to('/admin');  
        }
       
    }
    public function admin_logout(){
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
}
