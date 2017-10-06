<?php


namespace frontend\models;


use common\models\Product;
use yii\base\Model;

class SearchForm extends Model
{
    public $searchParam;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['searchParam', 'required'],
            ['searchParam', 'string', 'min' => 2],
        ];
    }

    public function searchResults()
    {
        return Product::find()->where(['like', 'name', $this->searchParam.'%'])->all();
    }
}