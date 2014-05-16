<?php

class ExpertiseController extends Controller
{
	
	public function actionIndex()
	{
		$model = Tech::model()->findAll();
		$this->render('index', array('model' => $model));
	}
	
	public function actionProjects($tech = '', $tag = '')
	{
        if(!empty($tech)){
            $projects = Yii::app()->db->createCommand()
                ->select('projects.id, projects.title, projects.description')
                ->from('projects')
                ->leftJoin('tech_project', 'tech_project.project_id = projects.id')
                ->leftJoin('tech', 'tech.id = tech_project.tech_id')
                ->where('tech.title = :tech', array(':tech' => $tech))
                ->order('projects.position')
                ->queryAll();
        }else{
            $projects = Yii::app()->db->createCommand()
                ->select('projects.id, projects.title, projects.description')
                ->from('projects')
                ->leftJoin('tags_projects', 'tags_projects.project_id = projects.id')
                ->leftJoin('tags', 'tags.id = tags_projects.tag_id')
                ->where('tags.title LIKE :tag', array(':tag' => '%'.$tag.'%'))
                ->order('projects.position')
                ->queryAll();
        }

        $tagsList = Yii::app()->db->createCommand()
            ->select('tags.title, tags_projects.project_id')
            ->from('tags')
            ->leftJoin('tags_projects', 'tags_projects.tag_id = tags.id')
            ->order('tags.title')
            ->queryAll();

        $this->render('filter', array('projects' => $projects, 'tagsList' => $tagsList));
	}

}
