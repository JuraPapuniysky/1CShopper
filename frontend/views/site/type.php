<?php

/* @var $this \yii\web\View */
/* @var $models \common\models\Product[] */
/* @var $type \common\models\Type */


$this->title = $type->name;
?>
<main class="content" id="page-catalog">
    <div class="container">
        <div class="sorting-form-container">
            <div class="sorting-form-category"><?= $type->name ?></div>
            <form class="sorting-form">
                <div class="sorting-form-title">Сортировка по:</div>
                <label class="sort-label">
                    <input type="radio" name="sortby" class="radio-default" value="sortbyname" checked="checked">
                    <span class="sort-text">Имени</span>
                </label>
                <label class="sort-label">
                    <input type="radio" name="sortby" class="radio-default" value="sortbydate">
                    <span class="sort-text">Дате</span>
                </label>
                <label class="sort-label">
                    <input type="radio" name="sortby" class="radio-default" value="sortbypopularity">
                    <span class="sort-text">Популярности</span>
                </label>
            </form>
        </div>
        <div class="catalog-items-container">

            <?php foreach ($models as $model) { ?>
            <div class="catalog-item">
                <div class="catalog-item-photo">
                    <?= \yii\helpers\Html::a('<img src="'.$model->productImages[0]->image->src.'">', ['site/product', 'id' => $model->id]) ?>
                </div>
                <div class="catalog-item-info">
                    <div class="catalog-item-name"><?= $model->name ?></div>
                    <div class="catalog-item-description">
                        <?= substr($model->description, 0, 300) ?>
                    </div>
                    <div class="catalog-item-parameters">
                        <div class="catalog-item-parameter catalog-item-availability">
                            <div class="catalog-item-parameter-title">Наличие товара:</div>
                            <div class="catalog-item-parameter-value">есть</div>
                        </div>
                        <div class="catalog-item-parameter catalog-item-quantity">
                            <div class="catalog-item-parameter-title">Количество:</div>
                            <div class="catalog-item-parameter-value">2</div>
                        </div>
                    </div>
                </div>
                <div class="catalog-item-order">
                <?php \yii\widgets\Pjax::begin(); ?>
                    <?= \yii\helpers\Html:: a('В корзину', ['site/add-to-cart', 'id' => $model->id],
                        ['data-method' => 'post', 'class' => 'order-item-button yellow-bg']) ?>
                    <div class="catalog-item-price"><span class="price-value"><?= $model->price ?></span>&nbsp;<span class="price-preffix">руб.</span></div>
                 <?php \yii\widgets\Pjax::end(); ?>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
</main>