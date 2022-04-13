<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssignAsset */

$this->title = $model->asset_id;
$this->params['breadcrumbs'][] = ['label' => 'Assign Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="assign-asset-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'asset_id' => $model->asset_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'asset_id' => $model->asset_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'asset.asset_name',
            'user.username',
            'date_assigned',
        ],
    ]) ?>

</div>
