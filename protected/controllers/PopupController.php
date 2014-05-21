<?php

class PopupController extends Controller
{
    public $layout = 'clear';

    public function actionDocumentsAll()
    {
        $file = Documents::model()->findAll();
        $this->render('documentsall', array(
            'files' => $file,
        ));
    }
}
