<?php

class PartnersController extends AdminController
{
    public function init() {
        $this->active = 'partners';
    }

    public function actionIndex() {
        $partners = Partners::model()->findAll();
        $this->render('index', array('partners' => $partners));
    }

    public function actionAdd() {
        if (Yii::app()->user->hasFlash('success')) {
            header('Refresh:2; url=' . Yii::app()->getBaseUrl(true) . '/admin/partners');
        }
        $form = new Partners();
        $form->setScenario('insert');
        if (isset($_POST['Partners'])) {

            $form->attributes = $_POST['Partners'];
            $form->icon=CUploadedFile::getInstance($form,'icon');
            if ($form->save()) {
                mkdir('partners' . DIRECTORY_SEPARATOR . $form->id);
                $form->icon->saveAs('partners/' . $form->id . '/' . $form->icon->getName());
                Yii::app()->user->setFlash('success', 'Запись добавлена успешно!');
                $this->redirect(array('/admin/partners/add'));
            }
        }

        $this->render('add', array('model' => $form));
    }

    public function actionEdit($id) {
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        if (Yii::app()->user->hasFlash('success')) {
            header('Refresh:2; url=' . Yii::app()->getBaseUrl(true) . '/admin/partners');
        }
        $form = Partners::model()->findByPk($id);
        $form->setScenario('update');

        $oldIconFileName = 'partners' . DIRECTORY_SEPARATOR . $form->id . DIRECTORY_SEPARATOR . $form->icon;
        $oldIcon = $form->icon;
        if (isset($_POST['Partners'])) {

            $form->attributes = $_POST['Partners'];

            $form->icon=CUploadedFile::getInstance($form,'icon');
            if ($form->icon === null) {
                $form->icon = $oldIcon;
            }
            if ($form->save()) {
                if (!is_dir('partners' . DIRECTORY_SEPARATOR . $form->id)) {
                    mkdir('partners' . DIRECTORY_SEPARATOR . $form->id);
                }
                if (is_object($form->icon)) {
                    clearstatcache();
                    if (is_file($oldIconFileName)) {
                        unlink($oldIconFileName);
                    }
                    $form->icon->saveAs('partners/' . $form->id . '/' . $form->icon->getName());
                }

                Yii::app()->user->setFlash('success', 'Запись обновлена успешно!');
                $this->redirect(array('/admin/partners/edit/id/' . $form->id));
            }

        }
        $this->render('edit', array('model' => $form));
    }

    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $partner = Partners::model()->findByPk($id);
        $icon = 'partners' . DIRECTORY_SEPARATOR . $partner->id . DIRECTORY_SEPARATOR . $partner->icon;
        if (is_file($icon)) {
            unlink($icon);
            rmdir('partners' . DIRECTORY_SEPARATOR . $partner->id);
        }
        $partner->delete();
        header('Location:' . Yii::app()->getBaseUrl(true) . '/admin/partners');
        exit();
    }
}