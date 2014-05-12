<?php

class StaticpagesController extends AdminController
{
    public function init() {
        $this->active = 'staticpages';
    }

    public function actionIndex() {
        $staticpagesList = staticpages::model()->findAll(array('order' => 'ID'));
        $this->render('index', array('staticpagesList' => $staticpagesList));
    }

    protected function initSave(Staticpages $model)
    {
        if (isset($_POST['Staticpages'])) {
            // Save process
            $model->attributes = $_POST['Staticpages'];

            if ($model->save()) {
                $this->redirect( Yii::app()->request->baseUrl.'/admin/staticpages/index');
            }
//            var_dump($model->getErrors()); exit;
        }
    }

    public function actionAdd()
    {
        $model = new Staticpages();

        $this->initSave($model);

        $this->render('add', array('model' => $model));
    }

    public function actionEdit($id)
    {
        $model = Staticpages::model()->findByPk($id);

        $this->initSave($model);

        $this->render('edit', array('model' => $model));
    }

    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $staticpage = Staticpages::model()->findByPk($id);
        $staticpage->delete();
        header('Location:' . Yii::app()->getBaseUrl(true) . '/admin/staticpages');
        exit();
    }

    public function actionSaveOrder() {
        $request = Yii::app()->request;
        if ($request->isAjaxRequest) {
            $order = $request->getQuery('id');
            fb($order);
            foreach ($order as $id => $item) {
                Yii::app()->db->createCommand()->update('staticpages', array('position' => $id), 'id = ' . $item);
            }
            echo CJavaScript::jsonEncode(array('order' => $order));
            Yii::app()->end();
        } else {
            throw new CHttpException(404, 'Неправильный запрос');
        }

    }
    public function filters() {
        return array(
        array('ext.yiibooster..filters.BootstrapFilter - delete')
    );
}
}