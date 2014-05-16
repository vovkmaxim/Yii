<?php

class VacanciesController extends AdminController
{
    public function init() {
        $this->active = 'vacancies';
    }

    public function actionIndex() {
        $model = Vacancies::model()->findAll(array('order' => 'position'));
        $this->render('index', array('model' => $model));
    }

    function initSave(Vacancies $model)
    {
        if (isset($_POST['Vacancies'])) {
            // Save process
            $model->attributes = $_POST['Vacancies'];
            if ($model->save()) {
                $this->redirect('/admin/vacancies');
            }
        }
    }

    public function actionAdd() {
        $model = new Vacancies();
        $this->initSave($model);
        $this->render('add', array('model' => $model));
    }

    public function actionEdit($id) {
        $model = Vacancies::model()->findByPk($id);
        $this->initSave($model);
        $this->render('edit', array('model' => $model));
    }

    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $job = Vacancies::model()->findByPk($id);
        $job->delete();
        header('Location:' . Yii::app()->getBaseUrl(true) . '/admin/vacancies');
        exit();
    }

    public function actionSaveOrder() {
        $request = Yii::app()->request;
        if ($request->isAjaxRequest) {
            $order = $request->getQuery('id');
            fb($order);
            foreach ($order as $id => $item) {
                Yii::app()->db->createCommand()->update('vacancies', array('position' => $id), 'id = ' . $item);
            }
            echo CJavaScript::jsonEncode(array('order' => $order));
            Yii::app()->end();
        } else {
            throw new CHttpException(404, 'Неправильный запрос');
        }

    }
}
