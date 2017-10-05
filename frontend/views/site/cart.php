<?php
/* @var $this \yii\web\View */
/* @var $cart \common\models\Cart */

$this->title = 'Корзина';
?>

<main class="content" id="page-account">
    <div class="container">
        <div class="user-container">
            <?php if (!Yii::$app->user->isGuest) { ?>
            <div class="user-account">
                <div class="user-account-photo">
                    <div class="user-account-photo-inner" id="account-user-photo">
                        <div class="current-img-container img-container"><img src="img/catalog-item.jpg"></div>
                        <div class="uploaded-img-container img-container"><img class="uploaded-input-image" src="#" alt=""/></div>
                        <form>
                            <label>
                                <input type="file" accept="image/jpg, image/png, image/jpeg" name="upload-new-img" class="upload-new-img"/>
                                <div class="change-photo-button">сменить фото</div>
                            </label>
                            <button type="submit" class="upload-photo-button">загрузить фото</button>
                        </form>
                    </div>
                </div>
                <div class="user-account-info">
                    <div class="user-account-info-title">
                        <span>Мои данные</span>
                        <button class="edit-user-info-button">Редактировать</button>
                    </div>
                    <div class="user-account-bottom">
                        <div class="user-account-personal">
                            <div class="user-account-personal-parameter user-account-mail">
                                <div class="user-account-personal-title">Почта:</div>
                                <div class="user-account-personal-value"></div>
                            </div>
                            <div class="user-account-personal-parameter user-account-login">
                                <div class="user-account-personal-title">Логин:</div>
                                <div class="user-account-personal-value"></div>
                            </div>
                            <div class="user-account-personal-parameter user-account-password">
                                <div class="user-account-personal-title">Пароль:</div>
                                <div class="user-account-personal-value"></div>
                            </div>
                        </div>
                        <div class="user-account-socials">
                            <div class="user-account-socials-title">Подключить профиль социальной сети:</div>
                            <div class="user-account-socials-links">
                                <button class="user-account-social-link"><img src="img/footer-icon-vk.png"></button>
                                <button class="user-account-social-link"><img src="img/footer-icon-vk2.png"></button>
                                <button class="user-account-social-link"><img src="img/footer-icon-tw.png"></button>
                                <button class="user-account-social-link"><img src="img/footer-icon-ok.png"></button>
                                <button class="user-account-social-link"><img src="img/footer-icon-fb.png"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>


            <div class="user-basket">
                <div class="user-basket-title">Корзина</div>
                <div class="user-basket-items-container">

                    <?php if ($cart !== null){ ?>
                    <?php foreach ($cart->cartProducts as $cartProduct) { ?>
                        <div class="catalog-item user-basket-item">
                            <div class="catalog-item-photo">
                                <img src="<?= $cartProduct->product->productImages[0]->image->src ?>">
                            </div>
                            <div class="catalog-item-info">
                                <div class="catalog-item-name"><?= $cartProduct->product->name ?></div>
                                <div class="catalog-item-description">
                                    <?= substr($cartProduct->product->description, 0, 255) ?>
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
                                        <div class="catalog-item-parameter-value"><span class="price-value"><?= $cartProduct->product->price ?></span>&nbsp;<span class="price-preffix">руб</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                </div>
                <div class="user-basket-bottom-container">
                    <div class="user-basket-registration-container">
                        <?php if(Yii::$app->user->isGuest){ ?>
                            <?= \yii\helpers\Html::a('Ещё не зарегистрированы?', ['site/signup'], ['class' => 'basket-registration-link']) ?>
                        <?php } ?>
                    </div>
                    <?= \yii\helpers\Html::a('Оформить заказ', ['site/order'], ['class' => 'order-item-button submit-basket-order-button yellow-bg']) ?>
                </div>
            <?php }else{ ?>
                В корзине пусто.
                <?php } ?>
            </div>


        </div>
    </div>
</main>