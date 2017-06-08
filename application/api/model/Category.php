<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/6/6
 * Time: 22:13
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time'];

    public function img()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}