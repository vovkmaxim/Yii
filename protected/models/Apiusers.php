<?php

/**
 * This is the model class for table "apiusers".
 *
 * The followings are the available columns in table 'apiusers':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $hash
 * @property integer $time
 */
class Apiusers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'apiusers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email', 'required'),
//			array('time', 'numerical', 'integerOnly'=>true),
			array('username, email', 'length', 'max'=>255),
			array('password', 'length', 'max'=>555),
                        array('password', 'authenticate', 'on' => 'login'),
//			array('hash', 'length', 'max'=>455),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
//			array('id, username, password, email, hash, time', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'hash' => 'Hash',
			'time' => 'Time',
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
//	public function search()
//	{
//		// @todo Please modify the following code to remove attributes that should not be searched.
//
//		$criteria=new CDbCriteria;
//
//		$criteria->compare('id',$this->id);
//		$criteria->compare('username',$this->username,true);
//		$criteria->compare('password',$this->password,true);
//		$criteria->compare('email',$this->email,true);
//		$criteria->compare('hash',$this->hash,true);
//		$criteria->compare('time',$this->time);
//
//		return new CActiveDataProvider($this, array(
//			'criteria'=>$criteria,
//		));
//	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Apiusers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
         /**
     * Собственное правило для проверки
     * Данный метод является связующем звеном с UserIdentity
     *
     * @param $attribute
      * @param $params
     */
    public function authenticate($attribute,$params) 
    {
        // Проверяем были ли ошибки в других правилах валидации.
        // если были - нет смысла выполнять проверку
         if(!$this->hasErrors())
        {
            // Создаем экземпляр класса UserIdentity
            // и передаем в его конструктор введенный пользователем логин и пароль (с формы)
            $identity= new UserIdentity($this->username, $this->password);
             // Выполняем метод authenticate (о котором мы с вами говорили пару абзацев назад)
            // Он у нас проверяет существует ли такой пользователь и возвращает ошибку (если она есть)
            // в $identity->errorCode
             $identity->authenticate();
                
                // Теперь мы проверяем есть ли ошибка..    
                switch($identity->errorCode)
                {
                    // Если ошибки нету...
                     case UserIdentity::ERROR_NONE: {
                        // Данная строчка говорит что надо выдать пользователю
                        // соответствующие куки о том что он зарегистрирован, срок действий
                         // у которых указан вторым параметром. 
                        Yii::app()->user->login($identity, 0);
                        break;
                    }
                    case UserIdentity::ERROR_USERNAME_INVALID: {
                         // Если логин был указан наверно - создаем ошибку
                        $this->addError('login','Пользователь не существует!');
                        break;
                    }
                     case UserIdentity::ERROR_PASSWORD_INVALID: {
                        // Если пароль был указан наверно - создаем ошибку
                        $this->addError('password','Вы указали неверный пароль!');
                         break;
                    }
                }
        }
    }
}
