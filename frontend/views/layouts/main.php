<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
                <a href="/" class="logo">Logo...///</a>
                <a class="header-phone" href="tel:+380984553654">
                    +3 098 455 3654 
                    

                </a>
                <div class="header-links">
                    <?= Html::a('<img src="img/icon-cart.png">', ['site/cart'],['class' => 'cart-link']) ?>
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

                <?php foreach (\common\models\Category::find()->orderBy('num')->all() as $category) {?>
                    <div class="menu-item">
                        <a href="/" class="main-menu-link"><?= $category->name ?></a>
                        <div class="submenu-links">
                            <?php foreach ($category->getTypes()->all() as $type) { ?>
                                <?= Html::a($type->name, ['site/type', 'id' => $type->id], ['class' => 'submenu-link']) ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>

                <div class="menu-item search-menu-item">
                    <form class="search-form">
                        <input type="search" name="" class="search-input">
                    </form>
                </div>
            </div>
        </div>
        <div class="header-mobile visible-xs visible-sm yellow-bg">
            <div class="container">
                <a href="/" class="logo">Logo...///</a>
                <a href="/" class="cart-link"><img src="img/icon-cart.png"></a>
                <button class="burger-menu">
                    <span class="burger-line"></span>
                    <span class="burger-line"></span>
                    <span class="burger-line"></span>
                </button>
                <div class="mobile-menu-container hidden">
                    <a href="/" class="auth-link">Войти</a>
                    <a href="/" class="auth-link">Регистрация</a>
                    <a class="header-phone" href="tel:+380984553654">+3 098 455 3654</a>
                    <div class="menu-item">
                        <a href="/" class="main-menu-link">Собственные решения</a>
                        <div class="submenu-links hidden">
                            <a href="#" class="submenu-link">Подменю</a>
                            <a href="#" class="submenu-link">Подменю</a>
                            <a href="#" class="submenu-link">Подменю</a>
                            <a href="#" class="submenu-link">Подменю</a>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a href="/" class="main-menu-link">Предприятие</a>
                        <div class="submenu-links hidden">
                            <a href="#" class="submenu-link">Подменю</a>
                            <a href="#" class="submenu-link">Подменю</a>
                            <a href="#" class="submenu-link">Подменю</a>
                            <a href="#" class="submenu-link">Подменю</a>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a href="/" class="main-menu-link">Отраслевые  программы 1С</a>
                        <div class="submenu-links hidden">
                            <a href="#" class="submenu-link">Подменю</a>
                            <a href="#" class="submenu-link">Подменю</a>
                            <a href="#" class="submenu-link">Подменю</a>
                            <a href="#" class="submenu-link">Подменю</a>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a href="/" class="main-menu-link">Акции</a>
                        <div class="submenu-links hidden">
                            <a href="#" class="submenu-link">Подменю</a>
                            <a href="#" class="submenu-link">Подменю</a>
                            <a href="#" class="submenu-link">Подменю</a>
                            <a href="#" class="submenu-link">Подменю</a>
                        </div>
                    </div>
                    <div class="menu-item search-menu-item">
                        <form class="search-form">
                            <input type="search" name="" class="search-input">
                        </form>
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
                <a href="/" class="logo">Logo...///</a>
                <div class="logo-text">Какой-то текст какой-то текст какой-то это текст</div>
            </div>
            <div class="footer-menu-links footer-center-block">
                <a href="#" class="footer-menu-link">Где купить?</a>
                <a href="#" class="footer-menu-link">О нас</a>
                <a href="#" class="footer-menu-link">Новости</a>
                <a href="#" class="footer-menu-link">Покупка и доставка</a>
            </div>
            <div class="footer-info-links footer-right-block">
                <div class="footer-city"><span>Ваш город: </span><a href="#" class="your-city">Сумы</a></div>
                <a href="tel:+380505065255" class="footer-phone">050 506 5255</a>
                <a href="tel:+380668789112" class="footer-phone">066 878 9112</a>
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
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
