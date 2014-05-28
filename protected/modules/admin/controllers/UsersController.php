<?php

class UsersController extends AdminController
{
    public function actionIndex() {
        $model = new Users('search');
        $this->render('index', array('model' => $model));
    }

    function initSave(Users $model)
    {
        if (isset($_POST['Users'])) {
            // Save process
            $oldPassword = $model->password;
            $model->attributes = $_POST['Users'];
            if($_POST['Users']['password'] == null) {
                $model->password = $oldPassword;
            }else{
                $model->password = md5($_POST['Users']['password']);
            }
            if ($model->save()) {
                $this->redirect('/admin/users');
            }
        }
    }

    public function actionAdd()
    {
        $model = new Users();
        $this->initSave($model);
        $this->render('add', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = Users::model()->findByPk($id);
        $this->initSave($model);
        $this->render('update', array('model' => $model));
    }

    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $model = Users::model()->findByPk($id);
        $model->delete();
        $this->redirect('/admin/users');
        exit();
    }
}