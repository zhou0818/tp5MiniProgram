<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/5/21
 * Time: 15:20
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    public $code=400;
    public $msg='参数错误';
    public $errorCode=10000;
}