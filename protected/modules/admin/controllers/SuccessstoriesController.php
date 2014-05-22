<?php

class SuccessstoriesController extends AdminController
{
    public function init()
    {
        $this->active = 'successstories';
    }

    public function filters()
    {
        return array('accessControl', array('ext.yiibooster..filters.BootstrapFilter - delete'),);
    }

    public function accessRules()
    {
        return array(
            array('allow','actions'=>array('index','view'),'users'=>array('*'),),
            array('allow','actions'=>array('create','update','delete'),'users'=>array('@')),
            array('allow','actions'=>array('create','update','delete'),'users'=>array('admin'),),
            array('deny','users'=>array('*')),
        );
    }

    public function actionView($id)
    {
        $this->render('view',array('model'=>$this->loadModel($id),));
    }

//    protected function initSave(Successstories $model) {
//        if (isset($_POST['Successstories'])) {
//            $model->attributes = $_POST['Successstories'];
//
//            if ($model->save()) {
////                $model->image->saveAs("Yii::app()->request->baseUrl;.'path/to/localFile");
//                $this->redirect( Yii::app()->request->baseUrl.'/admin/successstories/index');
//            }
//        }
//    }

//    public function actionCreate()
//    {
//        $model=new Successstories;
////        $model->pic=CUploadedFile::getInstance($model,'pic');
//
//
//        $this->initSave($model);
//
//        $this->render('create',array('model'=>$model,));
//    }
//
//    public function actionUpdate($id)
//    {
//        $model=$this->loadModel($id);
////        $model->pic=CUploadedFile::getInstance($model,'pic');
//
//
//        $this->initSave($model);
//
//        $this->render('update',array('model'=>$model,));
//    }

    public function actionUpdate($id=null){
        // в зависимости от аргумента создаем модель или ищем уже существующую
        if ($id === null) {
            $model = new Successstories();
        } else if(!$model=$this->loadModel($id)) {
            throw new CHttpException(404);
        }
        if (isset($_POST['Successstories'])) {
            $model->attributes = $_POST['Successstories'];

            if ($model->save()) {
                // отображаем успешное сообщение, обновляем страницу
                // или перенаправляем куда-либо ещё
                $this->redirect(Yii::app()->request->baseUrl.'/admin/successstories/index');
            }
        }

        $this->render('update',array('model'=>$model));
    }


    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            $this->loadModel($id)->delete();

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else{
            throw new CHttpException(400,'Неправильный запрос');
        }
    }

    public function actionIndex()
    {
        $model = new Successstories('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Successstories'])) {
            $model->attributes = $_GET['Successstories'];
        }

        $this->render('index', array(
            'model' => $model,
        ));
//    $dataProvider=new CActiveDataProvider('Successstories');
//    $this->render('index',array(
//    'dataProvider'=>$dataProvider,
//    ));
    }

    public function loadModel($id)
    {
        $model=Successstories::model()->findByPk($id);
        if($model===null){
            throw new CHttpException(404,'Запрощенной страницы не существует');
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax']==='successstories-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
