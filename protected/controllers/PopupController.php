<?php

class PopupController extends Controller
{
    public $layout = 'clear';

    public function actionDocumentsAll($key = '')
    {
        $file = Documents::model()->findAll();
        $this->render('documentsall', array(
            'files' => $file,
        ));
    }
}
