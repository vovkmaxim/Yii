<?php

class Contactdata extends CActiveRecord
{

	public function tableName()
	{
		return 'contactdata';
	}

	public function rules()
	{

		return array(
			array('general, jobs, partnership, phone, adress', 'required', 'message'=>'Это поле обязательно для заполнения'),
			array('general, jobs, partnership', 'length', 'max'=>255),
			array('phone', 'length', 'max'=>50),
			array('id, general, jobs, partnership, phone, adress', 'safe', 'on'=>'search'),
            array('general, jobs, partnership', 'email','message'=>'Некорректный E-mail адресс'),
            array('phone', 'numerical', 'integerOnly'=>true,'message'=>'Некорректный номер телефона'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'general' => 'General',
			'jobs' => 'Jobs',
			'partnership' => 'Partnership',
			'phone' => 'Phone',
			'adress' => 'Adress',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('general',$this->general,true);
		$criteria->compare('jobs',$this->jobs,true);
		$criteria->compare('partnership',$this->partnership,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('adress',$this->adress,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    protected function beforeValidate()
    {
        $this->general = trim($this->general);
        $this->jobs = trim($this->jobs);
        $this->partnership = trim($this->partnership);
        $this->phone = trim($this->phone);
        $this->adress = trim($this->adress);
        return parent::beforeValidate();
    }
}
