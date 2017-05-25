<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/5/24
 * Time: 23:17
 */

namespace app\lib\exception;




class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}