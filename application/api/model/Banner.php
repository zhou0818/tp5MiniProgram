<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/5/21
 * Time: 14:48
 */

namespace app\api\model;

use think\Model;

class Banner extends Model
{
    public function items()
    {
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }

    public static function getBannerById($id)
    {
        $banner = self::with(['items', 'items.img'])->find($id);
        return $banner;
    }
}