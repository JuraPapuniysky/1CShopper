<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\Product */

$this->title = $model->name;
?>
<main class="content" id="page-account">
    <div class="container">
        <div class="user-container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="catalog-item-photo">
                    <img src="<?= $model->productImages[0]->image->src ?>">
                    </div>
                </div>
                <div class="col-lg-9">
                        <div class="catalog-item-name"><?= $model->name ?></div>
                        <div class="catalog-item-description">
                            <?= $model->text ?>

                        </div>
                        <div class="catalog-item-parameters">
                            <div class="catalog-item-parameter catalog-item-price">
                                <div class="catalog-item-parameter-title">Цена:</div>
                                <div class="catalog-item-parameter-value"><span class="price-value"><?= $model->price?></span>&nbsp;<span class="price-preffix">руб</span></div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</main>
