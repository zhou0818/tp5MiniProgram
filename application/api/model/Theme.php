<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/6/4
 * Time: 23:13
 */

namespace app\api\model;

use think\Model;
class Theme extends BaseModel
{
    public function topicImg()
    {
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }

    public function headImg()
    {
        return $this->belongsTo('Image', 'head_img_id', 'id');
    }
}