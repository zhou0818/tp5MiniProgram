<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/5/21
 * Time: 14:48
 */

namespace app\api\model;


use think\Db;

class Banner
{
    public static function getBannerById($id)
    {
//      $result=  Db::query('select * from banner_item  where banner_id=?',[$id]);
        $result=Db::table('banner_item')->where("banner_id",'=',$id)->select();
        return json($result);
    }
}