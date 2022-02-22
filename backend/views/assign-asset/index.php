<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssignAssetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assign Assets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-asset-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Assign Asset', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'asset_id',
            'asset.asset_name',
            //'user_id',
            //'category.category_name',
            'user.username',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \backend\models\AssignAsset $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'asset_id' => $model->asset_id]);
                 }
            ],
            
        ],
    ]); ?>


</div>
