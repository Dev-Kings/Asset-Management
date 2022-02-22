<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assets-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'asset_id') ?>

    <?= $form->field($model, 'asset_name') ?>

    <?= $form->field($model, 'asset_category') ?>

    <?= $form->field($model, 'asset_amount') ?>

    <?= $form->field($model, 'date_bought') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
