<?php

class AuthUser extends CWebUser
{
    private $_model = null;

    public $loginUrl = array('/admin/default/login');

    private function getModel(){
        if (!$this->isGuest && $this->_model === null) {
            $this->_model = User::model()->findByPk($this->id);
        }
        return $this->_model;
    }
}