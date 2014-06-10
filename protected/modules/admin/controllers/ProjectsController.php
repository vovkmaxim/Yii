<?php

class ProjectsController extends AdminController
{
    public function init() {
        $this->active = 'projects';
    }

    public function actionIndex() {
//        $projectsModel = new Projects();
//        $projectsList = $projectsModel->with(
//        array(
//            'tech' => array(
//            'select' => array('title')
//        )
//        ))->findAll(array('order' => 't.position'));        
        $model = new Projects('search');        
        $this->render('index', array('model' => $model));
    }

    function initSave(Projects $model, $tagsList)
    {
        if (isset($_POST['Projects'])) {
            // Save process
            $model->attributes = $_POST['Projects'];
            $isNewRecord = $model->isNewRecord;
            //if(substr($_POST['Projects']['tags'], -2) != ', ' and !empty($_POST['Projects']['tags'])){
                //$model->tags = $_POST['Projects']['tags'].', ';
            //}

            if ($model->save()) {

                array_map(function($element) use (&$tagsArr) {
                    $tagsArr[mb_strtolower($element->title, 'UTF-8')] = $element->id;
                }, $tagsList);

                $post_tags = explode(', ', $_POST['Projects']['tags']);
                foreach($post_tags as $item){
                    if(empty($tagsArr[mb_strtolower($item, 'UTF-8')])){
                        $modelTags = new Tags;
                        $modelTags->title = $item;
                        $modelTags->save();
                        $idsTags[] = $modelTags->id;
                    }
                }

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

                    $command->delete('tags_projects', 'project_id=:id', array(':id'=>$model->id));
                }

                $i = 0;
                foreach($post_tags as $item){
                    $key = mb_strtolower($item, 'UTF-8');
                    if(!empty($tagsArr[$key])){
                        $modelTagsProjects = new TagsProjects();
                        $modelTagsProjects->tag_id = $tagsArr[$key];
                        $modelTagsProjects->project_id = $model->id;
                        $modelTagsProjects->save();
                    }else{
                        $modelTagsProjects = new TagsProjects();
                        $modelTagsProjects->tag_id = $idsTags[$i++];
                        $modelTagsProjects->project_id = $model->id;
                        $modelTagsProjects->save();
                    }

                }

//                $this->redirect('/admin/projects/index');
            }
        }
    }

    public function actionAdd()
    {
        $tagsList = Tags::model()->findAll(array('order' => 'title'));
        $tech = new Tech();
        $model = new Projects();
        $this->initSave($model, $tagsList);
        $this->render('add', array(
            'model' => $model,
            'tagsList' => $tagsList,
            'tech' => $tech,
        ));
    }

    public function actionUpdate($id)
    {
        $tagsList = Tags::model()->findAll(array('order' => 'title'));
        $tagsListProjects = Yii::app()->db->createCommand()
            ->select('tags.title')
            ->from('tags')
            ->join('tags_projects','tags_projects.tag_id = tags.id')
            ->join('projects','projects.id = tags_projects.project_id')
            ->where('projects.id = :id', array(':id' => $id))
            ->queryAll();

        $tech = new Tech();
        $techId = Yii::app()->db->createCommand()
            ->select('tech_id')
            ->from('tech_project')
            ->where('project_id = :id', array(':id' => $id))
            ->queryRow();

        $model = Projects::model()->findByPk($id);
        $this->initSave($model, $tagsList);
        $this->render('update', array(
            'model' => $model,
            'tech' => $tech,
            'techId' => $techId['tech_id'],
            'tagsList' => $tagsList,
            'tagsListProjects' => $tagsListProjects,
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
        $command->delete('tags_projects', 'project_id=:id', array(':id'=>$id));
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
