<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/6/6
 * Time: 0:10
 */

namespace app\api\controller\v1;

use app\api\model\Product as ProductModel;
use app\api\validate\Count;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ProductException;

class Product
{
    public function getRecent($count = 15)
    {
        (new Count())->gocheck();
        $products = ProductModel::getMostRecent(($count));
        if ($products->isEmpty()) {
            throw new ProductException();
        }
        $products = $products->hidden(['summary']);
        return $products;
    }

    public function getAllInCategory($id)
    {
        (new IDMustBePositiveInt())->gocheck();
        $products = ProductModel::getProductByCategoryID($id);
        if($products->isEmpty()){
            throw new ProductException();
        }
        $products = $products->hidden(['summary']);
        return $products;
    }
}