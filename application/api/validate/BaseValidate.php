<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/5/21
 * Time: 14:35
 */

namespace app\api\validate;


use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    /**
     * @return bool
     * @throws Exception
     */
    public function gocheck()
    {
        $request = Request::instance();
        $params=$request->param();
        $result=$this->check($params);
        if(!$result){
            $error=$this->error;
            throw new Exception($error);
        }
        else{
            return true;
        }
    }
}