<?php

class TechController extends AdminController
{
    public function init() {
        $this->active = 'tech';
    }
    public function actionIndex() {
        $techModel = new Tech();
        $techList = $techModel->findAll();
        $this->render('index', array('techList' => $techList));
    }

    public function actionAdd() {
        $request = Yii::app()->request;
        $viewVars = array('description' => '');
        if ($request->isPostRequest) {
            $title = trim($request->getPost('title'));
            $description = trim($request->getPost('description'));
            $list = $request->getPost('list');
            if ($title == '') {
                $viewVars['error'] = 'Введите название';
                $viewVars['description'] = $description;
                $viewVars['list'] = $list;

            } else {
                $tech = new Tech();
                $tech->title = $title;
                $tech->description = $description;
                $tech->url = self::str2url($tech->title);
                $tech->insert();
                if (is_array($list)) {
                    foreach ($list as $id => $element) {
                        if (trim($element) != '') {
                            $insertList = new TechList();
                            $insertList->title = $element;
                            $insertList->tech_id = $tech->id;
                            $insertList->position = $id;
                            $insertList->insert();
                        }
                    }
                }

                $viewVars['result'] = 'Технология успешно добавлена';
                header('Refresh:2; url=' . Yii::app()->getBaseUrl(true) . '/admin/tech');
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
        $tech = Tech::model()->findByPk($id);
        if (!$tech) {
            throw new CHttpException(404,'Неправильный запрос');
        }
        $techList = TechList::model()->findAllByAttributes(array('tech_id' => $tech->id));
        $list = array();
        foreach ($techList as $el) {
            $list[] = $el->title;
        }
        $viewVars = array('title' => $tech->title, 'description' => $tech->description, 'techList' => $list);
        if ($request->isPostRequest) {
            $title = trim($request->getPost('title'));
            $description = trim($request->getPost('description'));
            $list = $request->getPost('list');
            if ($title == '') {
                $viewVars['error'] = 'Введите название';
                $viewVars['title'] = $title;
                $viewVars['description'] = $description;
                $viewVars['techList'] = $list;


            } else {
                $tech->title = $title;
                $tech->description = $description;
                $tech->url = self::str2url($tech->title);
                $tech->save();
                TechList::model()->deleteAllByAttributes(array('tech_id' => $id));
                if (is_array($list)) {
                    foreach ($list as $id => $element) {
                        if (trim($element) == '') {
                            continue;
                        }
                        $insertElement = new TechList();
                        $insertElement->title = $element;
                        $insertElement->tech_id = $tech->id;
                        $insertElement->position = $id;
                        $insertElement->insert();
                    }
                }
                $viewVars['result'] = 'Технология успешно изменена';
                header('Refresh:2; url=' . Yii::app()->getBaseUrl(true) . '/admin/tech');
            }
        }
        $this->render('edit', $viewVars);
    }
    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $tech = Tech::model()->findByPk($id);
        $tech->delete();
        header('Location:' . Yii::app()->getBaseUrl(true) . '/admin/tech');
        exit();
    }
}