<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'first_name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'last_name')->textInput() ?>

                <?= $form->field($model, 'username')->textInput() ?>

                <?= $form->field($model, 'email') ?>

                <?php 
                $authItems = ArrayHelper::map($authItems, 'name', 'name');
                ?>
                <?= $form->field($model, 'permissions')->checkboxList($authItems); ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
