<?php

class UsersController extends AdminController
{
    public function actionIndex() {
        $model = Users::model()->findAll();
        $this->render('index', array('model' => $model));
    }

    function initSave(Users $model)
    {
        if (isset($_POST['Users'])) {
            // Save process
            $model->attributes = $_POST['Users'];
            $model->password = md5($_POST['Users']['password']);
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

    public function actionEdit($id)
    {
        $model = Users::model()->findByPk($id);
        $this->initSave($model);
        $this->render('edit', array('model' => $model));
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