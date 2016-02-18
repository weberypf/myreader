<?php

namespace Admin\Controller;

use Think\Controller;
class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!BaseController::is_login()) {
            $this->display('Account/login');
            exit();
        }
    }

    public static function  is_login(){
        $value = session('admin');
        return isset($value);
    }
    public static function login_user(){
        if(BaseController::is_login()){
            return session('admin');
        }
        return '';
    }
    public static  function get_login_userid(){
        if(BaseController::is_login()){
            return session('uid');
        }
        return 0;
    }
    public static function do_login($uid,$admin){
        session('admin',$admin);
        session('uid',$uid);
    }
    public static function logout(){
        session(null);
    }
}