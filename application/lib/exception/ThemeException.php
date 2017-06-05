<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/6/5
 * Time: 23:07
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '请求的主题不存在';
    public $errorCode = 30000;
}
