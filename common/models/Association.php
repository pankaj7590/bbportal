<?php

namespace common\models;

use Yii;
use common\components\UidHelper;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "association".
 *
 * @property integer $id
 * @property string $unique_id
 * @property string $name
 * @property integer $level
 * @property integer $seeding
 * @property integer $sport
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $updatedBy
 * @property User $createdBy
 * @property AssociationPlayer[] $associationPlayers
 * @property AssociationUser[] $associationUsers
 * @property Team[] $teams
 */
class Association extends \yii\db\ActiveRecord
{
	public $uid = 'ASSOCIATION';
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'association';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['level', 'seeding', 'sport', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['unique_id', 'name'], 'string', 'max' => 255],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
            'level' => Yii::t('app', 'Level'),
            'seeding' => Yii::t('app', 'Seeding'),
            'sport' => Yii::t('app', 'Sport'),
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
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssociationPlayers()
    {
        return $this->hasMany(AssociationPlayer::className(), ['association_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssociationUsers()
    {
        return $this->hasMany(AssociationUser::className(), ['association_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeams()
    {
        return $this->hasMany(Team::className(), ['association_id' => 'id']);
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
