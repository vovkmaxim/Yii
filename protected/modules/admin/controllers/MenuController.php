<?php

class MenuController extends AdminController
{
    public function init() {
        $this->active = 'menu';
    }

    public function actionIndex() {
//        $model = Yii::app()->db->createCommand()
//            ->select('navigation.id, navigation.title, navigation_categories.title as category_title')
//            ->from('navigation')
//            ->join('navigation_categories', 'navigation_categories.id = navigation.category')
//            ->queryAll();
        $model = new Navigation('search');
        $this->render('index', array('model' => $model));
    }

    function initSave(Navigation $model)
    {
        if (isset($_POST['Navigation'])) {
            // Save process
            $model->attributes = $_POST['Navigation'];
            if ($model->save()) {return true;
//                $this->redirect('/admin/menu');
            }
        }
    }

    public function actionAdd()
    {
        $model = new Navigation();
        $this->initSave($model);
        $this->render('add', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = Navigation::model()->findByPk($id);
        $this->initSave($model);
        $this->render('update', array('model' => $model));
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
                Yii::app()->db->createCommand()->update('navigation', array('position' => $id), 'id = ' . $item);
            }
            echo CJavaScript::jsonEncode(array('order' => $order));
            Yii::app()->end();
        } else {
            throw new CHttpException(404, 'Неправильный запрос');
        }
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