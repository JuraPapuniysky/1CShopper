<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use GeoIp2\Database\Reader;
use yii\widgets\ActiveForm;

try {
    $reader = new Reader('data/GeoLite2-City.mmdb');
    $geo = $reader->city(Yii::$app->request->userIP);
    $city = $geo->city->name;
}catch (\GeoIp2\Exception\AddressNotFoundException $e){
    $city = 'localhost';
}

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <header class="header">
        <div class="header-desktop hidden-xs hidden-sm yellow-bg">
            <div class="container">
                <?= Html::a(Html::img('img/logo.png'), ['site/index']) ?>
                <?= Html::a(\common\models\InfoTable::findOne(1)->main_phone, ['site/request-call'], ['class' => 'header-phone']) ?>
                <?php

                    if (Yii::$app->user->isGuest){
                        if (($cart = \common\models\Cart::findOne(['user_ip' => Yii::$app->request->userIP])) !== null){
                            $count_products = $cart->getCartProducts()->count();
                        }else{
                            $count_products = '';
                        }
                    }else{
                        if (($cart = \common\models\Cart::findOne(['user_id' => Yii::$app->user->id])) !== null){
                            $count_products = $cart->getCartProducts()->count();
                        }else{
                            $count_products = '';
                        }
                    }
                    if ($count_products === '0'){
                        $count_products = '';
                    }

                ?>
                <div class="header-links">
                    <?= Html::a('<img src="img/icon-cart.png"><span class="badge" id="cart_count">'.$count_products.'</span>', ['site/cart'],['class' => 'cart-link']) ?>

                    <div class="auth-links">
                        <?php if (Yii::$app->user->isGuest) { ?>
                            <?= Html::a('Войти', ['site/login'], ['data-method' => 'post', 'class' => 'auth-link']) ?>
                            <?= Html::a('Регистрация', ['site/signup'], ['data-method' => 'post', 'class' => 'auth-link']) ?>
                        <?php }else{?>
                            <?= Html::a('Выйти('.\common\models\User::findIdentity(Yii::$app->user->id)->username.')',
                                ['/site/logout'],
                                ['data-method' => 'post', 'class' => 'auth-link']) ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu hidden-xs hidden-sm">
            <div class="container">

                <?php $categories = \common\models\Category::find()->orderBy('num')->all();  foreach ($categories as $category) {?>
                    <div class="menu-item">
                        <?= Html::a($category->name, ['site/category', 'id' => $category->id], ['class' => 'main-menu-link']) ?>
                        <div class="submenu-links">
                            <?php foreach ($category->getTypes()->all() as $type) { ?>
                                <?= Html::a($type->name, ['site/type', 'id' => $type->id], ['class' => 'submenu-link']) ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="menu-item">
                    <?= Html::a('Новости и акции', ['site/news-promotion'], ['class' => 'main-menu-link']) ?>
                </div>

                <div class="menu-item search-menu-item">

                    <?php $search = new \frontend\models\SearchForm(); $form = ActiveForm::begin(['action' => ['site/search'], 'options' => ['class' => 'search-form']]); ?>

                    <?= $form->field($search, 'searchParam')->textInput(['maxlength' => true, 'class' => 'search-input'])->label(false) ?>


                    <?php ActiveForm::end(); ?>


                </div>
            </div>
        </div>
        <div class="header-mobile visible-xs visible-sm yellow-bg">
            <div class="container">
                <?= Html::a(Html::img('img/logo1.png'), ['site/index']) ?>
                <a href="/" class="cart-link"><img src="img/icon-cart.png"></a>
                <button class="burger-menu">
                    <span class="burger-line"></span>
                    <span class="burger-line"></span>
                    <span class="burger-line"></span>
                </button>
                <div class="mobile-menu-container hidden">
                    <?php if (Yii::$app->user->isGuest) { ?>
                        <?= Html::a('Войти', ['site/login'], ['data-method' => 'post', 'class' => 'auth-link']) ?>
                        <?= Html::a('Регистрация', ['site/signup'], ['data-method' => 'post', 'class' => 'auth-link']) ?>
                    <?php }else{?>
                        <?= Html::a('Выйти('.\common\models\User::findIdentity(Yii::$app->user->id)->username.')',
                            ['/site/logout'],
                            ['data-method' => 'post', 'class' => 'auth-link']) ?>
                    <?php } ?>
                    <?= Html::a(\common\models\InfoTable::findOne(1)->main_phone, ['site/request-call'], ['class' => 'header-phone']) ?>

                    <?php foreach ($categories as $category){ ?>

                    <div class="menu-item">
                        <a href="/" class="main-menu-link"><?= $category->name ?></a>
                        <div class="submenu-links hidden">
                            <?php foreach ($category->getTypes()->all() as $type) { ?>
                                <?= Html::a($type->name, ['site/type', 'id' => $type->id], ['class' => 'submenu-link']) ?>
                            <?php } ?>
                        </div>
                    </div>

                    <?php } ?>

                    <div class="menu-item search-menu-item">

                        <?php $search = new \frontend\models\SearchForm(); $form = ActiveForm::begin(['action' => ['site/search'], 'options' => ['class' => 'search-form']]); ?>

                        <?= $form->field($search, 'searchParam')->textInput(['maxlength' => true, 'class' => 'search-input'])->label(false) ?>


                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="content" id="page-home">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="logo-container footer-left-block">
                <a href="/" class="logo"><?= Html::img('img/logo.png')?></a>
                <div class="logo-text">Lorem</div>
            </div>
            <div class="footer-menu-links footer-center-block">
                <?php foreach (\common\models\About::find()->all() as $about){ ?>
                    <?= Html::a($about->name, ['site/about', 'id' => $about->id], ['class' => 'footer-menu-link']) ?>
                <?php } ?>
            </div>
            <div class="footer-info-links footer-right-block">
                <div class="footer-city"><span>Ваш город: </span><a href="#" class="your-city"><?php echo $city; ?></a></div>
                <a href="/" class="footer-phone"><?= \common\models\InfoTable::findOne(1)->phone1 ?></a>
                <a href="/" class="footer-phone"><?= \common\models\InfoTable::findOne(1)->email ?></a>
                <div class="footer-socials">
                    <a href="#" class="footer-social-link"><img src="img/footer-icon-mail.png"></a>
                    <a href="#" class="footer-social-link"><img src="img/footer-icon-vk.png"></a>
                    <a href="#" class="footer-social-link"><img src="img/footer-icon-vk2.png"></a>
                    <a href="#" class="footer-social-link"><img src="img/footer-icon-tw.png"></a>
                    <a href="#" class="footer-social-link"><img src="img/footer-icon-ok.png"></a>
                    <a href="#" class="footer-social-link"><img src="img/footer-icon-fb.png"></a>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php
$cart_script = <<< JS

function cartAdd() {
      var count = document.getElementById('cart_count').innerHTML;
      var newCount = count + 1;
      document.getElementById('cart_count').innerHTML = newCount;
}

JS;
$this->registerJs($cart_script,  yii\web\View::POS_READY);
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
