<?php

class StaticpagesController extends Controller
{
	public $layout = '//layouts/static';

	public function actionIndex($page)
	{
        if (in_array($page, array(
                                'Contactus',
                                'Success_Stories',
                                'Vacancies',
                                'Management',
                                'Marketing',
                                'Expertise',

                            )
            ))
           {
            $this->redirect($page);
            Yii::app()->end();
        }
        $model = Staticpages::model()->findByAttributes(array('title' => $page));

        if ($model) {
            $this->render('index', array(
                'content' => $model->text,

            ));
            Yii::app()->end();
        }
        $this->redirect(Yii::app()->request->baseUrl);
	}

    public function actionContactus()
    {
        $this->layout='//layouts/contactus';
        $modelContactdata = Contactdata::model()->find();
        $modelContactus = Contactus::model()->findAll();


        $this->render('contactus', array(
            'modelContactdata' => $modelContactdata,
            'modelContactus' => $modelContactus,
        ));
    }

    public function actionSuccess_stories($page)
    {
//        $this->layout='//layouts/successstories';
        $modelStatic = Staticpages::model()->findByAttributes(array('title' => 'Success_stories'));
        $modelDynamic = Successstories::model()->findAll();


        $this->render('successstories', array(
            'modelStatic' => $modelStatic,
            'modelDynamic' => $modelDynamic,
        ));
    }

    public function actionVacancies($page)
    {
        $this->layout='//layouts/vacancies';
        $modelStatic = Staticpages::model()->findByAttributes(array('title' => $page));
        $modelDynamic = Vacancies::model()->findAll();


        $this->render('vacancies', array(
            'modelStatic' => $modelStatic,
            'modelDynamic' => $modelDynamic,
        ));
    }

    public function actionManagement($page)
    {
        $this->layout='//layouts/management';
        $modelStatic = Staticpages::model()->findByAttributes(array('title' => $page));
        $modelDynamic = Management::model()->findAll();


        $this->render('management', array(
            'modelStatic' => $modelStatic,
            'modelDynamic' => $modelDynamic,
        ));
    }

    public function actionMarketing($page)
    {
        $this->layout='//layouts/marketing';
        $modelStatic = Staticpages::model()->findByAttributes(array('title' => $page));
        $modelDynamic = Marketing::model()->findAll();


        $this->render('marketing', array(
            'modelStatic' => $modelStatic,
            'modelDynamic' => $modelDynamic,
        ));
    }

    public function actionExpertise($page)
    {
        $this->layout='//layouts/expertise';
        $modelStatic = Staticpages::model()->findByAttributes(array('title' => $page));
        $modelDynamic = Expertise::model()->findAll();


        $this->render('expertise', array(
            'modelStatic' => $modelStatic,
            'modelDynamic' => $modelDynamic,
        ));
    }
}
