<?php

namespace backend\controllers;

use Yii;
use common\models\Tournament;
use common\models\Team;
use common\models\TournamentTeam;
use common\models\TournamentTeamSearch;
use common\models\enums\Status;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TournamentTeamController implements the CRUD actions for TournamentTeam model.
 */
class TournamentTeamController extends Controller
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
     * Lists all TournamentTeam models.
     * @return mixed
     */
    public function actionIndex($tournament_id)
    {
		$tournament = $this->findTournament($tournament_id);
        $searchModel = new TournamentTeamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $tournament_id);

        return $this->render('index', [
			'tournament' => $tournament,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TournamentTeam model.
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
     * Creates a new TournamentTeam model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($tournament_id)
    {
		$tournament = $this->findTournament($tournament_id);
        $model = new TournamentTeam();
		$tournaments = Tournament::findAll(['status' => Status::ACTIVE]);
		$teams = Team::findAll(['status' => Status::ACTIVE]);

        if ($model->load(Yii::$app->request->post())) {
			foreach($model->team_id as $k => $v){
				$tourTeam = new TournamentTeam();
				$tourTeam->tournament_id = $model->tournament_id;
				$tourTeam->team_id = $v;
				$tourTeam->fees_paid = $model->fees_paid;
				$tourTeam->save();
			}
            return $this->redirect(['index', 'tournament_id' => $model->tournament_id]);
        } else {
            return $this->render('create', [
				'tournament' => $tournament,
				'tournaments' => $tournaments,
				'teams' => $teams,
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TournamentTeam model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		$tournaments = Tournament::findAll(['status' => Status::ACTIVE]);
		$teams = Team::findAll(['status' => Status::ACTIVE]);
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
				'tournaments' => $tournaments,
				'teams' => $teams,
            ]);
        }
    }

    /**
     * Deletes an existing TournamentTeam model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TournamentTeam model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TournamentTeam the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TournamentTeam::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
    protected function findTournament($id)
    {
        if (($model = Tournament::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
