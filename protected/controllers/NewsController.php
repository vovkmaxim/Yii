<?php

class NewsController extends AdminController {
    
    /**
     * 
     * View all News
     * 
     */
    public function actionAll() {

        $news = News::model()->findAll();
        foreach ($news as $new) {
            $news1 = array(
                'id' => $new->id,
                'rubric_id' => $new->rubric_id,
                'description' => $new->description,
                'title' => $new->title,
                'author' => $new->author,
            );
            $data[] = $news1;
        }

        $news = array(
            'news' => $data,
        );

        $this->render('all', $news);
    }

    
    /**
     * Method view one news in ID this news
     * 
     * @param integer $id news ID
     */
    public function actionOne($id) {

        $news = News::model()->findByPk($id);
        $data = array(
            'news' => $news,
        );
        $this->render('one', $data);
    }

    
    /**
     * Delete News to ID
     * 
     * @param integer $id News ID
     */
    public function actionDelete($id) {

        $news = News::model()->findByPk($id);
        $news->delete();
        Yii::app()->request->redirect($_SERVER['HTTP_REFERER']);
    }

    
    /**
     * Change News to this ID
     * view form change
     * 
     * @param integer $id News ID
     */
    public function actionChange($id) {

        $news = News::model()->findByPk($id);
        $model = new CreatenewsForm();
        if (isset($_POST['CreatenewsForm'])) {
            $model->attributes = $_POST['CreatenewsForm'];
            if ($model->validate()) {
                $news->title = $model->title;
                $news->author = $model->author;
                $news->description = $model->description;
                $news->rubric_id = $_POST['rubric_id'];

                $news->save(false);
                $message = "Title: " . $news->title . "<br>";
                $message .= "Author: " . $news->author . "<br>";
                $message .= "Description: " . $news->description . "<br>";

                if (!Yii::app()->user->isGuest) {
                    $email = $this->getUserEmail(Yii::app()->user->id);
                    $name = $this->getUserName(Yii::app()->user->id);
                    $message .= "CHANGE this news : " . $name . "<br>";
                    $sender = $this->sendMessageManager($email, "CHANGE NEWS", $message);
                } else {
                    $sender = $this->sendMessageManager("example@gmail.com", "Add NEWS", $message);
                }
                if ($sender) {
                    Yii::app()->request->redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $this->render('create', array('model' => $model));
                }
            }
        }

        $data = array(
            'news' => $news,
            'model' => $model,
        );

        $this->render('change', $data);
    }

    
    /**
     * Method create new News view form for create
     */
    public function actionCreate() {

        $model = new CreatenewsForm();
        if (isset($_POST['CreatenewsForm'])) {
            $model->attributes = $_POST['CreatenewsForm'];
            if ($model->validate()) {
                $news = new News();
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
                    $message .= "CHANGE this news : " . $name . "<br>";
                    $sender = $this->sendMessageManager($email, "Add NEWS", $message);
                } else {
                    $sender = $this->sendMessageManager("example@gmail.com", "CHANGE NEWS", $message);
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
     * index views
     */
    public function actionIndex() {

        $this->render('index');
    }

    
    /**
     * Views search form for tag in news 
     * 
     * @param string $error error message
     */
    public function actionSearchtag($error = NULL) {
        $this->render('searchtag', $error);
    }

    
    /**
     * 
     * View result search news to tag
     * 
     */
    public function actionShowsearchtag() {
        $tagtext = $_POST['tag'];

        $tag = Tag::model()->find("tag_text=:tag", array(':tag' => $tagtext))->id;
        $prom = PromTagNew::model()->findAll("tag_id=:tag", array(":tag" => $tag));
        foreach ($prom as $promtag) {
            $news[] = News::model()->findByPk($promtag->news_id);
        }
        $data = array(
            'news' => $news,
        );
        $this->render('rezsearchtag', $data);
    }

    
    /**
     * 
     * Search news to test views form for this action
     * 
     */
    public function actionSearchtext() {
        $this->render('searchtext');
    }

    
    /**
     * Views result search text in news
     * 
     * 
     */
    public function actionShowsearchtext() {
        $text = $_POST['text'];
        $text = '%' . $text . '%';
        $news = Yii::app()->db->createCommand()
                ->select('*')
                ->from('news')
                ->where("title LIKE :text OR description LIKE :text", array(':text' => $text))
                ->queryAll();

        $data = array(
            'news' => $news,
        );
        $this->render('rezsearchtag', $data);
    }

}
