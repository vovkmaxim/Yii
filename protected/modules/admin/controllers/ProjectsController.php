<?php

class ProjectsController extends AdminController
{
  public function init() {
      $this->active = 'projects';
  }

  public function actionIndex() {
    $projectsModel = new Projects();
    $projectsList = $projectsModel->with(
      array(
        'tech' => array(
        'select' => array('title')
      )
    ))->findAll(array('order' => 't.position'));
    $this->render('index', array('projectsList' => $projectsList));
  }
  
  function initSave(Projects $model)
  {
    if (isset($_POST['Projects'])) {
      // Save process
      $model->attributes = $_POST['Projects'];
      if ($model->save()) {
        $this->redirect('/admin/projects/index');
      }
    }
  }
  
  public function actionAdd() 
  {
    $model = new Projects();    
    $this->initSave($model); 
    $this->render('add', array('model' => $model));
  }
  
  public function actionDelete($id) {
    $id = (int)$id;
    if ($id == 0) {
      throw new CHttpException(404, 'Invalid request');
    }
    $model = Projects::model()->findByPk($id);
    $model->delete();
    $this->redirect('/admin/projects/index');
    exit();
  }
    
}
