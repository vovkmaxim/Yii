<?php

class ConditionsController extends AdminController
{
    public function init() {
        $this->active = 'conditions';
    }

    public function actionIndex() {
        $model = Conditions::model()->findAll(array('order' => 'position'));
        $this->render('index', array('model' => $model));
    }

    function initSave(Conditions $model)
    {
        if (isset($_POST['Conditions'])) {
            // Save process
            $model->attributes = $_POST['Conditions'];
            if ($model->save()) {
                $this->redirect('/admin/conditions');
            }
        }
    }

    public function actionAdd()
    {
        $model = new Conditions();
        $this->initSave($model);
        $this->render('add', array('model' => $model));
    }

    public function actionEdit($id)
    {
        $model = Conditions::model()->findByPk($id);
        $this->initSave($model);
        $this->render('edit', array('model' => $model));
    }

    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $model = Conditions::model()->findByPk($id);
        $model->delete();
        header('Location: /admin/conditions');
        exit();
    }

    public function actionSaveOrder() {
        $request = Yii::app()->request;
        if($request->isAjaxRequest) {
            $order = $request->getQuery('id');
            fb($order);
            foreach ($order as $id => $item) {
                Yii::app()->db->createCommand()->update('conditions', array('position' => $id), 'id = ' . $item);
            }
            echo CJavaScript::jsonEncode(array('order' => $order));
            Yii::app()->end();
        } else {
            throw new CHttpException(404, 'Неправильный запрос');
        }
    }
}