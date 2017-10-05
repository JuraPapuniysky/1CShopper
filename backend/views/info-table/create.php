<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\InfoTable */

$this->title = 'Create Info Table';
$this->params['breadcrumbs'][] = ['label' => 'Info Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
