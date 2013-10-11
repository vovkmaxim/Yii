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
                    ))->findAll();
        $this->render('index', array('projectsList' => $projectsList));
    }

    public function actionAdd() {
        $request = Yii::app()->request;
        $techList = Tech::model()->findAll();
        $viewVars = array('description' => '', 'desiredSkills' => '', 'techList' => $techList, 'techId' => 0);
        if ($request->isPostRequest) {

            $title = trim($request->getPost('title'));
            $description = trim($request->getPost('description'));
            $desiredSkills = trim($request->getPost('desired_skills'));
            $tech = $request->getPost('tech');
            $errors = array();
            $img = new ProjectImage();
            if ($title == '') {
                $errors['title'] = 'Введите название';
            }
            if ($tech == 0) {
                $errors['tech'] = 'Выберите технологию';
            }
            if (count($errors) > 0) {
                if (!empty($_FILES['img'])) {
                    $images = $_FILES['img'];
                    $img->makePreview($images);
                    $previews = $img->getPreviews();
                    if (count($previews) > 0) {
                        $viewVars['previews'] = $previews;
                    }
                }
                $viewVars['description'] = $description;
                $viewVars['desiredSkills'] = $desiredSkills;
                $viewVars['techId'] = $tech;
                $viewVars['errors'] = $errors;
            } else {
                $project = new Projects();
                $project->title = $title;
                $project->description = $description;
                $project->skills = $desiredSkills;
                $project->tech_id = $tech;
                $project->insert();
                $images = empty($_FILES['img']) ? array() : $_FILES['img'];
                $img->loadImages($images, $project->id);

                $viewVars['result'] = 'Проект успешно добавлен';
                header('Refresh:2; url=' . Yii::app()->getBaseUrl(true) . '/admin/projects');
            }
        }

        $this->render('add', $viewVars);
    }

    public function actionEdit($id) {
        $id = (int)$id;
        if ($id  == 0) {
            throw new CHttpException(404,'Неправильный запрос');
        }
        $request = Yii::app()->request;
        $project = Projects::model()->findByPk($id);
        $techList = Tech::model()->findAll();
        $projectPics = ProjectsPics::model()->findAllByAttributes(array('project_id' => $id));
        $img = new ProjectImage();
        $viewVars = array(
                    'title' => $project->title,
                    'description' => $project->description,
                    'desiredSkills' => $project->skills,
                    'techList' => $techList,
                    'techId' => $project->tech_id,
                    'pics' => $projectPics);
        if ($request->isPostRequest) {
            $title = trim($request->getPost('title'));
            $description = trim($request->getPost('description'));
            $desiredSkills = trim($request->getPost('desired_skills'));
            $tech = $request->getPost('tech');
            $errors = array();
            if ($title == '') {
                $errors['title'] = 'Введите название';
            }
            if ($tech == 0) {
                $errors['tech'] = 'Выберите технологию';
            }
            if (count($errors) > 0) {
                $viewVars['errors'] = $errors;
                $viewVars['title'] = $title;
                $viewVars['description'] = $description;
                $viewVars['desiredSkills'] = $desiredSkills;
                $viewVars['techId'] = $tech;
                if (!empty($_FILES['img'])) {
                    $images = $_FILES['img'];
                    $img->makePreview($images);
                    $previews = $img->getPreviews();
                    if (count($previews) > 0) {
                        $viewVars['previews'] = $previews;
                    }
                }

            } else {
                $project->title = $title;
                $project->description = $description;
                $project->skills = $desiredSkills;
                $project->tech_id = $tech;
                $project->update();
                $images = empty($_FILES['img']) ? array() : $_FILES['img'];
                $img->loadImages($images, $project->id);
                $viewVars['result'] = 'Проект успешно изменен';
                header('Refresh:2; url=' . Yii::app()->getBaseUrl(true) . '/admin/projects');

            }
        }

        $this->render('edit', $viewVars);
    }

    public function actionDeletePreview() {
        $request = Yii::app()->request;
        if ($request->isAjaxRequest) {
            $id = $request->getPost('id');
            $fileName = 'preview' . DIRECTORY_SEPARATOR . md5(session_id()) . DIRECTORY_SEPARATOR . base64_decode($id);
            if (is_file($fileName)) {
                unlink($fileName);
                echo CJavaScript::jsonEncode(array('result' => 'OK'));
                Yii::app()->end();
            } else {
                echo CJavaScript::jsonEncode(array('error' => 'No file'));
                Yii::app()->end();
            }
        }
    }

    public function actionDeletePic() {
        $request = Yii::app()->request;
        if ($request->isAjaxRequest) {
            $pictureId = $request->getPost('pic_id');
            $modelPic = ProjectsPics::model()->findByPk($pictureId);
            if (empty($modelPic->id)) {
                echo CJavaScript::jsonEncode(array('error' => 'No file'));
                Yii::app()->end();
            } else {
                $explodePicUrl = explode('/', $modelPic->url);
                $filePic = $explodePicUrl[count($explodePicUrl) - 1];
                $fileName = 'pics' . DIRECTORY_SEPARATOR . $modelPic->project_id . DIRECTORY_SEPARATOR . $filePic;
            }


            if (is_file($fileName)) {
                unlink($fileName);
                $modelPic->delete();
                echo CJavaScript::jsonEncode(array('result' => 'OK'));
                Yii::app()->end();
            } else {
                echo CJavaScript::jsonEncode(array('error' => 'No file'));
                Yii::app()->end();
            }
        }
    }
    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $project = Projects::model()->findByPk($id);
        $project->delete();
        header('Location:' . Yii::app()->getBaseUrl(true) . '/admin/projects');
    }


}