<?php

class ReviewsController extends AdminController {

    /**
     * This methog views all 
     */
    public function actionAll() {
        $reviews = Review::model()->findAll();
        $data = array(
            'reviews' => $reviews,
        );

        $this->render('all', $data);
    }
    
    
    /**
     * View one reviews
     * 
     * @param integer $id reviews ID
     */
    public function actionOne($id) {
        $reviews = Review::model()->findByPk($id);
        $data = array(
            'reviews' => $reviews,
        );
        $this->render('one', $data);
    }

    
    /**
     * 
     * view form add review and add new reviews in bd
     */
    public function actionCreate() {
        $model = new CreatereviewsForm();
        if (isset($_POST['CreatereviewsForm'])) {
            $model->attributes = $_POST['CreatereviewsForm'];
            if ($model->validate()) {
                $news = new Review();
                $news->title = $model->title;
                $news->author = $model->author;
                $news->description = $model->description;

                $news->save(false);

                $message = "Title: " . $news->title . "<br>";
                $message .= "Author: " . $news->author . "<br>";
                $message .= "Description: " . $news->description . "<br>";

                if (!Yii::app()->user->isGuest) {
                    $email = $this->getUserEmail(Yii::app()->user->id);
                    $name = $this->getUserName(Yii::app()->user->id);
                    $message .= "Add this reviews : " . $name . "<br>";
                    $sender = $this->sendMessageManager($email, "Add new reviews", $message);
                } else {
                    $sender = $this->sendMessageManager("example@gmail.com", "Add new reviews", $message);
                }
                if ($sender) {
                    Yii::app()->request->redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $this->render('create', array('model' => $model));
                }
            }
        }

        $this->render('create', array('model' => $model));
    }

    
    /**
     * Method return form for change reviews and save reviews
     * 
     * @param integer $id reviews ID
     */
    public function actionChange($id) {
        $reviews = Review::model()->findByPk($id);
        $model = new CreatereviewsForm();
        if (isset($_POST['CreatereviewsForm'])) {
            $model->attributes = $_POST['CreatereviewsForm'];
            if ($model->validate()) {
                $reviews->title = $model->title;
                $reviews->author = $model->author;
                $reviews->description = $model->description;
                
                $reviews->save();
                $message = "Title: " . $reviews->title . "<br>";
                $message .= "Author: " . $reviews->author . "<br>";
                $message .= "Description: " . $reviews->description . "<br>";

                if (!Yii::app()->user->isGuest) {
                    $email = $this->getUserEmail(Yii::app()->user->id);
                    $name = $this->getUserName(Yii::app()->user->id);
                    $message .= "Change this reviews : " . $name . "<br>";
                    $sender = $this->sendMessageManager($email, "Change new reviews", $message);
                } else {
                    $sender = $this->sendMessageManager("example@gmail.com", "Change new reviews", $message);
                }
            }
        }
        $data = array(
            'reviews' => $reviews,
            'model' => $model,
        );
        $this->render('change', $data);
    }

    /**
     * Delete reviews
     * 
     * @param integer this id reviews
     */
    public function actionDelete($id) {
        $reviews = Review::model()->findByPk($id);
        $reviews->delete();
        Yii::app()->request->redirect($_SERVER['HTTP_REFERER']);
    }

    
    /**
     * index view
     */
    public function actionIndex() {
        $this->render('index');
    }

    /**
     * Form search reviews TAG
     */
    public function actionSearchtag() {
        $this->render('searchtag');
    }
    
    /**
     * View result searh reviews tag
     */
    public function actionShowsearchtag() {
        $tagtext = $_POST['tag'];

        $tag = Tag::model()->find("tag_text=:tag", array(':tag' => $tagtext))->id;
        $prom = PromTagReview::model()->findAll("tag_id=:tag", array(":tag" => $tag));
        foreach ($prom as $promtag) {
            $reviews[] = Review::model()->findByPk($promtag->review_id);
        }
        $data = array(
            'reviews' => $reviews,
        );

        $this->render('rezsearchtag', $data);
    }

    
    /**
     * view form search reviews
     */
    public function actionSearchtext() {
        $this->render('searchtext');
    }

    /**
     * 
     * 
     * view result search reviews 
     */
    public function actionShowsearchtext() {
        $text = $_POST['text'];
        $text = '%' . $text . '%';
        $reviews = Yii::app()->db->createCommand()
                ->select('*')
                ->from('review')
                ->where("title LIKE :text OR description LIKE :text", array(':text' => $text))
                ->queryAll();

        $data = array(
            'reviews' => $reviews,
        );

        $this->render('rezsearchtag', $data);
    }

}
