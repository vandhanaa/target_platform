<?php

/**
 * This is the model class for table "application_summary".
 *
 * The followings are the available columns in table 'application_summary':
 * @property integer $ID
 * @property string $NAR_ID
 * @property string $DOMAIN
 * @property string $INSTANCE_NAME
 * @property string $REPORTING_UNIT
 * @property string $PRIMARILY_AFFECTED_BIZ_AREA
 * @property string $INSTANCE_INVESTMENT_STRATEGY
 * @property string $APP_CRITICALITY_CLASS
 * @property string $INSTANCE_DESCRIPTION
 * @property integer $RTB_EXTERNAL
 * @property integer $RTB_INTERNAL
 * @property integer $RTB_LICENSE
 * @property integer $CTB_EXTERNAL
 * @property integer $CTB_INTERNAL
 * @property integer $CTB_LICENSE
 */
class ApplicationSummary extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'application_summary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('NAR_ID, DOMAIN, INSTANCE_NAME, REPORTING_UNIT, PRIMARILY_AFFECTED_BIZ_AREA, INSTANCE_INVESTMENT_STRATEGY, APP_CRITICALITY_CLASS, INSTANCE_DESCRIPTION, RTB_EXTERNAL, RTB_INTERNAL, RTB_LICENSE, CTB_EXTERNAL, CTB_INTERNAL, CTB_LICENSE', 'required'),
			array('NAR_ID', 'required'),
			//array('RTB_EXTERNAL, RTB_INTERNAL, RTB_LICENSE, CTB_EXTERNAL, CTB_INTERNAL, CTB_LICENSE', 'numerical', 'integerOnly'=>true),
			// array('NAR_ID', 'length', 'max'=>20),
			// array('DOMAIN', 'length', 'max'=>200),
			// array('INSTANCE_NAME', 'length', 'max'=>2000),
			// array('REPORTING_UNIT, INSTANCE_INVESTMENT_STRATEGY', 'length', 'max'=>40),
			// array('PRIMARILY_AFFECTED_BIZ_AREA', 'length', 'max'=>300),
			// array('APP_CRITICALITY_CLASS', 'length', 'max'=>30),
			// array('INSTANCE_DESCRIPTION', 'length', 'max'=>4000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, NAR_ID', 'safe', 'on'=>'search'),
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
			'NAR_ID' => 'Nar ID',
			'DOMAIN' => 'Domain',
			'INSTANCE_NAME' => 'Instance Name',
			'REPORTING_UNIT' => 'Reporting Unit',
			'PRIMARILY_AFFECTED_BIZ_AREA' => 'Primarily Affected Biz Area',
			'INSTANCE_INVESTMENT_STRATEGY' => 'Instance Investment Strategy',
			'APP_CRITICALITY_CLASS' => 'App Criticality Class',
			'INSTANCE_DESCRIPTION' => 'Instance Description',
			'RTB_EXTERNAL' => 'Rtb External',
			'RTB_INTERNAL' => 'Rtb Internal',
			'RTB_LICENSE' => 'Rtb License',
			'CTB_EXTERNAL' => 'Ctb External',
			'CTB_INTERNAL' => 'Ctb Internal',
			'CTB_LICENSE' => 'Ctb License',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('NAR_ID',$this->NAR_ID,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ApplicationSummary the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
