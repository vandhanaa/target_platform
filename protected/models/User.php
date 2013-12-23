<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $ID
 * @property string $PASSWORD
 * @property string $EMAIL
 * @property string $FIRST_NAME
 * @property string $LAST_NAME
 * @property string $ROLE
 * @property string $DOMAIN
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PASSWORD, EMAIL, FIRST_NAME, LAST_NAME, ROLE, DOMAIN', 'required'),
			array('PASSWORD', 'length', 'max'=>40),
			array('EMAIL, DOMAIN', 'length', 'max'=>200),
			array('EMAIL', 'email'),
			array('FIRST_NAME, LAST_NAME, ROLE', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('EMAIL, FIRST_NAME, LAST_NAME, ROLE, DOMAIN', 'safe', 'on'=>'search'),
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
			'ID' => 'ID',
			'PASSWORD' => 'Password',
			'EMAIL' => 'Email',
			'FIRST_NAME' => 'First Name',
			'LAST_NAME' => 'Last Name',
			'ROLE' => 'Role',
			'DOMAIN' => 'Domain',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('FIRST_NAME',$this->FIRST_NAME,true);
		$criteria->compare('LAST_NAME',$this->LAST_NAME,true);
		$criteria->compare('ROLE',$this->ROLE,true);
		$criteria->compare('DOMAIN',$this->DOMAIN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave() 
	{
		if(!empty($this->PASSWORD)) 
		{
			$salt = openssl_random_pseudo_bytes(22);
			$salt = '$2a$%12$'.strtr($salt, array('_' => '.', '~' => '/'));
			$newPassword = crypt($this->PASSWORD, $salt);
			$this->PASSWORD = $newPassword;
		}
		return true;
	}
}
