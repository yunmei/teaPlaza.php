<?php

/**
 * This is the model class for table "{{app}}".
 *
 * The followings are the available columns in table '{{app}}':
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @property string $listimage
 * @property string $desc
 * @property string $urlschemes
 * @property string $ituneslink
 * @property string $html
 * @property string $version
 * @property integer $usenum
 */
class App extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return App the static model class
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
		return '{{app}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usenum', 'numerical', 'integerOnly'=>true),
			array('name, icon, listimage, desc, urlschemes, ituneslink, version', 'length', 'max'=>255),
			array('html', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, icon, listimage, desc, urlschemes, ituneslink, html, version, usenum', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'icon' => 'Icon',
			'listimage' => 'Listimage',
			'desc' => 'Desc',
			'urlschemes' => 'Urlschemes',
			'ituneslink' => 'Ituneslink',
			'html' => 'Html',
			'version' => 'Version',
			'usenum' => 'Usenum',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('listimage',$this->listimage,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('urlschemes',$this->urlschemes,true);
		$criteria->compare('ituneslink',$this->ituneslink,true);
		$criteria->compare('html',$this->html,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('usenum',$this->usenum);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}