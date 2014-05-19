<?php

class MenuController extends AdminController
{
    public function init() {
        $this->active = 'menu';
    }

    public function actionIndex() {
        $model = Navigation::model()->findAll(array('order' => 'position'));
        $this->render('index', array('model' => $model));
    }

    function initSave(Navigation $model)
    {
        if (isset($_POST['Navigation'])) {
            // Save process
            $model->attributes = $_POST['Navigation'];
            if ($model->save()) {
                $this->redirect('/admin/menu');
            }
        }
    }

    public function actionAdd()
    {
        $model = new Navigation();
        $this->initSave($model);
        $this->render('add', array('model' => $model));
    }

    public function actionEdit($id)
    {
        $model = Navigation::model()->findByPk($id);
        $this->initSave($model);
        $this->render('edit', array('model' => $model));
    }

    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $model = Navigation::model()->findByPk($id);
        $model->delete();
        $this->redirect('/admin/menu');
        exit();
    }

    public function actionSaveOrder() {
        $request = Yii::app()->request;
        if($request->isAjaxRequest) {
            $order = $request->getQuery('id');
            fb($order);
            foreach ($order as $id => $item) {
                Yii::app()->db->createCommand()->update('menu', array('position' => $id), 'id = ' . $item);
            }
            echo CJavaScript::jsonEncode(array('order' => $order));
            Yii::app()->end();
        } else {
            throw new CHttpException(404, 'Неправильный запрос');
        }
    }
}