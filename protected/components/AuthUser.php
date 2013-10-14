<?php

class AuthUser extends CWebUser
{
    private $_model = null;

    const ROLE_ADMIN = 1;
    const ROLE_SALES = 2;
    const ROLE_RECRUITER = 3;
    public $loginUrl = array('/admin/default/login');
    public static $denies = array(
        'TechController' => array(self::ROLE_RECRUITER),
        'ProjectsController' => array(self::ROLE_RECRUITER),
        'JobsController' => array(self::ROLE_SALES),
        'ProfileController' => array(self::ROLE_RECRUITER)
    );
    private $_user;
    public function getModel(){
        if (!$this->isGuest && $this->_model === null) {
            $this->_model = Users::model()->findByPk($this->id);
        }
        return $this->_model;
    }

}