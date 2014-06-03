<?php

class WebUser extends CWebUser {

    private $_model = null;

    function getRole() {
//        $user = Apiusers::model()->findByPk($this->id);
//        $userrole = Userrole::model()->find('id_user=:id_user',array(":id_user" => $this->id));
//        $role = Role::model()->find('id=:id_role',array(":id_role" => $userrole->id_role));
//        
//        return $role->role; 

        if ($user = $this->getModel()) {
            // в таблице User есть поле role
            return $user;
        }
    }

    private function getModel() {
        if (!$this->isGuest && $this->_model === null) {

            $user = Apiusers::model()->findByPk($this->id);
            $userrole = Userrole::model()->find('id_user=:id_user', array(":id_user" => $this->id));
            if (!empty($userrole)) {
                $role = Role::model()->find('id=:id_role', array(":id_role" => $userrole->id_role));
//                $this->_model = User::model()->findByPk($this->id, array('select' => 'role'));
                $this->_model = $userrole; //$role->role;
            } else {
                $this->_model = "user";
            }
        }
        return $this->_model;
    }

}
