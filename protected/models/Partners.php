<?php

/**
 * This is the model class for table "partners".
 *
 * The followings are the available columns in table 'partners':
 * @property integer $id
 * @property string $url
 * @property string $icon
 */
class Partners extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'partners';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
        return array(
            array('url', 'url', 'message' => 'Некорректный URL'),
            array('url', 'required', 'message' => 'Некорректный URL'),
            array('icon', 'file', 'allowEmpty' => false, 'types' => 'jpg, jpeg, png, gif, ico', 'wrongType' => 'Для иконки можно загрузить только картинку', 'on' => 'insert'),
            array('icon', 'file', 'allowEmpty' => true, 'types' => 'jpg, jpeg, png, gif, ico', 'wrongType' => 'Для иконки можно загрузить только картинку', 'on' => 'update')
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
			'url' => 'Ссылка на страницу партнера',
			'icon' => 'Иконка',
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('icon',$this->icon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Partners the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
