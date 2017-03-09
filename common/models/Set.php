<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "set".
 *
 * @property integer $id
 * @property string $uniqueid
 * @property integer $match_id
 * @property integer $number
 * @property integer $first_team_points
 * @property integer $second_team_points
 * @property integer $winning_team_id
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $updatedBy
 * @property Match $match
 * @property TournamentTeam $winningTeam
 * @property User $createdBy
 * @property SetPoint[] $setPoints
 */
class Set extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'set';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['match_id'], 'required'],
            [['match_id', 'number', 'first_team_points', 'second_team_points', 'winning_team_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['uniqueid'], 'string', 'max' => 255],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['match_id'], 'exist', 'skipOnError' => true, 'targetClass' => Match::className(), 'targetAttribute' => ['match_id' => 'id']],
            [['winning_team_id'], 'exist', 'skipOnError' => true, 'targetClass' => TournamentTeam::className(), 'targetAttribute' => ['winning_team_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uniqueid' => Yii::t('app', 'Uniqueid'),
            'match_id' => Yii::t('app', 'Match ID'),
            'number' => Yii::t('app', 'Number'),
            'first_team_points' => Yii::t('app', 'First Team Points'),
            'second_team_points' => Yii::t('app', 'Second Team Points'),
            'winning_team_id' => Yii::t('app', 'Winning Team ID'),
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
    public function getMatch()
    {
        return $this->hasOne(Match::className(), ['id' => 'match_id']);
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
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSetPoints()
    {
        return $this->hasMany(SetPoint::className(), ['set_id' => 'id']);
    }
}
