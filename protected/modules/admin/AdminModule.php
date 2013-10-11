<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
        $this->layoutPath = Yii::getPathOfAlias('admin.views.layouts');
        $this->layout = 'main';
        $this->publishCssFile('admin.assets', '/bootstrap/css/bootstrap.min.css');
        $this->publishCssFile('admin.assets', '/bootstrap/css/bootstrap-responsive.min.css');
        $this->publishCssFile('admin.assets', '/styles.css');
        $this->publishCssFile('admin.assets', '/DT_bootstrap.css');

        $this->publishJsFile('admin.assets', '/vendors/modernizr-2.6.2-respond-1.1.0.min.js');
        $this->publishJsFile('admin.assets', '/vendors/jquery-1.9.1.min.js');
        $this->publishJsFile('admin.assets', '/vendors/jquery-ui-1.10.3.js');
        $this->publishJsFile('admin.assets', '/bootstrap/js/bootstrap.js');
        $this->publishJsFile('admin.assets', '/vendors/datatables/js/jquery.dataTables.min.js');
        $this->publishJsFile('admin.assets', '/scripts.js');
        $this->publishJsFile('admin.assets', '/DT_bootstrap.js');
        Yii::app()->errorHandler->errorAction = '/admin/default/error';
	}

    public function publishCssFile($scope, $path) {
        Yii::app()->clientScript->registerCssFile(
            CHtml::asset(
                Yii::getPathOfAlias($scope). $path
            ));
    }

    public function publishJsFile($scope, $path) {
        Yii::app()->clientScript->registerScriptFile(
            CHtml::asset(
                Yii::getPathOfAlias($scope). $path
            ));
    }
	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
