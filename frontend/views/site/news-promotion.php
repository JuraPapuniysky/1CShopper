<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\NewsPromotion */

$this->title = $model->title;


?>

<main class="content" id="page-account">
    <div class="container">
        <div class="user-container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="catalog-item-photo">
                        <?php if ($model->newsPromotionImage !== null) { ?>
                        <img src="<?= $model->newsPromotionImage->src ?>">
                        <?php }else{ ?>
                            <img src="">
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="catalog-item-name"><?= $model->title ?></div>
                    <div class="catalog-item-description">
                        <?= $model->text ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
