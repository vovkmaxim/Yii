<?php

class AdminController extends Controller
{


    public $active;

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('deny',
                'actions'=>array('index', 'edit', 'delete', 'add'),
                'users'=>array('?'),
            ),
        );
    }


}