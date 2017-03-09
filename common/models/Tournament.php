<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tournament".
 *
 * @property integer $id
 * @property string $unique_id
 * @property string $name
 * @property integer $level
 * @property integer $type
 * @property string $venue
 * @property integer $start_date
 * @property integer $end_date
 * @property integer $reporting_time
 * @property double $fees
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Match[] $matches
 * @property Pool[] $pools
 * @property User $updatedBy
 * @property User $createdBy
 * @property TournamentTeam[] $tournamentTeams
 */
class Tournament extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tournament';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unique_id', 'name'], 'required'],
            [['level', 'type', 'start_date', 'end_date', 'reporting_time', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['fees'], 'number'],
            [['unique_id', 'name', 'venue'], 'string', 'max' => 255],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
            'unique_id' => Yii::t('app', 'Unique ID'),
            'name' => Yii::t('app', 'Name'),
            'level' => Yii::t('app', 'Level'),
            'type' => Yii::t('app', 'Type'),
            'venue' => Yii::t('app', 'Venue'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'reporting_time' => Yii::t('app', 'Reporting Time'),
            'fees' => Yii::t('app', 'Fees'),
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
        return $this->hasMany(Match::className(), ['tournament_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPools()
    {
        return $this->hasMany(Pool::className(), ['tournament_id' => 'id']);
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
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTournamentTeams()
    {
        return $this->hasMany(TournamentTeam::className(), ['tournament_id' => 'id']);
    }
}
