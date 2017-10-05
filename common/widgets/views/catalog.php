<?php

/* @var $products \common\models\Product[] */
/* @var $pages \yii\data\Pagination */
use yii\widgets\LinkPager;

?>

<div class="home-catalog">
    <div class="container">
        <div class="home-catalog-items-container">
            <?php foreach ($products as $product) { ?>
            <div class="home-catalog-item">
                <div class="home-catalog-item-photo">
                    <img src="<?= $product->productImages[0]->image->src ?>">
                </div>
                <div class="home-catalog-item-info">
                    <div class="home-catalog-item-title"><?= $product->name ?></div>
                    <div class="home-catalog-item-descr">
                        <?= substr($product->description, 0, 255) ?>
                    </div>
                    <div class="home-catalog-item-price">
                        <?= \yii\helpers\Html:: a('В корзину', ['site/add-to-cart', 'id' => $product->id], ['class' => 'home-catalog-item-order yellow-bg']) ?>
                        <span class="price-value"><?= $product->price ?></span>
                        <span class="price-preffix">руб.</span>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
      <?php  echo LinkPager::widget([
        'pagination' => $pages,
        'registerLinkTags' => true
        ]); ?>
    </div>
</div>