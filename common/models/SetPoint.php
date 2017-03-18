<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "set_point".
 *
 * @property integer $id
 * @property integer $set_id
 * @property integer $player_id
 * @property integer $tournament_team_id
 * @property integer $number
 * @property integer $type
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $updatedBy
 * @property Player $player
 * @property Set $set
 * @property TournamentTeam $tournamentTeam
 * @property User $createdBy
 */
class SetPoint extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'set_point';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['set_id', 'player_id', 'tournament_team_id'], 'required'],
            [['set_id', 'player_id', 'tournament_team_id', 'number', 'type', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['player_id'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['player_id' => 'id']],
            [['set_id'], 'exist', 'skipOnError' => true, 'targetClass' => Set::className(), 'targetAttribute' => ['set_id' => 'id']],
            [['tournament_team_id'], 'exist', 'skipOnError' => true, 'targetClass' => TournamentTeam::className(), 'targetAttribute' => ['tournament_team_id' => 'id']],
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
            'set_id' => Yii::t('app', 'Set ID'),
            'player_id' => Yii::t('app', 'Player ID'),
            'tournament_team_id' => Yii::t('app', 'Tournament Team ID'),
            'number' => Yii::t('app', 'Number'),
            'type' => Yii::t('app', 'Type'),
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
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlayer()
    {
        return $this->hasOne(Player::className(), ['id' => 'player_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSet()
    {
        return $this->hasOne(Set::className(), ['id' => 'set_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTournamentTeam()
    {
        return $this->hasOne(TournamentTeam::className(), ['id' => 'tournament_team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
