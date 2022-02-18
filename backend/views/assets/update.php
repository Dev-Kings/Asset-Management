<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Assets */

$this->title = 'Update Assets: ' . $model->asset_id;
$this->params['breadcrumbs'][] = ['label' => 'Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->asset_id, 'url' => ['view', 'asset_id' => $model->asset_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="assets-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
