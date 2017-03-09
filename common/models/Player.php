<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "player".
 *
 * @property integer $id
 * @property string $unique_id
 * @property string $name
 * @property integer $position
 * @property integer $birth_date
 * @property integer $gender
 * @property integer $seeding
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AssociationPlayer[] $associationPlayers
 * @property User $updatedBy
 * @property User $createdBy
 * @property SetPoint[] $setPoints
 * @property TeamPlayer[] $teamPlayers
 */
class Player extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'player';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unique_id', 'name'], 'required'],
            [['position', 'birth_date', 'gender', 'seeding', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['unique_id', 'name'], 'string', 'max' => 255],
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
            'position' => Yii::t('app', 'Position'),
            'birth_date' => Yii::t('app', 'Birth Date'),
            'gender' => Yii::t('app', 'Gender'),
            'seeding' => Yii::t('app', 'Seeding'),
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
    public function getAssociationPlayers()
    {
        return $this->hasMany(AssociationPlayer::className(), ['player_id' => 'id']);
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
    public function getSetPoints()
    {
        return $this->hasMany(SetPoint::className(), ['player_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamPlayers()
    {
        return $this->hasMany(TeamPlayer::className(), ['player_id' => 'id']);
    }
}
