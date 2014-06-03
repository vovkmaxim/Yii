<?php

class RegistrationForm extends CFormModel
{
	public $username;
	public $password;
	public $password2;
	public $email;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('username, password, password2, email', 'required'),
			array('username, password, email', 'length', 'max'=>255),
			array('email', 'email'),
                        array('password2', 'compare', 'compareAttribute'=>'password'),
		);
	}

}


