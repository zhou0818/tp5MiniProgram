<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/5/17
 * Time: 23:08
 */

namespace app\api\validate;

class IDMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger'
    ];

    protected $message = [
        'id' => 'id必须是正整数'
    ];
}