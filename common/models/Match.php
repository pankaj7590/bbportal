<?php

namespace common\models;

use Yii;
use common\components\UidHelper;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "match".
 *
 * @property integer $id
 * @property string $unique_id
 * @property integer $round
 * @property integer $tournament_id
 * @property integer $pool_id
 * @property integer $first_team_id
 * @property integer $second_team_id
 * @property integer $toss_winning_team_id
 * @property integer $choice
 * @property string $refree_name
 * @property string $scorer_name
 * @property integer $winning_team_id
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property TournamentTeam $winningTeam
 * @property Pool $pool
 * @property Tournament $tournament
 * @property TournamentTeam $firstTeam
 * @property TournamentTeam $secondTeam
 * @property TournamentTeam $tossWinningTeam
 * @property Set[] $sets
 */
class Match extends \yii\db\ActiveRecord
{
	public $uid = 'MATCH';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'match';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['round', 'tournament_id', 'pool_id', 'first_team_id', 'second_team_id'], 'unique', 'targetAttribute' => ['round', 'tournament_id', 'pool_id', 'first_team_id', 'second_team_id']],
            [['round', 'tournament_id', 'pool_id', 'first_team_id', 'second_team_id', 'toss_winning_team_id', 'choice', 'winning_team_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['round', 'tournament_id', 'pool_id', 'first_team_id', 'second_team_id'], 'required'],
            [['unique_id', 'refree_name', 'scorer_name'], 'string', 'max' => 255],
            [['winning_team_id'], 'exist', 'skipOnError' => true, 'targetClass' => TournamentTeam::className(), 'targetAttribute' => ['winning_team_id' => 'id']],
            [['pool_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pool::className(), 'targetAttribute' => ['pool_id' => 'id']],
            [['tournament_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tournament::className(), 'targetAttribute' => ['tournament_id' => 'id']],
            [['first_team_id'], 'exist', 'skipOnError' => true, 'targetClass' => TournamentTeam::className(), 'targetAttribute' => ['first_team_id' => 'id']],
            [['second_team_id'], 'exist', 'skipOnError' => true, 'targetClass' => TournamentTeam::className(), 'targetAttribute' => ['second_team_id' => 'id']],
            [['toss_winning_team_id'], 'exist', 'skipOnError' => true, 'targetClass' => TournamentTeam::className(), 'targetAttribute' => ['toss_winning_team_id' => 'id']],
        ];
    }
	
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
			BlameableBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'unique_id' => Yii::t('app', 'Unique Id'),
            'round' => Yii::t('app', 'Round'),
            'tournament_id' => Yii::t('app', 'Tournament'),
            'pool_id' => Yii::t('app', 'Pool'),
            'first_team_id' => Yii::t('app', 'First Team'),
            'second_team_id' => Yii::t('app', 'Second Team'),
            'toss_winning_team_id' => Yii::t('app', 'Toss Winning Team'),
            'choice' => Yii::t('app', 'Choice'),
            'refree_name' => Yii::t('app', 'Refree Name'),
            'scorer_name' => Yii::t('app', 'Scorer Name'),
            'winning_team_id' => Yii::t('app', 'Winning Team'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWinningTeam()
    {
        return $this->hasOne(TournamentTeam::className(), ['id' => 'winning_team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPool()
    {
        return $this->hasOne(Pool::className(), ['id' => 'pool_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTournament()
    {
        return $this->hasOne(Tournament::className(), ['id' => 'tournament_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirstTeam()
    {
        return $this->hasOne(TournamentTeam::className(), ['id' => 'first_team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecondTeam()
    {
        return $this->hasOne(TournamentTeam::className(), ['id' => 'second_team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTossWinningTeam()
    {
        return $this->hasOne(TournamentTeam::className(), ['id' => 'toss_winning_team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSets()
    {
        return $this->hasMany(Set::className(), ['match_id' => 'id']);
    }
	
	public function getCreatedBy(){
		return $this->hasOne(User::className(), ['id' => 'created_by']);
	}
	
	public function getUpdatedBy(){
		return $this->hasOne(User::className(), ['id' => 'updated_by']);
	}
	
	public function beforeSave($insert){
		if (parent::beforeSave($insert)) {
			if(!$this->unique_id){
				$uid = UidHelper::generate(6);
				$temp = $this->uid.$uid;
				while(self::findOne(['unique_id' => $temp])){
					$temp = UidHelper::generate(6);
				}
				$this->updateAttributes(['unique_id' => $temp]);
			}
			return true;
		}
		return false;
	}
}
