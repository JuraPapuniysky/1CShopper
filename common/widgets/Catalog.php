<?php
/**
 * Created by PhpStorm.
 * User: wsst17
 * Date: 03.10.17
 * Time: 11:28
 */

namespace common\widgets;


use common\models\Product;
use yii\bootstrap\Widget;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;

class Catalog extends Widget
{
    public $products;
    public $pages;

    public function init()
    {
        $query = Product::find();

        $countQuery = clone $query;

        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 8]);
        $this->products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        $this->pages = $pages;
    }

    public function run()
    {
        return $this->render('catalog', [
            'products' => $this->products,
            'pages' => $this->pages,
        ]);
    }
}