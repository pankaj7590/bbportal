<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "pool_team".
 *
 * @property integer $id
 * @property integer $pool_id
 * @property integer $team_id
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Team $team
 * @property Pool $pool
 */
class PoolTeam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pool_team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pool_id', 'team_id'], 'required'],
            [['pool_id', 'team_id'], 'unique', 'targetAttribute' => ['pool_id', 'team_id']],
            [['pool_id', 'team_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['team_id' => 'id']],
            [['pool_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pool::className(), 'targetAttribute' => ['pool_id' => 'id']],
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
            'pool_id' => Yii::t('app', 'Pool ID'),
            'team_id' => Yii::t('app', 'Team ID'),
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
    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPool()
    {
        return $this->hasOne(Pool::className(), ['id' => 'pool_id']);
    }
}
