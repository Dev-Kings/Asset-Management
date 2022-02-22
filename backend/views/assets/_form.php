<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Assets;
use backend\models\Category;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Assets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'asset_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asset_category')->dropDownList(
        ArrayHelper::map(Category::find()->all(), 'category_id', 'category_name'),
        ['prompt' => 'Select Asset Category'])
     ?>

    <?= $form->field($model, 'asset_amount')->textInput() ?>

    <?= $form->field($model, 'date_bought')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => false, 
            // modify template for custom rendering
            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d',
                'endDate' => "0d"
            ]
    ]);?>

    <?php //$form->field($model, 'created_at')->textInput() 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
