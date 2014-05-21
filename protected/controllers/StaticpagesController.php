<?php

class StaticpagesController extends Controller
{
	public $layout = '//layouts/static';

	public function actionIndex($page)
	{
        if (in_array($page, array(
                                'Contact_us',       //work
                                'Success_Stories',  //work
                                'Vacancies',        //work
                                'Management',       //work
                                'Marketing',
                                'Expertise',        //don`t work

                            )
            ))
           {
            $this->redirect(Yii::app()->request->baseUrl.'/staticpages/'.$page);
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

    public function actionContact_us()
    {
        $this->layout='//layouts/contactus';
        $modelContactdata = Contactdata::model()->find();
        $modelContactus = Contactus::model()->findAll();


        $this->render('contactus', array(
            'modelContactdata' => $modelContactdata,
            'modelContactus' => $modelContactus,
        ));
    }

    public function actionSuccess_Stories()
    {
        $this->layout='//layouts/successstories';
        $modelStatic = Staticpages::model()->findByAttributes(array('title' => 'Success_Stories'));
        $modelDynamic = Successstories::model()->findAll();


        $this->render('successstories', array(
            'modelStatic' => $modelStatic,
            'modelDynamic' => $modelDynamic,
        ));
    }

    public function actionVacancies()
    {
        $this->layout='//layouts/vacancies';
        $modelStatic = Staticpages::model()->findByAttributes(array('title' => 'Vacancies'));
        $modelDynamic = Vacancies::model()->findAll();


        $this->render('vacancies', array(
            'modelStatic' => $modelStatic,
            'modelDynamic' => $modelDynamic,
        ));
    }

    public function actionManagement()
    {
        $this->layout='//layouts/management';
        $modelStatic = Staticpages::model()->findByAttributes(array('title' => 'Management'));
        $modelDynamic = Management::model()->findAll();


        $this->render('management', array(
            'modelStatic' => $modelStatic,
            'modelDynamic' => $modelDynamic,
        ));
    }

    public function actionMarketing()
    {
        $this->layout='//layouts/marketing';
        $modelStatic = Staticpages::model()->findByAttributes(array('title' => 'Marketing'));
        $modelDynamic = Documents::model()->findAll();


        $this->render('marketing', array(
            'modelStatic' => $modelStatic,
            'modelDynamic' => $modelDynamic,
        ));
    }

    public function actionExpertise()
    {
        $this->layout='//layouts/expertise';
        $modelStatic = Staticpages::model()->findByAttributes(array('title' => 'Expertise'));
        $modelProjects = Projects::model()->findAll();
        $modelTech = Tech::model()->findAll();


        $this->render('expertise', array(
            'modelStatic' => $modelStatic,
            'modelProjects' => $modelProjects,
            'modelTech' => $modelTech,
        ));
    }
}
