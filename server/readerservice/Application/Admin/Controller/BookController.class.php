<?php
namespace Admin\Controller;

use Admin\Model\ReturnValue;
use Think\Controller;
class BookController extends BaseController
{
    public function index(){

        $book = M('book'); // 实例化Data数据模型

        $map['isdel'] = 0;
        $this->booklist = $book->where($map)->select();
        $this->display();
    }

    public function create(){
        if(IS_POST){
            $book = D('Book');

            if($book->create()){
                $result = $book->add();
                if($result) {
                    $this->ajaxReturn( ReturnValue::success("ok") );
                }else{
                    $this->ajaxReturn( ReturnValue::faild("添加失败"));
                }
            }else{
                $this->ajaxReturn( ReturnValue::faild($book->getError()));
            }
        }else{
            $this->display();
        }
    }

    public function edit($id=0){
        $book = M('Book');
        $this->book = $book->find($id);
        $this->display();
    }
    public function update(){
        $book = D('Book');

        if($book->create()){
            $result = $book->save();
            if($result) {
                $this->ajaxReturn( ReturnValue::success("ok") );
            }else{
                $this->ajaxReturn( ReturnValue::faild("修改失败"));
            }
        }else{
            $this->ajaxReturn( ReturnValue::faild($book->getError()));
        }
    }

    //上传封面
    public function uploadCover(){
        $upload = new \Think\Upload();
        $upload->maxSize = 1048576 ; //1M
        $upload->exts = array('jpg', 'png', 'jpeg');
        $upload->rootPath  =     'Public/images/cover/';
        $upload->savePath  =     '';
        $info   =   $upload->upload();

        //echo $info;

        if(!$info) {// 上传错误提示错误信息
            $this->ajaxReturn(ReturnValue::faild($upload->getError()));
        }else{// 上传成功
            $this->ajaxReturn(ReturnValue::success(__ROOT__."/".$upload->rootPath.$upload->savePath.$info['file']['savepath'].$info['file']['savename']));
        }
    }
}