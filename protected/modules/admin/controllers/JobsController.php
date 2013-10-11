<?php

class JobsController extends AdminController
{
    public function init() {
        $this->active = 'jobs';
    }


    public function actionIndex() {
        $jobsList = Jobs::model()->findAll(array('order' => 'position'));
        $this->render('index', array('jobsList' => $jobsList));
    }

    public function actionAdd() {
        $request = Yii::app()->request;
        $viewVars = array('description' => '');
        if ($request->isPostRequest) {
            $title = trim($request->getPost('title'));
            $description = trim($request->getPost('description'));
            if ($title == '') {
                $error = 'Введите название';
                $viewVars['error'] = $error;
                $viewVars['description'] = $description;
            }
            else {
                $job = new Jobs();
                $maxPosition = Yii::app()->db->createCommand()
                    ->select('MAX(position)')
                    ->from('jobs')
                    ->queryScalar();
                $job->title = $title;
                $job->description = $description;
                $job->position = $maxPosition + 1;
                $job->insert();
                $viewVars['result'] = 'Вакансия успешно добавлена';
                header('Refresh:2; url=' . Yii::app()->getBaseUrl(true) . '/admin/jobs');
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
        $job = Jobs::model()->findByPk($id);
        $viewVars = array('title' => $job->title,   'description' => $job->description);
        if ($request->isPostRequest) {
            $title = trim($request->getPost('title'));
            $description = trim($request->getPost('description'));
            if ($title == '') {
                $error = 'Введите название';
                $viewVars['error'] = $error;
                $viewVars['title'] = $title;
                $viewVars['description'] = $description;
            }
            else {
                $job->title = $title;
                $job->description = $description;
                $job->update();
                $viewVars['result'] = 'Вакансия успешно сохранена';
                header('Refresh:2; url=' . Yii::app()->getBaseUrl(true) . '/admin/jobs');
            }
        }
        $this->render('edit', $viewVars);
    }

    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $job = Jobs::model()->findByPk($id);
        $job->delete();
        header('Location:' . Yii::app()->getBaseUrl(true) . '/admin/jobs');
        exit();
    }

    public function actionSaveOrder() {
        $request = Yii::app()->request;
        if ($request->isAjaxRequest) {
            $order = $request->getQuery('id');
            fb($order);
            foreach ($order as $id => $item) {
                Yii::app()->db->createCommand()->update('jobs', array('position' => $id), 'id = ' . $item);
            }
            echo CJavaScript::jsonEncode(array('order' => $order));
            Yii::app()->end();
        } else {
            throw new CHttpException(404, 'Неправильный запрос');
        }

    }
}