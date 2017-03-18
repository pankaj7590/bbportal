<?php

namespace backend\controllers;

use Yii;
use common\models\Team;
use common\models\Player;
use common\models\TeamPlayer;
use common\models\TeamPlayerSearch;
use common\models\enums\Status;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TeamPlayerController implements the CRUD actions for TeamPlayer model.
 */
class TeamPlayerController extends Controller
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
     * Lists all TeamPlayer models.
     * @return mixed
     */
    public function actionIndex($team_id)
    {
		$team = $this->findTeam($team_id);
        $searchModel = new TeamPlayerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$team_id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'team' => $team,
        ]);
    }

    /**
     * Displays a single TeamPlayer model.
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
     * Creates a new TeamPlayer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TeamPlayer();
		$teams = Team::findAll(['status' => Status::ACTIVE]);
		$players = Player::findAll(['status' => Status::ACTIVE]);

        if ($model->load(Yii::$app->request->post())) {
			foreach($model->player_id as $k => $v){
				$teamPlayer = new TeamPlayer();
				$teamPlayer->team_id = $model->team_id;
				$teamPlayer->player_id = $v;
				$teamPlayer->save();
			}
            return $this->redirect(['index', 'team_id' => $model->team_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'teams' => $teams,
                'players' => $players,
            ]);
        }
    }

    /**
     * Updates an existing TeamPlayer model.
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
     * Deletes an existing TeamPlayer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		$model = $this->findModel($id);
		$model->updateAttributes(['status' => Status::DELETED]);
        return $this->redirect(['index', 'team_id' => $model->team_id]);
    }

    /**
     * Finds the TeamPlayer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TeamPlayer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TeamPlayer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
    protected function findTeam($id)
    {
        if (($model = Team::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
