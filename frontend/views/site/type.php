<?php

/* @var $this \yii\web\View */
/* @var $models \common\models\Product[] */
/* @var $type \common\models\Type */


$this->title = $type->name;

foreach ($models as $model) {
    $js = <<<JS
$('#add_cart-form-$model->id').submit(function() {

     var form = $(this);
     
     var cartCount = document.getElementById('cart_count').innerHTML;
    
     var newCartCount = Number(cartCount) + 1;
     document.getElementById('cart_count').innerHTML = String(newCartCount);
     
     console.log(newCartCount);
     
     var form = $(this);

     $.ajax({
          url: form.attr('action'),
          type: 'post',
          data: form.serialize(),
          success: function (response) {
               $("#message-field").val("");
          }
     });
    alert('Товар $model->name добавлен в корзину');
     return false;
});
JS;
    $this->registerJs($js, \yii\web\View::POS_READY);
}
?>
<main class="content" id="page-catalog">
    <div class="container">
        <div class="sorting-form-container">
            <div class="sorting-form-category"><?= $type->name ?></div>
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
                    <?= \yii\helpers\Html::a('<img src="'.$model->productImages[0]->image->src.'">', ['site/product', 'id' => $model->id]) ?>
                </div>
                <div class="catalog-item-info">
                    <div class="catalog-item-name"><?= \yii\helpers\Html::a($model->name, ['site/product', 'id' => $model->id]) ?></div>
                    <div class="catalog-item-description">
                        <?= substr($model->description, 0, 300) ?>
                    </div>
                    <div class="catalog-item-parameters">
                        <div class="catalog-item-parameter catalog-item-availability">

                        </div>
                        <div class="catalog-item-parameter catalog-item-quantity">

                        </div>
                    </div>
                </div>
                <div class="catalog-item-order">

                    <?= \yii\helpers\Html::beginForm(['site/add-to-cart'], 'POST', [
                            'id' => 'add_cart-form-'.$model->id,
                    ]) ?>
                    <input type="hidden", name="product" value="<?= $model->id ?>">
                    <?= \yii\helpers\Html::submitButton('В корзину', ['class' => 'order-item-button yellow-bg']) ?>

                    <?= \yii\helpers\Html::endForm() ?>

                    <div class="catalog-item-price"><span class="price-value"><?= $model->price ?></span>&nbsp;<span class="price-preffix">руб.</span></div>

                </div>
            </div>

            <?php } ?>

        </div>
    </div>
</main>