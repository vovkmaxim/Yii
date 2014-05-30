<?php

class TagsController extends AdminController
{
    public function init() {
        $this->active = 'tags';
    }

    public function actionIndex() {
        $model = new Tags('search');
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
                $this->redirect('/admin/tags');
            }
        }
    }

    public function actionAdd()
    {
        $model = new Tags();
        $this->initSave($model);
        $this->render('add', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = Tags::model()->findByPk($id);
        $this->initSave($model);
        $this->render('update', array('model' => $model));
    }

    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $model = Tags::model()->findByPk($id);
        $model->delete();
        $command = Yii::app()->db->createCommand();
        $command->delete('tags_projects', 'tag_id=:id', array(':id'=>$id));
        $this->redirect('/admin/tags');
        exit();
    }

    public function actions() {
        return array(
            'fmanager'=>array(
                'class'=>'ext.fm.ElFinderAction',
            ),
        );
    }

    public function actionBrowse()
    {
        $this->layout='//layouts/empty_backend';
        $this->render('browser');
    }

}
