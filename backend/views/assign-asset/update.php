<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssignAsset */

$this->title = 'Update Assign Asset: ' . $model->asset_id;
$this->params['breadcrumbs'][] = ['label' => 'Assign Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->asset_id, 'url' => ['view', 'asset_id' => $model->asset_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="assign-asset-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
