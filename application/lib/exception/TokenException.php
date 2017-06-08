<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/6/8
 * Time: 10:54
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'Token已过期或无效Token';
    public $errorCode = 10001;
}