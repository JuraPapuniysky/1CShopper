<?php

/* @var $order \common\models\Order */
/* @var $this \yii\web\View */

$this->title = "Подтверждения заказа";
?>

<main class="content" id="page-order-confirm">
    <div class="container">
        <div class="order-parameters-container">
            <div class="order-parameters-container-title">
                <div class="parameter-title-item">Корзина</div>
                <div class="parameter-title-item">Параметры плательщика</div>
                <div class="parameter-title-item parameter-title-item-active">Подтверждение заказа</div>
            </div>
            <div class="order-parameters-container-body">
                <div class="user-basket-title">Ваш заказ</div>
                <div class="user-basket-items-container">


                    <?php foreach ($order->orderProducts as $orderProduct){ ?>
                    <div class="catalog-item user-basket-item">
                        <div class="catalog-item-photo">
                            <img src="<?= $orderProduct->product->productImages[0]->image->src ?>">
                        </div>
                        <div class="catalog-item-info">
                            <div class="catalog-item-name"><?= $orderProduct->product->name ?></div>
                            <div class="catalog-item-description">
                                <?= substr($orderProduct->product->description, 0, 255) ?>
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
                                <div class="catalog-item-parameter catalog-item-price">
                                    <div class="catalog-item-parameter-title">Цена:</div>
                                    <div class="catalog-item-parameter-value"><span class="price-value"><?= $orderProduct->product->price ?></span>&nbsp;<span class="price-preffix">руб</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php } ?>




                </div>
            </div>
            <div class="order-final-information">
                <div class="order-phone-column">
                    <div class="order-phone-title">Определились с заказом?</div>
                    <div class="order-confirm-descr">
                        <p>Совершить заказ Вы можете, позвонив по телефону: <span class="order-phone-number">600 987 9878</span></p>
                        <p>Либо можете <a href="#" class="request-call-link">заказать звонок</a>. Мы сами позвоним Вам. Это совершенно бесплатно.</p>
                    </div>
                </div>
                <div class="order-confirm-column">
                    <div class="order-final-price">
                        <span class="price-text">Итого к оплате:</span>
                        <span class="price-value"><b><?= $order->getOrderPrice() ?></b>&nbsp;<b class="price-preffix">руб.</b></span>
                    </div>
                    <button class="order-confirm-call-button yellow-bg">Заказать звонок</button>
                    <div class="call-button-description">бесплатно</div>
                </div>
            </div>
        </div>
    </div>
</main>