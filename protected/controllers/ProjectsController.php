<?php

class ProjectsController extends Controller {
    public function actionIndex() {
//        echo '<pre>';
//        $tech = Tech::model()->with('projects')->findAll();
//        $tech = reset($tech);
//        CVarDumper::dump($tech->projects[0]->projectsPics[0]);
//        echo '<pre>';
//        die;

        $this->render('index', array('tech' => Tech::model()->with('projects')->findAll()));
    }
    public function actionView($project, $tech) {
        if (!trim($project)) {
            throw new CHttpException(404, 'Invalid request');
        }
        $prj = Projects::model()->findByAttributes(array('url' => $project));
        $desiredSkills = '';
        foreach ($prj->tech as $skill) {
            $desiredSkills .= ' ' . $skill->title . ',';
        }
        $desiredSkills = rtrim($desiredSkills, ',');
        $tech = Tech::model()->findByAttributes(array('url' => $tech));
        $projects = $tech->projects;
        $projectOrder = $this->findRecord($prj, $projects);
        $prevUrl = $nextUrl = '';
        if (isset($projects[$projectOrder - 1])) {
            $prevUrl = '/projects/view/project/' . $projects[$projectOrder - 1]->url . '/tech/' . $tech->url;
        }
        if (isset($projects[$projectOrder + 1])) {
            $nextUrl = '/projects/view/project/' . $projects[$projectOrder + 1]->url . '/tech/' . $tech->url;
        }

        $this->render('view', array(
            'project' => $prj,
            'skills' => $desiredSkills,
            'prevUrl' => $prevUrl,
            'nextUrl' => $nextUrl,
            'techUrl' => $tech->url
        ));
    }

    protected  function findRecord($record, $array) {
        foreach ($array as $id => $row) {
            if ($row->id == $record->id) {
                return $id;
            }
        }
        return false;
    }
}