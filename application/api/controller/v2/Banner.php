<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/5/17
 * Time: 22:06
 */

namespace app\api\controller\v1;


use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\BannerMissException;

class Banner
{
    /**
     * 获取指定id的banner信息
     * @url /banner/:id
     * @http GET
     * @id banner的id
     */
    public function getBanner($id)
    {
        (new IDMustBePositiveInt())->gocheck();
        $banner = BannerModel::getBannerById($id);
        if (!$banner) {
            throw new BannerMissException();
        }
        return $banner;
    }
}