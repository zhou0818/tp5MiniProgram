<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/5/21
 * Time: 15:23
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '请求的Banner不存在';
    public $errorCode = 40000;
}