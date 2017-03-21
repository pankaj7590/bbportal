<?php

namespace backend\controllers;

use Yii;
use common\models\Tournament;
use common\models\Match;
use common\models\MatchSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * MatchController implements the CRUD actions for Match model.
 */
class MatchController extends Controller
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
     * Lists all Match models.
     * @return mixed
     */
    public function actionIndex($tournament_id)
    {
		$tournament = $this->findTournament($tournament_id);
        $searchModel = new MatchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $tournament_id);

        return $this->render('index', [
			'tournament' => $tournament,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Match model.
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
     * Creates a new Match model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($tournament_id)
    {
		$tournament = $this->findTournament($tournament_id);
        $model = new Match();

		$model->tournament_id = $tournament->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'tournament' => $tournament,
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Match model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$tournament = $this->findTournament($model->tournament_id);

		$model->tournament_id = $tournament->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
			$pool_teams_arr = [];
			foreach($model->pool->poolTeams as $k => $v){
				$pool_teams_arr[] = $v->team;
			}
            return $this->render('update', [
                'tournament' => $tournament,
                'model' => $model,
				'pool_teams' => $pool_teams_arr,
				'selected_pool_teams' => [
					[
						'id' => $model->first_team_id,
						'name' => $model->firstTeam->team->name,
					],
					[
						'id' => $model->second_team_id,
						'name' => $model->secondTeam->team->name,
					]
				],
            ]);
        }
    }

    /**
     * Deletes an existing Match model.
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
	
	public function actionScoresheet($id){
		$model = $this->findModel($id);
		$content = $this->renderPartial('_scoresheet');
		$pdf = Yii::$app->pdf;
		$pdf->content = $content;
		$pdf->marginTop = 10;
		$pdf->marginBottom = 10;
		$pdf->marginLeft = 10;
		$pdf->marginRight = 10;
		$pdf->filename = $model->firstTeam->team->name.' vs '.$model->secondTeam->team->name;
		return $pdf->render();
	}

    /**
     * Finds the Match model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Match the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Match::findOne($id)) !== null) {
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
