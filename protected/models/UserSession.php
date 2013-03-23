<?php

/**
 * This is the model class for table "{{usersession}}".
 *
 * The followings are the available columns in table '{{usersession}}':
 * @property integer $id
 * @property integer $user_id
 * @property string $session
 * @property integer $active_time
 * @property string $active_ip
 * @property string $active_sign
 */

class UserSession extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UserSession the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{usersession}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, active_time', 'numerical', 'integerOnly'=>true),
			array('active_sign', 'length', 'max'=>50),
			array('session', 'length', 'max'=>32),
			array('active_ip', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, active_time, active_sign, session, active_ip', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'user_id' => 'user_id',
			'active_time' => 'active_time',
			'active_sign' => 'active_sign',
			'session' => 'session',
			'active_ip' => 'active_ip',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('user_id',$this->user_id,true);

		$criteria->compare('active_time',$this->active_time,true);

		$criteria->compare('active_sign',$this->active_sign,true);

		$criteria->compare('session',$this->session);

		$criteria->compare('active_ip',$this->active_ip,true);

		return new CActiveDataProvider('UserSession', array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave()
	{
		parent::beforeSave();
		if ($this->isNewRecord && $this->user_id) {
			$criteria = new CDbCriteria();
			$criteria->addColumnCondition(array('user_id'=>$this->user_id));
			self::model()->deleteAll($criteria);
		}
		return true;
	}

	public static function getActiveSign()
	{
		return md5($_SERVER['HTTP_USER_AGENT']) . substr($_SERVER['HTTP_USER_AGENT'], 0, 18);
	}
	
	public static function checkSid($sid)
	{
		$criteria = new CDbCriteria();
		$criteria->addColumnCondition(array('session'=>$sid));
		$userSession = self::model()->find($criteria);
		if(null === $userSession || $userSession->active_ip!=GlobalTools::getClientIp() ||
		$userSession->active_time < time() || $userSession->active_sign != self::getActiveSign()) {
			return false;
		} else {
			return $userSession;
		}
	}
}