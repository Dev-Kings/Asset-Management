<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssignAsset */

$this->title = 'Create Assign Asset';
$this->params['breadcrumbs'][] = ['label' => 'Assign Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-asset-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
