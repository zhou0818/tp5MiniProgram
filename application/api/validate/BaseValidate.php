<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/5/21
 * Time: 14:35
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    /**
     * @return bool
     * @throws ParameterException
     */
    public function gocheck()
    {
        $request = Request::instance();
        $params=$request->param();
        $result=$this->batch()->check($params);
        if(!$result){
            $e=new ParameterException([
                'msg' => is_array($this->error) ? implode(
                    ';', $this->error) : $this->error,
            ]);
            throw $e;
        }
        else{
            return true;
        }
    }

    protected function isPositiveInteger($value, $rule = '',
                                         $data = '', $field = '')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        } else {
            return false;
        }
    }
}