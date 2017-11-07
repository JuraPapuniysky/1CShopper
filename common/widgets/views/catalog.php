<?php

/* @var $products \common\models\Product[] */
/* @var $pages \yii\data\Pagination */
use yii\widgets\LinkPager;

foreach ($products as $product) {
    $js = <<<JS
$('#add_cart-form-$product->id').submit(function() {

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
     
     alert('Товар $product->name добавлен в корзину');
     

     return false;
});
JS;
    $this->registerJs($js, \yii\web\View::POS_READY);
}
?>

<div class="home-catalog">
    <div class="container">
        <div class="home-catalog-items-container">
            <?php foreach ($products as $product) { ?>
            <div class="home-catalog-item">
                <div class="home-catalog-item-photo">
                    <?php if(isset($product->productImages[0]->image)){ ?>
                    <img src="<?= $product->productImages[0]->image->src ?>">
                    <?php } ?>
                </div>
                <div class="home-catalog-item-info">
                    <div class="home-catalog-item-title"><?= $product->name ?></div>
                    <div class="home-catalog-item-descr">
                        <?= substr($product->description, 0, 255) ?>
                    </div>
                    <div class="home-catalog-item-price">
                        <?= \yii\helpers\Html::beginForm(['site/add-to-cart'], 'POST', [
                                'id' => 'add_cart-form-'.$product->id,
                        ]) ?>
                        <input type="hidden" value="<?= $product->id ?>" name="product">
                        <?= \yii\helpers\Html::submitButton('В корзину', ['class' => 'home-catalog-item-order yellow-bg',]) ?>
                        <?= \yii\helpers\Html::endForm() ?>
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