<?php

class StaticpagesController extends AdminController
{
    public function init() {
        $this->active = 'staticpages';
    }

    public function actionIndex() {
        $staticpagesList = staticpages::model()->findAll(array('order' => 'ID'));
        $this->render('index', array('staticpagesList' => $staticpagesList));
    }

    public function actionAdd() {

        $request = Yii::app()->request;
        $viewVars = array('text' => '');
        if ($request->isPostRequest) {

            $title = trim($request->getPost('title'));
            $text = $request->getPost('Staticpages');
            $text = trim($text['text']);

            $activelink = trim($request->getPost('activelink'));
            $etc = trim($request->getPost('etc'));
            if ($title == '') {
                $error = 'Введите название';
                $viewVars['error'] = $error;
                $viewVars['text'] = $text;
            }
            else {
                $staticpage = new Staticpages();

                $staticpage->title = $title;
                $staticpage->text = $text;
                $staticpage->activelink = $activelink;
                $staticpage->etc = $etc;
                $staticpage->insert();
                $viewVars['result'] = 'Страница успешно добавлена';
                header('Refresh:2; url=' . Yii::app()->getBaseUrl(true) . '/admin/staticpages');
            }
        }
        $this->render('add', $viewVars);
    }

    public function actionEdit($id) {
        $id = (int)$id;
        if ($id  == 0) {
            throw new CHttpException(404,'Неправильный запрос');
        }
        $request = Yii::app()->request;
        $staticpage = Staticpages::model()->findByPk($id);
        if (!$staticpage) {
            throw new CHttpException(404,'Неправильный запрос');
        }
        $viewVars = array(
                          'title' => $staticpage->title,
                          'text' => $staticpage->text,
                          'activelink' => $staticpage->activelink,
                          'etc' => $staticpage->etc
                    );
        if ($request->isPostRequest) {
            $title = trim($request->getPost('title'));
            $text = $request->getPost('Staticpages');
            $text = trim($text['text']);
            $activelink = trim($request->getPost('activelink'));
            $etc = trim($request->getPost('etc'));
            if ($title == '') {
                $error = 'Введите название';
                $viewVars['error'] = $error;
                $viewVars['title'] = $title;
                $viewVars['text'] = $text;
                $viewVars['activelink'] = $activelink;
                $viewVars['etc'] = $etc;
            }
            else {
                $staticpage->title = $title;
                $staticpage->text = $text;
                $staticpage->activelink = $activelink;
                $staticpage->etc = $etc;
                $staticpage->update();
                $viewVars['result'] = 'Страница успешно сохранена';
                header('Refresh:2; url=' . Yii::app()->getBaseUrl(true) . '/admin/staticpages');
            }
        }
        $this->render('edit', $viewVars);
    }



    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $staticpage = Staticpages::model()->findByPk($id);
        $staticpage->delete();
        header('Location:' . Yii::app()->getBaseUrl(true) . '/admin/staticpages');
        exit();

    }

    public function actionSaveOrder() {
        $request = Yii::app()->request;
        if ($request->isAjaxRequest) {
            $order = $request->getQuery('id');
            fb($order);
            foreach ($order as $id => $item) {
                Yii::app()->db->createCommand()->update('staticpages', array('position' => $id), 'id = ' . $item);
            }
            echo CJavaScript::jsonEncode(array('order' => $order));
            Yii::app()->end();
        } else {
            throw new CHttpException(404, 'Неправильный запрос');
        }

    }
    public function filters() {
        return array(
        //... probably other filter specifications ...
        array('ext.yiibooster..filters.BootstrapFilter - delete')
    );
}
}