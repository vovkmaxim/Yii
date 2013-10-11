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
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
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
        $techList = Tech::model()->with('techLists')->findAll();
        $projects = Projects::model()->with('projectsPics')->findAll();
        $vacancies = Jobs::model()->findAll(array('order' => 'position'));
        if ($request->isPostRequest) {
            $jobId = $request->getPost('jobid');
            $title = $request->getPost('title');
            $message = $request->getPost('message');
            $job = Jobs::model()->findByPk($jobId);
            $cv = (empty($_FILES['cv']) ? array() : $_FILES['cv'];
            $mailer = new YiiMailer();


            $this->render('index', array(
                'open' => true,
                'title' => $title,
                'message' => $message,
                'tech' => $techList,
                'projects' => $projects,
                'jobcv' => $job,
                'jobs' => Text::divideByThree($vacancies)
            ));

        }

        $this->render('index', array(
                                'tech' => $techList,
                                'projects' => $projects,
                                'jobs' => Text::divideByThree($vacancies)
                               )
        );
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

    public function actionGetJob() {
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
}