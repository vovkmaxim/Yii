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
                $this->removeOldProfile();
                move_uploaded_file($profile['tmp_name'], 'profile' . DIRECTORY_SEPARATOR . $profile['name']);
                header('Refresh:2; url=' . Yii::app()->getBaseUrl(true) . '/admin/profile');
                $this->render('index', array('success' => $success));
                Yii::app()->end();
            }
        }
        $this->render('index', array('profile' => Text::getCompanyProfile()));
    }

    protected function removeOldProfile() {
        $oldProfiles = scandir('profile', 1);
        array_pop($oldProfiles);
        array_pop($oldProfiles);
        if (count($oldProfiles) > 0) {
            foreach ($oldProfiles as $profile) {
                $fileName = 'profile' . DIRECTORY_SEPARATOR . $profile;
                if (is_file($fileName)) {
                    unlink($fileName);
                }
            }
        }
        return true;
    }
}