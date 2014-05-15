<?php
class ManagementController extends AdminController
{

    public function init() {
        $this->active = 'management';
    }

    public function actionIndex() {
        $model = Management::model()->findAll(array('order' => 'position'));
        $this->render('index', array('model' => $model));
    }

    function initSave(Management $model)
    {
        if (isset($_POST['Management'])) {
            // Save process
            $oldImg = $model->img;
            $model->attributes = $_POST['Management'];
            $uploadFile = CUploadedFile::getInstance($model, 'img');
            if($uploadFile !== null) {
                $model->img = $uploadFile;
            }
            if ($model->save()) {
                if (!empty($uploadFile)){
                    if(!is_dir('images/management/'. $model->id)){
                        mkdir('images/management/'. $model->id);
                    }
                    $model->img->saveAs('images/management/'. $model->id . '/' . $model->img->getName());
                    if(is_file('images/management/'. $model->id . '/' . $oldImg)) {
                        unlink('images/management/'. $model->id . '/' . $oldImg);
                    }
                }
                $this->redirect('/admin/management');
            }
        }
    }

    public function actionAdd()
    {
        $model = new Management();
        $this->initSave($model);
        $this->render('add', array('model' => $model));
    }

    public function actionEdit($id)
    {
        $model = Management::model()->findByPk($id);
        $this->initSave($model);
        $this->render('edit', array('model' => $model));
    }

    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $model = Management::model()->findByPk($id);
        if($model->delete()){
            $this->removeDirectory('images/management/'. $model->id);
            $this->redirect('/admin/management');
        }
        exit();
    }

    public function actionSaveOrder() {
        $request = Yii::app()->request;
        if($request->isAjaxRequest) {
            $order = $request->getQuery('id');
            fb($order);
            foreach ($order as $id => $item) {
                Yii::app()->db->createCommand()->update('management', array('position' => $id), 'id = ' . $item);
            }
            echo CJavaScript::jsonEncode(array('order' => $order));
            Yii::app()->end();
        } else {
            throw new CHttpException(404, 'Неправильный запрос');
        }
    }

    function removeDirectory($dir) {
        if ($objs = glob($dir."/*")) {
            foreach($objs as $obj) {
                is_dir($obj) ? removeDirectory($obj) : unlink($obj);
            }
        }
        rmdir($dir);
    }
}
