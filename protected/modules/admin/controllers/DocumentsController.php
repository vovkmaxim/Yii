<?php
class DocumentsController extends AdminController
{

    public function init() {
        $this->active = 'documents';
    }

    public function actionIndex() {
        $model = new Documents('search');
        $this->render('index', array('model' => $model));
    }

    function initSave(Documents $model)
    {
        if (isset($_POST['Documents'])) {
            // Save process
            $oldFile = $model->file;
            $model->attributes = $_POST['Documents'];
            $uploadFile = CUploadedFile::getInstance($model, 'file');
            if($uploadFile !== null) {
                $model->file = $uploadFile;
            }
            if ($model->save()) {
                if (!empty($uploadFile)){
                    $model->file->saveAs('documents/' . $model->file->getName());
                    if(is_file('documents/' . $oldFile)) {
                        unlink('documents/' . $oldFile);
                    }
                }
//                $this->redirect('/admin/documents/index');
            }
        }
    }

    public function actionAdd()
    {
        $model = new Documents();
        $this->initSave($model);
        $this->render('add', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = Documents::model()->findByPk($id);
        $this->initSave($model);
        $this->render('update', array('model' => $model));
    }

    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $model = Documents::model()->findByPk($id);
        $file = 'documents/' . $model->file;
        if (is_file($file)) {
            unlink($file);
        }
        $model->delete();
        header('Location: /admin/documents');
        exit();
    }

    public function actionSaveOrder() {
        $request = Yii::app()->request;
        if($request->isAjaxRequest) {
            $order = $request->getQuery('id');
            fb($order);
            foreach ($order as $id => $item) {
                Yii::app()->db->createCommand()->update('documents', array('position' => $id), 'id = ' . $item);
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
