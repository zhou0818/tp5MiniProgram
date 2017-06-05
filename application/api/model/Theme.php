<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/6/4
 * Time: 23:13
 */

namespace app\api\model;

class Theme extends BaseModel
{
    protected $hidden = ['topic_img_id', 'head_img_id', 'delete_time', 'update_time'];

    public function topicImg()
    {
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }

    public function headImg()
    {
        return $this->belongsTo('Image', 'head_img_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany('Product', 'theme_product', 'product_id');
    }

    public static function getThemeWithProducts($id)
    {
        $theme = self::with('products,topicImg,headImg')
            ->find($id);
        return $theme;
    }
}