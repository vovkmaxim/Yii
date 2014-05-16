<?php

class Successstories extends CActiveRecord
{

	public function tableName()
	{
		return 'successstories';
	}

	public function rules()
	{

		return array(
			array('client, task, solution, result, pic', 'required', 'message'=>'Это поле обязательно для заполнения'),
			array('id, client, task, solution, result, pic', 'safe', 'on'=>'search'),
//            array('pic', 'file', 'types'=>'jpg, gif, png','message'=>'Допустимые форматы: jpg, gif, png'),
		);
	}


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
			'client' => 'Клиент',
			'task' => 'Задача',
			'solution' => 'Решение',
			'result' => 'Результат',
			'pic' => 'Картинка',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('client',$this->client,true);
		$criteria->compare('task',$this->task,true);
		$criteria->compare('solution',$this->solution,true);
		$criteria->compare('result',$this->result,true);
		$criteria->compare('pic',$this->pic);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Successstories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
