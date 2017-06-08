<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/6/6
 * Time: 23:16
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        'code' => 'require|isNotEmpty'
    ];
    protected $message=[
        'code'=>'没有code获取毛的Token'
    ];
}