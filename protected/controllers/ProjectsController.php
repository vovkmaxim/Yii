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
}