<?php
namespace Admin\Controller;

use Admin\Model\ReturnValue;
use Think\Controller;
class AdministratorController extends BaseController
{
    public function changepassword(){
        if(IS_POST){
            $password = I('post.password','');
            $newpassword = I('post.newpassword','');
            $confirmnewpassword = I('post.confirmnewpassword','');

            if(strlen($newpassword)<6 || strlen($newpassword)>20){
                $this->ajaxReturn(ReturnValue::faild('密码长度6--20位'));
            }

            if($newpassword != $confirmnewpassword){
                $this->ajaxReturn(ReturnValue::faild('两次密码输入不一致'));
            }

            $adminId = BaseController::get_login_userid();

            $admin = M('admin');
            $entity = $admin->find($adminId);

            if($entity && $entity['password'] == $password){
                $data['password'] = $newpassword;
                $admin->where('id='.$adminId)->save($data);
                $this->ajaxReturn(ReturnValue::success("ok"));
            }else{
                $this->ajaxReturn(ReturnValue::faild('密码验证错误!'));
            }
        }else{
            $this->display();
        }
    }
}