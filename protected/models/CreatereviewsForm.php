<?php

class CreatereviewsForm extends CFormModel
{
	public $title;
	public $author;
	public $description;

//	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('title, author, description', 'required'),
			array('title, author', 'length', 'min'=>1, 'max'=>255),
		);
	}

//	/**
//	 * Declares attribute labels.
//	 */
//	public function attributeLabels()
//	{
//            
//            
//            
////		return array(
////			'rememberMe'=>'Remember me next time',
////		);
//	}

}
