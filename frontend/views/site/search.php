<?php

/* @var $this \yii\web\View */
/* @var $products \common\models\Product[] */



$this->title = 'Результаты поиска';
?>
<main class="content" id="page-catalog">
    <div class="container">

        <div class="catalog-items-container">
            <?php if (count($products) != 0){ ?>
            <?php foreach ($products as $model) { ?>
                <div class="catalog-item">
                    <div class="catalog-item-photo">
                        <?= \yii\helpers\Html::a('<img src="'.$model->productImages[0]->image->src.'">', ['site/product', 'id' => $model->id]) ?>
                    </div>
                    <div class="catalog-item-info">
                        <div class="catalog-item-name"><?= $model->name ?></div>
                        <div class="catalog-item-description">
                            <?= substr($model->description, 0, 300) ?>
                        </div>
                    </div>
                    <div class="catalog-item-order">

                        <?= \yii\helpers\Html:: a('В корзину', ['site/add-to-cart', 'id' => $model->id],
                            ['data-method' => 'post', 'class' => 'order-item-button yellow-bg']) ?>
                        <div class="catalog-item-price"><span class="price-value"><?= $model->price ?></span>&nbsp;<span class="price-preffix">руб.</span></div>

                    </div>
                </div>

            <?php }}else { ?>
                По вашему запросу ничего не найдено.
            <?php } ?>

        </div>
    </div>
</main>