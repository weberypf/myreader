<?php
namespace Admin\Controller;

use Admin\Model\ReturnValue;
use Think\Controller;
class AccountController extends Controller
{
    public function login(){
        if(BaseController::is_login()){
            $this->redirect('Index/index');
        }else{
            $this->display();
        }
    }
    public function do_login()
    {
        if (IS_POST) {
            $returnUrl = $_SERVER['HTTP_REFERER'];
            if(empty($returnUrl)){
                $returnUrl = U('Index/index');
            }

            $admin = D('Admin');

            // 自动验证 创建数据集
            if (!$data = $admin->create()) {
                $this->ajaxReturn( ReturnValue::faild($admin->getError()));
            }
            $pwd = $admin->password;
            // 组合查询条件
            $where = array();
            $where['username'] = $data['username'];
            $where['isdel'] = 0;
            $result = $admin->where($where)->field('id,username,password')->find();
            // 验证用户名 对比 密码
            if ($result && $result['password'] == $data['password']) {
                BaseController::do_login($result['id'], $result['username']);
                $this->ajaxReturn(ReturnValue::success($returnUrl));
            } else {
                $this->ajaxReturn(ReturnValue::faild('登录失败,用户名或密码不正确!'));
            }
        }else if(BaseController::is_login()){
            $this->redirect('Index/index');
        }else{
            $this->display("login");
        }
    }

    public function logout(){
        BaseController::logout();
        $this->redirect(('Account/login'));
    }
}