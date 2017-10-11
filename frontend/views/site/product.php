<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\Product */

$this->title = $model->name;

$script = <<< JS

$('#add_cart-form').submit(function() {

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

$this->registerJs($script, \yii\web\View::POS_READY);
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
                            <?= \yii\helpers\Html::beginForm(['site/add-to-cart'], 'POST', [
                                'id' => 'add_cart-form',
                            ]) ?>
                            <input type="hidden" value="<?= $model->id ?>" name="product">
                            <?= \yii\helpers\Html::submitButton('В корзину', ['class' => 'order-item-button yellow-bg']) ?>
                            <?= \yii\helpers\Html::endForm() ?>
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
