<?php

/**
 * This is the model class for table "projects".
 *
 * The followings are the available columns in table 'projects':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property int $position
 *
 * The followings are the available model relations:
 * @property ProjectsPics[] $projectsPics
 * @property Tech[] $tech
 */
class Projects extends CActiveRecord
{
     public $technology;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, position, technology', 'safe'),
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
			'projectsPics' => array(self::HAS_MANY, 'ProjectsPics', 'project_id'),
            'tech' => array(self::MANY_MANY, 'Tech', 'tech_project(project_id, tech_id)')
		);
	}

    /**
     * Get Technologies
     *
     * @return string
     */
    public function getTech()
    {
        $arr = array();
            if (count($this->tech)>0) {
                foreach ($this->tech as $item) {
                    $arr[] = $item->title;
                }
            }

        return (count($arr)>0) ? (implode(',', $arr)) : '' ;
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
        $criteria->with = array('tech');

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
//		$criteria->compare('tech',$this->tech,true);
        $criteria->compare('tech.title', $this->technology, true );

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'attributes'=>array(
                    'technology'=>array(
                        'asc'=>'tech.title',
                        'desc'=>'tech.title DESC',
                    ),
                    '*',
                ),
            ),

        ));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Projects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function behaviors(){
        return array('EAdvancedArBehavior' =>
        array('class' => 'application.components.EAdvancedArBehavior'));
    }
}
