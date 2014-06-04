<?php

class TestmonialsController extends AdminController
{
    public function init() {
        $this->active = 'testmonials';
    }

    public function actionIndex() {
//        $model = Conditions::model()->findAll(array('order' => 'position'));
        $model = new Testmonials('search');
        $this->render('index', array('model' => $model));
    }

    function initSave(Testmonials $model)
    {
        if (isset($_POST['Testmonials'])) {
            // Save process
            $model->attributes = $_POST['Testmonials'];
            if ($model->save()) { return true;
//                $this->redirect('/admin/testmonials');
            }
        }
    }

    public function actionAdd()
    {
        $model = new Testmonials();
        $this->initSave($model);
        $this->render('add', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = Testmonials::model()->findByPk($id);
        $this->initSave($model);
        $this->render('update', array('model' => $model));
    }

    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $model = Testmonials::model()->findByPk($id);
        $model->delete();
        header('Location: /admin/testmonials');
        exit();
    }


}