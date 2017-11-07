<?php

/* @var $this yii\web\View */
/* @var $model \common\models\About */

use yii\helpers\Html;

$this->title = 'About';

?>
<main class="content" id="page-account">
    <div class="container">
        <div class="user-container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="catalog-item-name"><?= $model->name ?></div>
                    <div class="catalog-item-description">
                        <?= $model->text ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>