<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/6/7
 * Time: 12:57
 */

namespace app\api\service;


class Token
{
    public function generateToken()
    {
        $randChar=getRandChar(32);
        $timestamp= $_SERVER['REQUEST_TIME_FLOAT'];
        $tokenSalt = config('secure.token_salt');
        return md5($randChar . $timestamp . $tokenSalt);
    }
}