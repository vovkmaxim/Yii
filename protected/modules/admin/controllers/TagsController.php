<?php

class TagsController extends AdminController
{
    public function init() {
        $this->active = 'tags';
    }

    public function actionIndex() {
        $model = Tags::model()->findAll(array('order' => 'title'));
        $this->render('index', array(
            'model' => $model
        ));
    }

    function initSave(Tags $model)
    {
        if (isset($_POST['Tags'])) {
            // Save process
            $model->attributes = $_POST['Tags'];
            if ($model->save()) {
                $this->redirect('/admin/tags/index');
            }
        }
    }

    public function actionAdd()
    {
        $model = new Tags();
        $this->initSave($model);
        $this->render('add', array('model' => $model));
    }

    public function actionEdit($id)
    {
        $model = Tags::model()->findByPk($id);
        $this->initSave($model);
        $this->render('edit', array('model' => $model));
    }

    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $model = Tags::model()->findByPk($id);
        $model->delete();
        $this->redirect('/admin/tags/index');
        exit();
    }

}
