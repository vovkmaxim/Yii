<?php

class MenuCategoriesController extends AdminController
{
    public function init() {
        $this->active = 'menu';
    }

    public function actionIndex() {
        $model = NavigationCategories::model()->findAll();
        $this->render('index', array('model' => $model));
    }

    function initSave(NavigationCategories $model)
    {
        if (isset($_POST['NavigationCategories'])) {
            // Save process
            $model->attributes = $_POST['NavigationCategories'];
            if ($model->save()) {
                $this->redirect('/admin/menuCategories');
            }
        }
    }

    public function actionAdd()
    {
        $model = new NavigationCategories();
        $this->initSave($model);
        $this->render('add', array('model' => $model));
    }

    public function actionEdit($id)
    {
        $model = NavigationCategories::model()->findByPk($id);
        $this->initSave($model);
        $this->render('edit', array('model' => $model));
    }

    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $model = NavigationCategories::model()->findByPk($id);
        $model->delete();
        $this->redirect('/admin/menuCategories');
        exit();
    }
}