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
            $isNewRecord = $model->isNewRecord;
            if ($model->save()) {
                $command = Yii::app()->db->createCommand();
                if($isNewRecord) {
                    $command->insert('tech_project', array(
                        'tech_id' => $_POST['Tech']['title'],
                        'project_id' => $model->id,
                    ));
                }else{
                    $command->update('tech_project', array(
                        'tech_id' => $_POST['Tech']['title'],
                    ), 'project_id=:id', array(':id' => $model->id));
                }
                $this->redirect('/admin/projects/index');
            }
        }
    }

    public function actionAdd()
    {
        $tech = new Tech();
        $model = new Projects();
        $this->initSave($model);
        $this->render('add', array(
            'model' => $model,
            'tech' => $tech
        ));
    }

    public function actionEdit($id)
    {
        $tech = new Tech();
        $techId = Yii::app()->db->createCommand()
            ->select('tech_id')
            ->from('tech_project')
            ->where('project_id = :id', array(':id' => $id))
            ->queryRow();
        $model = Projects::model()->findByPk($id);
        $this->initSave($model);
        $this->render('edit', array(
            'model' => $model,
            'tech' => $tech,
            'techId' => $techId['tech_id'],
        ));
    }

    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $model = Projects::model()->findByPk($id);
        $model->delete();
        $command = Yii::app()->db->createCommand();
        $command->delete('tech_project', 'project_id=:id', array(':id'=>$id));
        $this->redirect('/admin/projects/index');
        exit();
    }

    public function actionSaveOrder() {
        $request = Yii::app()->request;
        if($request->isAjaxRequest) {
            $order = $request->getQuery('id');
            fb($order);
            foreach ($order as $id => $item) {
                Yii::app()->db->createCommand()->update('projects', array('position' => $id), 'id = ' . $item);
            }
            echo CJavaScript::jsonEncode(array('order' => $order));
            Yii::app()->end();
        } else {
            throw new CHttpException(404, 'Неправильный запрос');
        }
    }

}
