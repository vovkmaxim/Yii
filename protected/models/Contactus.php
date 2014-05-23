<?php

/**
 * This is the model class for table "contactus".
 *
 * The followings are the available columns in table 'contactus':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $body
 * @property string $date
 */
class Contactus extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contactus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{

		return array(
			array('name, email, subject, body', 'required','message'=>''),
			array('name, email, subject', 'length', 'max'=>255),
			array('id, name, email, subject, body, date', 'safe', 'on'=>'search'),
            array('email', 'email','message'=>'Некорректный E-mail адресс'),

        );
	}

	public function relations()
	{
		return array();
	}

	public function attributeLabels()
	{
		return array(
			'id' => '№',
			'name' => 'Your Name',
			'email' => 'Email',
			'subject' => 'Subject',
			'body' => 'Message',
			'date' => 'Created',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('date',$this->date,true);

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
        $this->name = trim($this->name);
        $this->email = trim($this->email);
        $this->subject = trim($this->subject);
        $this->body = trim($this->body);
        return parent::beforeValidate();
    }

    protected function beforeSave()
    {
        $this->date = new CDbExpression('NOW()');
        return parent::beforeSave();
    }
}
