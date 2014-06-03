<?php

class UserController extends AdminController {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionLogin() {
        $model = new MyLoginForm();
        if (isset($_POST['MyLoginForm'])) {
            if (Yii::app()->user->isGuest) {
                
//------------------------------------------------------------------------------                
//------------------------------------------------------------------------------                
                
                $model->attributes = $_POST['MyLoginForm']; 
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
                        
//                        print_r("<pre>");
//                        print_r($model->password);
//                        print_r("<pre>");die();
                        
                
//------------------------------------------------------------------------------                        
//------------------------------------------------------------------------------                        
                        
            } else {
                throw new CException('Вы уже в системе!!');
            }
        }
        $this->render('login', array('model' => $model));
    }

    public function actionLogout() {
        Yii::app()->user->logout();
	$this->redirect(Yii::app()->homeUrl);
    }

    public function actionRegistration() {
        $model = new RegistrationForm();
        if (isset($_POST['RegistrationForm'])) {
            $user = new Apiusers();
            if (!Yii::app()->user->isGuest) {
                throw new CException('Вы уже зарегистрированны!');
            } else {

                $model->attributes = $_POST['RegistrationForm'];
                if ($model->validate()) {
                    if (Apiusers::model()->count("username = :login", array(':login' => $model->username))) {
                        $model->addError('username', 'That name is already taken');
                        $this->render('registration', array('model' => $model));
                    } else {
                        $user->username = $model->username;
                        $user->password = crypt($model->password);
                        $user->email = $model->email;
                        $user->save(false);

                        $this->render('registration', array('model' => $model));
                    }
                } else {
                    $this->render('registration', array('model' => $model));
                }
            }
        } else {
            $this->render('registration', array('model' => $model));
        }
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
