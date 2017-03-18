<?php

namespace backend\controllers;

use Yii;
use common\models\Association;
use common\models\User;
use common\models\AssociationUser;
use common\models\AssociationUserSearch;
use common\models\enums\Status;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssociationUserController implements the CRUD actions for AssociationUser model.
 */
class AssociationUserController extends Controller
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
     * Lists all AssociationUser models.
     * @return mixed
     */
    public function actionIndex($association_id)
    {
		$association = $this->findAssociaction($association_id);
        $searchModel = new AssociationUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $association_id);

        return $this->render('index', [
			'association' => $association,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AssociationUser model.
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
     * Creates a new AssociationUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($association_id)
    {
		$association = $this->findAssociaction($association_id);
        $model = new AssociationUser();
		$associations = Association::findAll(['status' => Status::ACTIVE]);
		$users = User::find()->where(['status' => Status::ACTIVE])
					->join('LEFT JOIN','auth_assignment','auth_assignment.user_id = id')
					->where(['<>', 'auth_assignment.item_name', 'Super Admin'])
					->all();

        if ($model->load(Yii::$app->request->post())){
			// echo "<pre>";print_r($model);exit;
			foreach($model->user_id as $k => $v){
				$assocUser = new AssociationUser();
				$assocUser->association_id = $model->association_id;
				$assocUser->user_id = $v;
				$assocUser->save();
			}
            return $this->redirect(['index', 'association_id' => $association_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'association' => $association,
                'associations' => $associations,
                'users' => $users,
            ]);
        }
    }

    /**
     * Updates an existing AssociationUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$associations = Association::findAll(['status' => Status::ACTIVE]);
		$users = User::find()->where(['status' => Status::ACTIVE])
					->join('LEFT JOIN','auth_assignment','auth_assignment.user_id = id')
					->where(['<>', 'auth_assignment.item_name', 'Super Admin'])
					->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'associations' => $associations,
                'users' => $users,
            ]);
        }
    }

    /**
     * Deletes an existing AssociationUser model.
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
     * Finds the AssociationUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssociationUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssociationUser::findOne($id)) !== null) {
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
