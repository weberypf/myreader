<?php

namespace Admin\Model;

use Think\Model;
class BookModel extends Model
{
    /**
     * 自动验证
     * self::EXISTS_VALIDATE 或者0 存在字段就验证（默认）
     * self::MUST_VALIDATE 或者1 必须验证
     * self::VALUE_VALIDATE或者2 值不为空的时候验证
     */
    protected $_validate = array(
        array('bookname', 'require', '书名不能为空！'),
        array('bookname', '', '已存在这本书！',0,'unique'),
    );

    /**
     * 自动完成
     */
    protected $_auto = array (
        array('createtime',"mydate",1,"callback"),
        array('isdel', 0),
    );

    protected function mydate(){
        return date("Y-m-d H:i:s");
    }
}