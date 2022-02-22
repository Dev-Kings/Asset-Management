<?php

namespace frontend\controllers;

use frontend\models\Assets;
use backend\models\AssignAsset;
use backend\models\AuthAssignment;
use backend\models\AuthItem;
use frontend\models\AssetsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * AssetsController implements the CRUD actions for Assets model.
 */
class AssetsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Assets models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AssetsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Assets model.
     * @param int $asset_id Asset ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($asset_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($asset_id),
        ]);
    }

    /**
     * Displays Assets assigned to user/staff model.
     * @param int $asset_id Asset ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionShow()
    {
        $asset_id = Yii::$app->user->identity->username;
        $asset_name;
        return $this->render('show', [
            'model' => $this->findModel($asset_id),
        ]);
    }

    /**
     * Creates a new Assets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Assets();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'asset_id' => $model->asset_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Assets model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $asset_id Asset ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($asset_id)
    {
        $model = $this->findModel($asset_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'asset_id' => $model->asset_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Assets model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $asset_id Asset ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($asset_id)
    {
        $this->findModel($asset_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Assets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $asset_id Asset ID
     * @return Assets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($asset_id)
    {
        if (($model = Assets::findOne(['asset_id' => $asset_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
