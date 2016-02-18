<?php
namespace Admin\Controller;

use Think\Controller;
class AccountController extends Controller
{
    public function login()
    {
        $this->display();
    }

    public function do_login()
    {
        if (IS_POST) {
            $admin = D('admin');


            // 自动验证 创建数据集
            if (!$data = $admin->create()) {
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
                exit($admin->getError());
            }
            $pwd = $admin->password;
            // 组合查询条件
            $where = array();
            $where['username'] = $admin->username;
            $where['isdel'] = 0;
            $result = $admin->where($where)->field('id,username,password')->find();
            // 验证用户名 对比 密码

            if ($result && $result['password'] == $pwd) {
                BaseController::do_login($result['id'], $result['username']);
                $this->redirect(('Index/index'));
            } else {
                echo 'no';
                $this->error('登录失败,用户名或密码不正确!');
            }

        }
    }

    public function logout(){
        BaseController::logout();
        $this->redirect(('Account/login'));
    }
}