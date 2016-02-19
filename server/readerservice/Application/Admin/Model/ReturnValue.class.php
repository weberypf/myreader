<?php

namespace Admin\Model;


class ReturnValue
{
    public $IsSuccess;
    public $Message;
    public $Data;
    public static function faild($message){
        $result = new ReturnValue();
        $result->Message = $message;
        $result->IsSuccess = false;
        return $result;
    }
    public static  function success($data,$message=""){
        $result = new ReturnValue();
        $result->Message = $message;
        $result->IsSuccess = true;
        $result->Data = $data;
        return $result;
    }
}