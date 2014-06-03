<?php

class RubricController extends AdminController {

    /**
     * Views all Rubric
     * 
     */
    public function actionAll() {
        $rubric = Rubric::model()->findAll();
        $data = array(
            'rubric' => $rubric,
        );
        $this->render('all', $data);
    }

    
    /**
     * Views form for change Rubric
     * @param integer $id Rubric ID
     */
    public function actionChange($id) {
        $rubric = Rubric::model()->findByPk($id);
        $rubrics = Rubric::model()->findAll();
        $model = new RubricForm();
        if (isset($_POST['RubricForm'])) {
            $model->attributes = $_POST['RubricForm'];
            if ($model->validate()) {
                $rubric->name = $model->name;
                $rubric->root_id = $_POST['root_rubric'];
                $rubric->description = $model->description;
                $rubric->save(false);

                $message = "Title: " . $rubric->name . "<br>";
                $message .= "Description: " . $rubric->description . "<br>";

                if (!Yii::app()->user->isGuest) {
                    $email = $this->getUserEmail(Yii::app()->user->id);
                    $name = $this->getUserName(Yii::app()->user->id);
                    $message .= "CHANGE this Rubric : " . $name . "<br>";
                    $sender = $this->sendMessageManager($email, "Change Rubric", $message);
                } else {
                    $sender = $this->sendMessageManager("example@gmail.com", "Change Rubric", $message);
                }
                if ($sender) {
                    $this->render('change', array(
                        'rubrics' => $rubrics,
                        'rubric' => $rubric,
                        'model' => $model,
                    ));
                } else {
                    $this->render('change', array(
                        'rubrics' => $rubrics,
                        'rubric' => $rubric,
                        'model' => $model,
                    ));
                }
            }
        }


        $this->render('change', array(
            'rubrics' => $rubrics,
            'rubric' => $rubric,
            'model' => $model,
        ));
    }

    
    /**
     * 
     * View form for create new Rubric
     * 
     */
    public function actionCreate() {
        $model = new RubricForm();
        if (isset($_POST['RubricForm'])) {
            $model->attributes = $_POST['RubricForm'];
            if ($model->validate()) {
                $rubric = new Rubric();
                $rubric->name = $model->name;
                $rubric->root_id = $_POST['root_rubric'];
                $rubric->description = $model->description;
                $rubric->save(false);

                $message = "Title: " . $rubric->name . "<br>";
                $message .= "Description: " . $rubric->description . "<br>";

                if (!Yii::app()->user->isGuest) {
                    $email = $this->getUserEmail(Yii::app()->user->id);
                    $name = $this->getUserName(Yii::app()->user->id);
                    $message .= "add new Rubric : " . $name . "<br>";
                    $sender = $this->sendMessageManager($email, "ADD Rubric", $message);
                } else {
                    $sender = $this->sendMessageManager("example@gmail.com", "ADD Rubric", $message);
                }
            }
        }

        $rubric = Rubric::model()->findAll();

        $this->render('create', array(
            'rubric' => $rubric,
            'model' => $model,
        ));
    }

    /**
     * 
     * Delete Rubric to ID
     * 
     * @param integer $id Rubric ID
     */
    public function actionDelete($id) {
        $rubric = Rubric::model()->findByPk($id);
        $rubric->delete();
        Yii::app()->request->redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * 
     * Views Index action
     * 
     */
    public function actionIndex() {
        $this->render('index');
    }

}
