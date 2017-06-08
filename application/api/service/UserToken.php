<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/6/6
 * Time: 23:24
 */

namespace app\api\service;


use app\lib\exception\WeChatException;
use app\lib\exception\TokenException;
use think\Exception;
use app\api\model\User as UserModel;

class UserToken extends Token
{
    protected $code;
    protected $appID;
    protected $appSecret;
    protected $loginUrl;

    function __construct($code)
    {
        $this->code = $code;
        $this->appID = config('wechat.app_id');
        $this->appSecret = config('wechat.app_secret');
        $this->loginUrl = sprintf(config("wechat.login_url"),
            $this->appID, $this->appSecret, $this->code);
    }

    public function get()
    {
        $result = curl_get($this->loginUrl);
        $wxResult = json_decode($result, true);
        if (empty($wxResult)) {
            throw new Exception('获取session_key及openid时发生异常，微信内部错误');
        } else {
            $loginFail = array_key_exists('errcode', $wxResult);
            if ($loginFail) {
                $this->processLoginError($wxResult);
            } else {
                $this->grantToken($wxResult);
            }
        }
    }

    private function grantToken($wxResult)
    {
        $openid = $wxResult['openid'];
        $user=UserModel::getByOpenID($openid);
        if($user){
            $uid=$user->id;
        }
        else{
            $uid=$this->newUser($openid);
        }
        $cachedValue=$this->prepareCachedValue($wxResult,$uid);
        $token = $this->saveToCache($cachedValue);
        return $token;
    }

    private function saveToCache($cachedValue){
        $key=self::generateToken();
        $value=json_encode($cachedValue);
        $expire_in = config('setting.token_expire_in');
        $result = cache($key, $value, $expire_in);
        if (!$result){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }
        return $key;
    }

    private function prepareCachedValue($wxResult,$uid){
        $cachedValue=$wxResult;
        $cachedValue['uid']=$uid;
        $cachedValue['scope']=16;
        return $cachedValue;
    }

    private function newUser($openid){
        $user=UserModel::create([
            'openid'=>$openid
        ]);
        return $user;
    }
    private function processLoginError($wxResult)
    {
        throw new WeChatException([
            'msg' => $wxResult['errmsg'],
            'errorCode' => $wxResult['errcode']
        ]);
    }

}