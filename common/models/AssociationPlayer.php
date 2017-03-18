<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "association_player".
 *
 * @property integer $id
 * @property integer $association_id
 * @property integer $player_id
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $updatedBy
 * @property Association $association
 * @property Player $player
 * @property User $createdBy
 */
class AssociationPlayer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'association_player';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['association_id', 'player_id'], 'required'],
            [['association_id', 'player_id'], 'unique', 'targetAttribute' => ['association_id', 'player_id']],
            [['association_id', 'player_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['association_id'], 'exist', 'skipOnError' => true, 'targetClass' => Association::className(), 'targetAttribute' => ['association_id' => 'id']],
            [['player_id'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['player_id' => 'id']],
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
            'association_id' => Yii::t('app', 'Association'),
            'player_id' => Yii::t('app', 'Player'),
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
    public function getAssociation()
    {
        return $this->hasOne(Association::className(), ['id' => 'association_id']);
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
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
