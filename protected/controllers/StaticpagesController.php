<?php

class StaticpagesController extends Controller
{
    public $layout = '//layouts/static';

    public function loadModel($id)
    {
        $model=Contactus::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function actionIndex($page)
    {
        if (in_array($page, array(
                'Contact_us',       //work
                'Success_Stories',  //work
                'Vacancies',        //work
                'Management',       //work
                'Marketing',        //work
                'Expertise',        //don`t work

            )
        ))
        {
            $this->redirect(Yii::app()->request->baseUrl.'/staticpages/'.$page);
            Yii::app()->end();
        }
        $model = Staticpages::model()->findByAttributes(array('title' => $page));

        if ($model) {
            $this->pageTitle = $page;
            $this->render('index', array(
                'content' => $model->text,

            ));
            Yii::app()->end();
        }
        $this->redirect(Yii::app()->request->baseUrl);
    }

    public function actionContact_us()
    {
        $this->layout='//layouts/page';
        $modelContactdata = Contactdata::model()->find();
        $modelContactus = new Contactus;
        $this->pageTitle = 'Contact Us';

        if (isset($_POST['Contactus'])) {
            $modelContactus->attributes = $_POST['Contactus'];
            if($modelContactus->save()) {
                Yii::app()->user->setFlash('success',"Your question has been submitted");

                $this->redirect(Yii::app()->request->baseUrl.'Contact_us/#ask');
            }
        }

        Yii::app()->clientScript->registerScript(
            'myHideEffect',
            '$(".info").animate({opacity: 1.0}, 2000).fadeOut("slow");',
            CClientScript::POS_READY
        );
        $this->render('contactus', array(
            'modelContactdata' => $modelContactdata,
            'modelContactus' => $modelContactus,
        ));


    }

    public function actionSuccess_Stories()
    {
        $this->layout='//layouts/page';
        $modelStatic = Staticpages::model()->findByAttributes(array('title' => 'Success_Stories'));
        $modelDynamic = Successstories::model()->findAll();
        $this->pageTitle = 'Success Stories';
        $dataProvider=new CActiveDataProvider('Successstories');

        $this->render('successstories', array(
            'modelStatic' => $modelStatic,
            'modelDynamic' => $modelDynamic,
            'dataProvider'=>$dataProvider,
        ));
    }

    public function actionVacancies()
    {
        $this->layout='//layouts/page';
        $modelStatic = Staticpages::model()->findByAttributes(array('title' => 'Vacancies'));
        $modelDynamic = Vacancies::model()->findAll();
        $this->pageTitle = 'Vacancies';


        $this->render('vacancies', array(
            'modelStatic' => $modelStatic,
            'modelDynamic' => $modelDynamic,
        ));
    }

    public function actionManagement()
    {
        $this->layout='//layouts/page';
        $modelStatic = Staticpages::model()->findByAttributes(array('title' => 'Management'));
        $modelDynamic = Management::model()->findAll();
        $this->pageTitle = 'Management';


        $this->render('management', array(
            'modelStatic' => $modelStatic,
            'modelDynamic' => $modelDynamic,
        ));
    }

    public function actionMarketing()
    {
        $this->layout='//layouts/page';
        $modelStatic = Staticpages::model()->findByAttributes(array('title' => 'Marketing'));
        $modelDynamic = Documents::model()->findAll();
        $this->pageTitle = 'Marketing Documents';


        $this->render('marketing', array(
            'modelStatic' => $modelStatic,
            'modelDynamic' => $modelDynamic,
        ));
    }

    public function actionExpertise()
    {
        $this->layout='//layouts/page';
        $modelStatic = Staticpages::model()->findByAttributes(array('title' => 'Expertise'));
        $modelProjects = Projects::model()->findAll();
        $modelTech = Tech::model()->findAll(array('limit' => 5));
        $this->pageTitle = 'Expertise';


        $this->render('expertise', array(
            'modelStatic' => $modelStatic,
            'modelProjects' => $modelProjects,
            'modelTech' => $modelTech,
        ));
    }
}
