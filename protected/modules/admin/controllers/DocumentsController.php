<?php
class DocumentsController extends AdminController
{
  public function actionIndex() {
    $docList = Documents::model()->findAll(array('order' => 'position'));
    $this->render('index', array('docList' => $docList));
  }

  function initSave(Documents $model)
  {
    if (isset($_POST['Documents'])) {
      // Save process
      $model->attributes = $_POST['Documents'];
      $uploadFile = CUploadedFile::getInstance($model,'file');
      $oldFile = $model->file;
      $model->file = $uploadFile;
	  if($model->file === null) {
		$model->file = $oldFile;
	  }
      if ($model->save()) {
        if(!empty($uploadFile)){
          $model->file->saveAs('documents/' . $model->file->getName());
          if(is_file('documents/'.$oldFile)) {
			unlink('documents/'.$oldFile);
		  }
          $file = 'documents/' . $model->file;
        }
        $this->redirect('/admin/documents/index');
      }
    }
  }

  public function actionAdd() 
  {
    $model = new Documents();    
    $this->initSave($model); 
    $this->render('add', array('model' => $model));
  }
  
  public function actionEdit($id) 
  {
    $model = Documents::model()->findByPk($id);    
    $this->initSave($model);
    $this->render('edit', array('model' => $model));
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
}
