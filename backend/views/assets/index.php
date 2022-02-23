<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assets-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Assets', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <hr>
    <p>
        <?= Html::a('Assign Assets', ['/assign-asset/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'asset_id',
            'asset_name',
            'category.category_name',
            'asset_amount',
            'date_bought',
            //'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \backend\models\Assets $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'asset_id' => $model->asset_id]);
                 }
            ],
        ],
    ]); ?>


</div>
