<?php

class TechController extends AdminController
{
    public function init() {
        $this->active = 'tech';

        Yii::app()->clientScript->registerScriptFile(
            CHtml::asset(
                Yii::getPathOfAlias('admin.assets.js'). '/tech.js'
            ));
    }
    public function actionIndex() {
        $techList = Tech::model()->findAll(array('order' => 'position'));
        $this->render('index', array('techList' => $techList));
    }

    public function actionAdd()
    {
        $model = new Tech();
        if (isset($_POST['Tech'])) {
            $model->attributes = $_POST['Tech'];
            if ($model->save()) {
                foreach($_POST['list'] as $item){
                    $techList = new TechList;
                    $techList->tech_id = $model->id;
                    $techList->title = $item;
                    $techList->save(false);
                }
                $this->redirect('/admin/tech/index');
            }
        }
        if(isset($_POST['list'])){
            $list = $_POST['list'];
        }else{
            $list = null;
        }
        $this->render('add', array('model' => $model, 'list' => $list));
    }

    public function actionEdit($id)
    {
        $list = TechList::model()->findAll('tech_id = :id', array(':id' => $id));
        $model = Tech::model()->findByPk($id);
        if (isset($_POST['Tech'])) {
            $model->attributes = $_POST['Tech'];
            if ($model->save()) {
                foreach($list as $item){
                    TechList::model()->deleteByPk($item->id);
                }
                foreach($_POST['list'] as $item){
                    $techList = new TechList;
                    $techList->tech_id = $model->id;
                    $techList->title = $item;
                    $techList->save(false);
                }
                $this->redirect('/admin/tech/index');
            }
        }
        $this->render('edit', array('model' => $model, 'list' => $list));
    }

    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $tech = Tech::model()->findByPk($id);
        $tech->delete();
        $this->redirect('/admin/tech/index');
        exit();
    }

    public function actionSaveOrder() {
        $request = Yii::app()->request;
        if ($request->isAjaxRequest) {
            $order = $request->getQuery('id');
            fb($order);
            foreach ($order as $id => $item) {
                Yii::app()->db->createCommand()->update('tech', array('position' => $id), 'id = ' . $item);
            }
            echo CJavaScript::jsonEncode(array('order' => $order));
            Yii::app()->end();
        } else {
            throw new CHttpException(404, 'Неправильный запрос');
        }

    }
}