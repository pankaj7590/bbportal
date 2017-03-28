<?php

namespace backend\controllers;

use Yii;
use common\models\Pool;
use common\models\PoolTeam;
use common\models\Tournament;
use common\models\TournamentTeam;
use common\models\TournamentSearch;
use common\models\enums\Status;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * TournamentController implements the CRUD actions for Tournament model.
 */
class TournamentController extends Controller
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
     * Lists all Tournament models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TournamentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tournament model.
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
     * Creates a new Tournament model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tournament();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tournament model.
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
     * Deletes an existing Tournament model.
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
     * Finds the Tournament model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tournament the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tournament::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionGenerateLots($tournament_id){
		$maxTeams = Yii::$app->request->post('max-teams');
		$tournament = $this->findModel($tournament_id);
		/* if($tournament->pools){
			throw new ForbiddenHttpException('Pools already generated.');
		} */
		if($maxTeams){
			// $teams = ['t1','t2','t3','t4','t5','t6','t7','t8','t9','t10','t11','t12','t13','t14','t15'];
			$teams = TournamentTeam::find()->select('id')->where(['tournament_id' => $tournament_id])->asArray()->all();
			if($maxTeams >= count($teams)){
				throw new BadRequestHttpException('Max number of teams cannot be greater than or equal to number of teams.');
			}
			$teamsArr = [];
			foreach($teams as $k => $v){
				$teamsArr[] = $v['id'];
			}
			$tempTeams = $teamsArr;
			$pools = [];
			$max_teams_in_pool = $maxTeams;
			$pool_count = (int)(count($teams)/$max_teams_in_pool);
			for($i = 0; $i < $pool_count; $i++){
				for($j = 0; $j < $max_teams_in_pool; $j++){
					$randomKey = array_rand($tempTeams);
					$pools[$i][] = $tempTeams[$randomKey];
					unset($tempTeams[$randomKey]);
				}
			}
			// echo "<pre>";print_r($pools);exit;
			$remainingTeams = $teamsArr;
			// echo "<pre>";print_r($remainingTeams);exit;
			foreach($pools as $k => $v){
				$remainingTeams = array_diff($remainingTeams,$v);
			}
			if($remainingTeams){
				$pools[] = $remainingTeams;
			}
			foreach($pools as $k => $v){
				$pool = new Pool();
				$pool->tournament_id = $tournament->id;
				$pool->name = 'pool'.($k+1);
				if($pool->save()){
					foreach($v as $ptk => $ptv){
						$poolTeam = new PoolTeam();
						$poolTeam->pool_id = $pool->id;
						$poolTeam->team_id = $ptv;
						$poolTeam->save();
					}
				}
			}
			return $this->redirect(['change-lots', 'id' => $tournament->id]);
		}
		return $this->render('generate-lots', [
			'tournament' => $tournament,
		]);
	}
	
	public function actionChangeLots($tournament_id){
		$tournament = $this->findModel($tournament_id);
		if(!$tournament->pools){
			throw new ForbiddenHttpException('Generate pools first.');
		}
		return $this->render('change_lots', [
			'tournament' => $tournament,
			'pools' => $tournament->pools,
		]);
	}
	
	public function actionUpdateLots(){
		$tournament = Yii::$app->request->post('tournament');
		$pool = Yii::$app->request->post('pool');
		$team = Yii::$app->request->post('team');
		$pool_team = Yii::$app->request->post('pool_team');
		if(!$tournament){
			throw new BadRequestHttpException('Tournament id cannot be blank.');
		}
		if(!$pool){
			throw new BadRequestHttpException('Pool id cannot be blank.');
		}
		if(!$team){
			throw new BadRequestHttpException('Team id cannot be blank.');
		}
		if(!$pool_team){
			throw new BadRequestHttpException('Pool team id cannot be blank.');
		}
		$poolTeam = PoolTeam::findOne($pool_team);
		if(!$pool_team){
			throw new NotFoundHttpException('Team not found in the pool.');
		}
		$tournamentPool = Pool::findOne(['tournament_id' => $tournament, 'id' => $pool]);
		if(!$tournamentPool){
			throw new NotFoundHttpException('Pool not found in the tournament.');
		}
		$poolTeam->updateAttributes(['pool_id' => $pool]);
		return true;
	}
}
