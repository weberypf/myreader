<?php
namespace Admin\Controller;

use Think\Controller;
class AdministratorController extends BaseController
{
    public function index(){
        $Data = M('admin'); // 实例化Data数据模型
        $this->adminlist = $Data->select();
        $this->display();
    }
}