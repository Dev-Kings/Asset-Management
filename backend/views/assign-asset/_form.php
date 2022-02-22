<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Assets;
use backend\models\User;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\models\AssignAsset */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assign-asset-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'asset_id')->dropDownList(
        ArrayHelper::map(Assets::find()->all(), 'asset_id', 'asset_name'),
        ['prompt' => 'Select Asset Name'])
     ?>

    <?= $form->field($model, 'asset_category')->dropDownList(
        ArrayHelper::map(Category::find()->all(), 'category_id', 'category_name'),
        ['prompt' => 'Select Asset Category'])
     ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(User::find()->all(), 'id', 'username'),
        ['prompt' => 'Select User'])
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
