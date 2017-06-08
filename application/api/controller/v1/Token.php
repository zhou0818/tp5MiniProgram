<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/6/6
 * Time: 23:15
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;

class Token
{
    public function getToken($code = '')
    {
        (new TokenGet())->gocheck();
        $ut=new UserToken($code);
        $token=$ut->get();
        return $token;
    }
}