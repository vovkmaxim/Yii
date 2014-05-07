<?php

class SiteController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $request = Yii::app()->request;
        $techList = Tech::model()->with('techLists')->findAll(array('order' => 't.position'));
        $projects = Projects::model()->with('projectsPics')->findAll();
        $vacancies = Jobs::model()->findAll(array('order' => 'position'));
        $profile = Text::getCompanyProfile();
        $partners = Partners::model()->findAll();
        
        $file = Documents::model()->findAll();

        $this->render('index', array(
                'tech' => $techList,
                'projects' => $projects,
                'jobs' => $vacancies,
                'profile' => $profile,
                'partners' => $partners,
                'files' => $file
            )
        );
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionGetJob()
    {
        $request = Yii::app()->request;
        if ($request->isAjaxRequest) {
            $id = $request->getPost($id);
            $job = Jobs::model()->findByPk($id);
            if ($job->title !== null) {
                echo CJavaScript::encode(array('job' => $job));
                Yii::app()->end();
            } else {
                echo CJavaScript::encode(array('error' => 'wrong_params'));
                Yii::app()->end();
            }
        }
    }

    public function actionSendCv()
    {
        $request = Yii::app()->request;
        if (!$request->isPostRequest) {
            throw new CHttpException(404, 'Bad request');
        }

        $jobId = $request->getPost('jobid');
        $name = trim($request->getPost('name'));
        $email = trim($request->getPost('email'));
        $message = trim($request->getPost('message'));
        $job = Jobs::model()->findByPk($jobId);
        $cv = (empty($_FILES['cv'])) ? array() : $_FILES['cv'];
        $errors = array();
        if ($name == '') {
            $errors['name'] = 'empty_name';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'empty_email';
        }

        if (empty($cv['name'])) {
            $errors['cv'] = 'empty_cv';
        }

        if (count($errors) > 0) {
            echo CJavaScript::jsonEncode(array('errors' => $errors));
        } else {

            $attach = 'cv' . DIRECTORY_SEPARATOR . $cv['name'];
            move_uploaded_file($cv['tmp_name'], $attach);

            $mailer = new YiiMailer();
            $mailer->setFrom('dima.lyashko@chisw.us', $name . ' <' . $email . '>');
            $mailer->setSubject('СV for' . ' (' . $job->title . ')');
            $mailer->setAttachment($attach);
            $mailer->setView('cv');
            $mailer->setData(array('msg' => Text::formatText($message)));
            $mailer->render();
            $mailer->IsSMTP(true);
//            $mailer->setTo('human_resources_team@chisw.us');
            $mailer->setTo('dmlyashko@gmail.com');
            $mailer->SMTPAuth = true;
            $mailer->Host = 'mail.ukraine.com.ua';
            $mailer->Username = 'dima.lyashko@chisw.us';
            $mailer->Password = 'yFA2Ppu7';
            if (!$mailer->send()) {
                $errors['email'] = 'not_sent';
            }
            if (is_file($attach)) {
                unlink($attach);
            }



            if (count($errors) > 0) {
                echo CJavaScript::jsonEncode(array('errors' => $errors));
            } else {
                echo CJavaScript::jsonEncode(array('result' => 'OK'));
            }
        }
    }
}
