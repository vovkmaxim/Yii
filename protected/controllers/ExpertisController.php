<?php

class ExpertisController extends Controller
{
	
	public function actionIndex()
	{
		$model = Tech::model()->findAll();
		$this->render('index', array('model' => $model));
	}
	
	public function actionProjects($key)
	{		
		$projects = Yii::app()->db->createCommand()
			->select('projects.title, projects.description, projects.skills')
			->from('projects')
			->leftJoin('tech_project', 'tech_project.project_id = projects.id')
			->leftJoin('tech', 'tech.id = tech_project.tech_id')
			->where('tech.title = :key', array(':key' => $key))
			->queryAll();
     
		$this->render('filter', array('projects' => $projects));
	}

}
