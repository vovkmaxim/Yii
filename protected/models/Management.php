<?php

/**
 * This is the model class for table "management".
 *
 * The followings are the available columns in table 'management':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $img
 * @property string $email
 * @property integer $position
 */
class Management extends CActiveRecord
{
    public $img;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'management';
	}

	/**
	 * @return array validation rules for model attributes.
	 */

    public function picSize($attribute,$params) {


    }

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, email', 'required'),
            array('email', 'email','message' => 'Email не является правильным Email адресом.',),
			array('position', 'numerical', 'integerOnly'=>true),
			array('title, img, email', 'length', 'max'=>255),
            array('img', 'file', 'allowEmpty' => true, 'types' => 'jpg, jpeg, png, gif, bmp', 'on' => 'insert'),
            array('img', 'file', 'allowEmpty' => true, 'types' => 'jpg, jpeg, png, gif, bmp', 'on' => 'update'),
			array('id, title, description, img, email, position', 'safe'),
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
			'title' => 'Title',
			'description' => 'Description',
			'img' => 'Picture',
			'email' => 'Email',
			'position' => 'Position',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('position',$this->position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Management the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
