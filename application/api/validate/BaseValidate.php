<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/5/21
 * Time: 14:35
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
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
        $result=$this->batch()->check($params);
        if(!$result){
            $e=new ParameterException([
                'msg'=>$this->error
            ]);
            throw $e;
        }
        else{
            return true;
        }
    }
}