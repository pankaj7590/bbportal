<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $mobile
 * @property string $designation
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 *
* @property Association[] $associations
* @property Association[] $associations0
* @property AssociationPlayer[] $associationPlayers
* @property AssociationPlayer[] $associationPlayers0
* @property AssociationUser[] $associationUsers
* @property AssociationUser[] $associationUsers0
* @property AssociationUser[] $associationUsers1
* @property Player[] $players
* @property Player[] $players0
* @property Pool[] $pools
* @property Pool[] $pools0
* @property Set[] $sets
* @property Set[] $sets0
* @property SetPoint[] $setPoints
* @property SetPoint[] $setPoints0
* @property Team[] $teams
* @property Team[] $teams0
* @property TeamPlayer[] $teamPlayers
* @property TeamPlayer[] $teamPlayers0
* @property TeamPlayer[] $teamPlayers1
* @property TeamPlayer[] $teamPlayers2
* @property TeamPlayer[] $teamPlayers3
* @property TeamPlayer[] $teamPlayers4
* @property TeamPlayer[] $teamPlayers5
* @property TeamPlayer[] $teamPlayers6
* @property Tournament[] $tournaments
* @property Tournament[] $tournaments0
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['username', 'auth_key', 'password_hash', 'email'], 'required'],
			[['status', 'created_at', 'updated_at'], 'integer'],
			[['username', 'password_hash', 'password_reset_token', 'email', 'mobile', 'designation'], 'string', 'max' => 255],
			[['auth_key'], 'string', 'max' => 32],
			[['username'], 'unique'],
			[['email'], 'unique'],
			[['password_reset_token'], 'unique'],
			[['mobile'], 'unique'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }
	
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app', 'ID'),
			'username' => Yii::t('app', 'Username'),
			'auth_key' => Yii::t('app', 'Auth Key'),
			'password_hash' => Yii::t('app', 'Password Hash'),
			'password_reset_token' => Yii::t('app', 'Password Reset Token'),
			'email' => Yii::t('app', 'Email'),
			'mobile' => Yii::t('app', 'Mobile'),
			'designation' => Yii::t('app', 'Designation'),
			'status' => Yii::t('app', 'Status'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
		];
	}

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

	/**	
	* @return \yii\db\ActiveQuery
    */
	public function getAssociations()
	{
		return $this->hasMany(Association::className(), ['updated_by' => 'id']);
	}
	/**
    * @return \yii\db\ActiveQuery
    */
	public function getAssociations0()
	{
		return $this->hasMany(Association::className(), ['created_by' => 'id']);
	}
	/**
    * @return \yii\db\ActiveQuery
    */
	public function getAssociationPlayers()
	{
		return $this->hasMany(AssociationPlayer::className(), ['updated_by' => 'id']);
	}
	/**
    * @return \yii\db\ActiveQuery
    */
	public function getAssociationPlayers0()
	{
		return $this->hasMany(AssociationPlayer::className(), ['created_by' => 'id']);
	}
	/**
    * @return \yii\db\ActiveQuery
    */
	public function getAssociationUsers()
	{
		return $this->hasMany(AssociationUser::className(), ['updated_by' => 'id']);
	}
	/**
    * @return \yii\db\ActiveQuery
	*/
	public function getAssociationUsers0()
	{
		return $this->hasMany(AssociationUser::className(), ['user_id' => 'id']);
	}
	/**
    * @return \yii\db\ActiveQuery
    */
	public function getAssociationUsers1()
	{
		return $this->hasMany(AssociationUser::className(), ['created_by' => 'id']);
	}
	/**
    * @return \yii\db\ActiveQuery
    */
	public function getPlayers()
	{
		return $this->hasMany(Player::className(), ['created_by' => 'id']);
	}
	/**
    * @return \yii\db\ActiveQuery
    */
	public function getPools()
	{
		return $this->hasMany(Pool::className(), ['created_by' => 'id']);
	}
	/**
    * @return \yii\db\ActiveQuery
    */
	public function getSets()
	{
		return $this->hasMany(Set::className(), ['created_by' => 'id']);
	}
	/**
    * @return \yii\db\ActiveQuery
    */
	public function getSetPoints()
	{
		return $this->hasMany(SetPoint::className(), ['created_by' => 'id']);
	}
	/**
    * @return \yii\db\ActiveQuery
    */
	public function getTeams()
	{
		return $this->hasMany(Team::className(), ['updated_by' => 'id']);
	}
	/**
    * @return \yii\db\ActiveQuery
    */
	public function getTeamPlayers()
	{
		return $this->hasMany(TeamPlayer::className(), ['created_by' => 'id']);
	}
	/**
    * @return \yii\db\ActiveQuery
    */
	public function getTournaments()
	{
		return $this->hasMany(Tournament::className(), ['updated_by' => 'id']);
	}
	/**
    * @return \yii\db\ActiveQuery
    */
	public function getTournaments0()
	{
		return $this->hasMany(Tournament::className(), ['created_by' => 'id']);
	}
	
	public function getMedia(){
		return this->hasMany(Media::className(), ['created_by' => 'id']);
	}
}
