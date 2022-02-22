<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

<div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">iAsset</h1>

        <p class="lead">Elite Asset System</p>
    </div>

    <div class="body-content text-center">
        
        <?php
        if(Yii::$app->user->isGuest){
        //return $this->redirect(Yii::$app->user->loginUrl);
        echo "Welcome to iAsset";
        }
        else{
            echo "Welcome ".Yii::$app->user->identity->username;
        }
        ?>
    </div>
</div>
