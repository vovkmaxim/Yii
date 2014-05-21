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
        'TagsController' => array(self::ROLE_RECRUITER),
        'ProjectsController' => array(self::ROLE_RECRUITER),
        'VacanciesController' => array(self::ROLE_SALES),
        'DocumentsController' => array(self::ROLE_RECRUITER),
        'PartnersController' => array(self::ROLE_SALES),
        'SlidesController' => array(self::ROLE_SALES),
        'ManagementController' => array(self::ROLE_SALES),
        'StaticpagesController' => array(self::ROLE_SALES),
        'ContactdataController' => array(self::ROLE_SALES),
        'ContactusController' => array(self::ROLE_SALES),
        'SuccessstoriesController' => array(self::ROLE_SALES),
        'MenuController' => array(self::ROLE_SALES),
        'ConditionsController' => array(self::ROLE_SALES),

    );
    private $_user;
    public function getModel(){
        if (!$this->isGuest && $this->_model === null) {
            $this->_model = Users::model()->findByPk($this->id);
        }
        return $this->_model;
    }

}
