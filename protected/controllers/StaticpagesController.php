<?php

class StaticpagesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/static';

	/**
	 * Lists all models.
	 */
	public function actionIndex($page)
	{
        $model = Staticpages::model()->findByAttributes(array('title' => $page));
        if ($model) {
            $this->render('index', array(
                'content' => $model->text,
            ));
            Yii::app()->end();
        }
        $this->redirect(Yii::app()->request->baseUrl);
	}
}
