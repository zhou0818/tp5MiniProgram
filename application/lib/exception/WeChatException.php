<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/6/7
 * Time: 11:22
 */

namespace app\lib\exception;


class WeChatException extends BaseException
{
    public $code = 400;
    public $msg = '微信服务器接口调用失败';
    public $errorCode = 999;
}