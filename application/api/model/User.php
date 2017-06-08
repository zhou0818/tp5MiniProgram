<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/6/6
 * Time: 23:24
 */

namespace app\api\model;


class User extends BaseModel
{
public static function getByOpenID($openid){
    $user=self::where('openid','=',$openid)
        ->find();
    return $user;
}
}