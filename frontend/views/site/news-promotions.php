<?php

/* @var $this \yii\web\View */
/* @var $models \common\models\NewsPromotion[] */



$this->title = 'Новости и акции';



?>
<main class="content" id="page-catalog">
    <div class="container">
        <div class="sorting-form-container">
            <div class="sorting-form-category">Новости и акции</div>
            <form class="sorting-form">
                <div class="sorting-form-title"></div>
                <label class="sort-label">
                    <input type="radio" name="sortby" class="radio-default" value="sortbyname" checked="checked">
                    <span class="sort-text"></span>
                </label>
                <label class="sort-label">
                    <input type="radio" name="sortby" class="radio-default" value="sortbydate">
                    <span class="sort-text"></span>
                </label>
                <label class="sort-label">
                    <input type="radio" name="sortby" class="radio-default" value="sortbypopularity">
                    <span class="sort-text"></span>
                </label>
            </form>
        </div>
        <div class="catalog-items-container">

            <?php foreach ($models as $model) { ?>
                <div class="catalog-item">
                    <div class="catalog-item-photo">
                        <?php if ($model->newsPromotionImage !== null) { ?>
                        <?= \yii\helpers\Html::a('<img src="'.$model->newsPromotionImage->src.'">', ['site/news-promotion', 'id' => $model->id]) ?>
                        <?php }else { ?>
                            <?= \yii\helpers\Html::a('<img src="/">', ['site/news-promotion', 'id' => $model->id]) ?>
                        <?php } ?>
                    </div>

                    <div class="catalog-item-info">
                        <div class="catalog-item-name"><?= \yii\helpers\Html::a($model->title, ['site/news-promotion', 'id' => $model->id]) ?></div>
                        <div class="catalog-item-description">
                            <?= $model->description ?>
                        </div>
                        <div class="catalog-item-parameters">
                            <div class="catalog-item-parameter catalog-item-availability">

                            </div>
                            <div class="catalog-item-parameter catalog-item-quantity">

                            </div>
                        </div>

                    </div>
                    <div class="catalog-item-order">

                        <?= \yii\helpers\Html::a('Подробно',['site/news-promotion', 'id' => $model->id], ['class' => 'order-item-button yellow-bg']) ?>

                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</main>