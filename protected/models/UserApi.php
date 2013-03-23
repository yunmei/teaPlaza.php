<?php

/**
 * This is the model class for table "{{userapi}}".
 *
 * The followings are the available columns in table '{{userapi}}':
 * @property integer $user_id
 * @property integer $state
 * @property integer $request_nums
 * @property string $apikey
 */

class UserApi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UserApi the static model class
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
		return '{{userapi}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, state, request_nums', 'numerical', 'integerOnly'=>true),
			array('apikey', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, apikey, state, request_nums', 'safe', 'on'=>'search'),
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
			'user_id' => 'Id',
			'apikey' => 'apikey',
			'state' => 'state',
			'request_nums' => 'request_nums',
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

		$criteria->compare('user_id',$this->user_id,true);

		$criteria->compare('apikey',$this->apikey,true);
		
		$criteria->compare('state',$this->state,true);

		$criteria->compare('request_nums',$this->request_nums,true);

		return new CActiveDataProvider('UserApi', array(
			'criteria'=>$criteria,
		));
	}

}