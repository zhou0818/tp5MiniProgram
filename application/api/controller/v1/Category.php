<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/6/6
 * Time: 22:13
 */

namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;

class Category
{
public function getAllCategories(){
    $categories=CategoryModel::all([],'img');
    if($categories->isEmpty()){
        throw new CategoryException();
    }
    return $categories;
}
}