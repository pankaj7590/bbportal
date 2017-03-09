<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tournament_team".
 *
 * @property integer $id
 * @property integer $tournament_id
 * @property integer $team_id
 * @property integer $fees_paid
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Match[] $matches
 * @property Match[] $matches0
 * @property Match[] $matches1
 * @property Match[] $matches2
 * @property Set[] $sets
 * @property SetPoint[] $setPoints
 * @property Team $team
 * @property Tournament $tournament
 */
class TournamentTeam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tournament_team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tournament_id', 'team_id'], 'required'],
            [['tournament_id', 'team_id', 'fees_paid', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['team_id' => 'id']],
            [['tournament_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tournament::className(), 'targetAttribute' => ['tournament_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tournament_id' => Yii::t('app', 'Tournament ID'),
            'team_id' => Yii::t('app', 'Team ID'),
            'fees_paid' => Yii::t('app', 'Fees Paid'),
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
    public function getMatches()
    {
        return $this->hasMany(Match::className(), ['winning_team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatches0()
    {
        return $this->hasMany(Match::className(), ['first_team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatches1()
    {
        return $this->hasMany(Match::className(), ['second_team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatches2()
    {
        return $this->hasMany(Match::className(), ['toss_winning_team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSets()
    {
        return $this->hasMany(Set::className(), ['winning_team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSetPoints()
    {
        return $this->hasMany(SetPoint::className(), ['tournament_team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTournament()
    {
        return $this->hasOne(Tournament::className(), ['id' => 'tournament_id']);
    }
}
