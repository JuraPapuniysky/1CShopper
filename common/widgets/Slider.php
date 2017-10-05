<?php


namespace common\widgets;


use yii\bootstrap\Widget;

class Slider extends Widget
{
    public $model;

    public function init()
    {

        if (($model = \common\models\Slider::find()->orderBy('num')->all()) !== null){
            $this->model = $model;
        }else{
            $this->model = null;
        }
    }
    public function run()
    {
        return $this->render('slider', [
            'model' => $this->model,
        ]);
    }
}