<?php

class RubricForm extends CFormModel
{
	public $name;
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
			array('name, description', 'required'),
			array('name', 'length', 'min'=>1, 'max'=>255),
		);
	}

}
