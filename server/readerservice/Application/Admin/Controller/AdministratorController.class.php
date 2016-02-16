<?php
namespace Admin\Controller;

use Think\Controller;
class AdministratorController extends Controller
{
    public function index(){
        $Data = M('admin'); // 实例化Data数据模型
        $this->adminlist = $Data->select();
        $this->display();
    }
}