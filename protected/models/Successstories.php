<?php

class Successstories extends CActiveRecord
{
    public $pic;

    public function tableName()
	{
		return 'successstories';
	}

	public function rules()
	{

		return array(
			array('client, task, solution, result', 'required', 'message'=>'Это поле обязательно для заполнения'),
			array('id, client, task, solution, result, pic', 'safe', 'on'=>'search'),
            array('pic', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty' => true),
            array('pic', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty' => true),
            array('pic', 'unsafe'),
    	);
	}

    public function behaviors()
    {
        return array(
            'AttachmentBehavior' => array(
                'class' => 'AttachmentBehavior',
                'attribute' => 'pic',
                'path' => "images/stories/:custom:filename",
                'custom' => microtime(true),
                'fallback_image' => 'images/stories/default.png',
            ),
        );
    }

	public function relations()
	{

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
			'client' => 'Client',
			'task' => 'Task',
			'solution' => 'Solution',
			'result' => 'Result',
			'pic' => 'Picture',
		);
	}

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

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function beforeSave(){
        if(!parent::beforeSave())
            return false;

        if ($this->scenario == 'update' && !$this->pic) {
            unset($this->pic);
        }
        return true;
    }

    protected function beforeDelete(){
        if(!parent::beforeDelete())
            return false;
        return true;
    }
}

