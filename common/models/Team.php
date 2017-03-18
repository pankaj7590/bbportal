<?php

namespace common\models;

use Yii;
use common\components\UidHelper;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "team".
 *
 * @property integer $id
 * @property string $unique_id
 * @property string $name
 * @property integer $association_id
 * @property integer $level
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property PoolTeam[] $poolTeams
 * @property User $updatedBy
 * @property Association $association
 * @property User $createdBy
 * @property TeamPlayer[] $teamPlayers
 * @property TournamentTeam[] $tournamentTeams
 */
class Team extends \yii\db\ActiveRecord
{
	public $uid = 'Team';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['association_id', 'level', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['unique_id', 'name'], 'string', 'max' => 255],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['association_id'], 'exist', 'skipOnError' => true, 'targetClass' => Association::className(), 'targetAttribute' => ['association_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
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
            'unique_id' => Yii::t('app', 'Unique ID'),
            'name' => Yii::t('app', 'Name'),
            'association_id' => Yii::t('app', 'Association ID'),
            'level' => Yii::t('app', 'Level'),
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
    public function getPoolTeams()
    {
        return $this->hasMany(PoolTeam::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssociation()
    {
        return $this->hasOne(Association::className(), ['id' => 'association_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamPlayers()
    {
        return $this->hasMany(TeamPlayer::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTournamentTeams()
    {
        return $this->hasMany(TournamentTeam::className(), ['team_id' => 'id']);
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
