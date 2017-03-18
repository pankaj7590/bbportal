<?php

namespace backend\controllers;

use Yii;
use common\models\Association;
use common\models\Player;
use common\models\AssociationPlayer;
use common\models\AssociationPlayerSearch;
use common\models\enums\Status;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssociationPlayerController implements the CRUD actions for AssociationPlayer model.
 */
class AssociationPlayerController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AssociationPlayer models.
     * @return mixed
     */
    public function actionIndex($association_id)
    {
		$association = $this->findAssociaction($association_id);
        $searchModel = new AssociationPlayerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $association_id);

        return $this->render('index', [
			'association' => $association,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AssociationPlayer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AssociationPlayer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($association_id)
    {
		$association = $this->findAssociaction($association_id);
        $model = new AssociationPlayer();
		$associations = Association::findAll(['status' => Status::ACTIVE]);
		$players = Player::findAll(['status' => Status::ACTIVE]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			// echo "<pre>";print_r($model);exit;
			foreach($model->player_id as $k => $v){
				$assocPlayer = new AssociationPlayer();
				$assocPlayer->association_id = $model->association_id;
				$assocPlayer->player_id = $v;
				$assocPlayer->save();
			}
            return $this->redirect(['index', 'association_id' => $association_id]);
        } else {
            return $this->render('create', [
				'association' => $association,
				'associations' => $associations,
				'players' => $players,
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AssociationPlayer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AssociationPlayer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		$model = $this->findModel($id);
		$model->updateAttributes(['status' => Status::DELETED]);
        return $this->redirect(['index']);
    }

    /**
     * Finds the AssociationPlayer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssociationPlayer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssociationPlayer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
    protected function findAssociaction($id)
    {
        if (($model = Association::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
