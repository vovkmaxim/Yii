<?php

class ProfileController extends AdminController
{
    public function init() {
        $this->active = 'profile';
    }

    public function actionIndex() {
        if (Yii::app()->request->isPostRequest) {
            $profile = empty($_FILES['profile']) ? array() : $_FILES['profile'];
            if (empty($profile['name'])) {
                $error = 'Вы должны загрузить файл';
            } elseif ($profile['type'] != 'application/pdf') {
                $error = 'Файл должен быть в формате pdf';
            } else {
                $success = true;
            }
            if (isset($error)) {
                $this->render('index', array('error' => $error));
                Yii::app()->end();
            } elseif (isset($success)) {
                move_uploaded_file($profile['tmp_name'], 'profile' . DIRECTORY_SEPARATOR . 'profile.pdf');
                header('Refresh:2; url=' . Yii::app()->getBaseUrl(true) . '/admin/jobs');
                $this->render('index', array('success' => $success));
                Yii::app()->end();
            }
        }
        $this->render('index');
    }
}