<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $Data = M('admin'); // 实例化Data数据模型
        $this->adminlist = $Data->select();
        $this->display();
    }
    public function  test(){
        $this->show('test');
    }
}