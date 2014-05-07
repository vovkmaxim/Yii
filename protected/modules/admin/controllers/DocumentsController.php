<?php

class DocumentsController extends AdminController
{

    public function actionIndex() {
        $docList = Documents::model()->findAll(array('order' => 'position'));
        $this->render('index', array('docList' => $docList));
    }
    
    public function actionAdd() {
        $request = Yii::app()->request;
        $viewVars = array('title' => '', 'description' => '');
        $doc = new Documents(); 
        if ($request->isPostRequest) {
            $title = trim($request->getPost('title'));
            $description = trim($request->getPost('description'));
            if ($title == '') {
                $error = 'Введите название';
                $viewVars['error'] = $error;
                $viewVars['description'] = $description;
            }
            else {
				
				$viewVars['title'] = $title;
				$viewVars['description'] = $description;
				
                $maxPosition = Yii::app()->db->createCommand()
                    ->select('MAX(position)')
                    ->from('documents')
                    ->queryScalar();
                $doc->title = $title;
                $doc->description = $description;
                $doc->position = $maxPosition + 1;           

				if (isset($_POST['Documents'])) {
					$doc->attributes = $_POST['Documents'];
					$doc->file=CUploadedFile::getInstance($doc,'file');
					if ($doc->save(false)) {
						$doc->file->saveAs('documents/' . $doc->file->getName());
						
						Yii::app()->user->setFlash('success', 'Запись добавлена успешно!');
						header('Refresh:2; url=' . Yii::app()->getBaseUrl(true) . '/admin/documents');
					}
				}
            }
        }
        
        $this->render('add', array('model' => $doc, 'value' => $viewVars));
    }
    
    public function actionEdit($id) {
        $id = (int)$id;
        if ($id  == 0) {
            throw new CHttpException(404,'Неправильный запрос');
        }
        $request = Yii::app()->request;
        $doc = Documents::model()->findByPk($id);
        
        $oldFileFileName = 'documents/'.$doc->file;
		$oldFile = $doc->file; 
        
        if (!$doc) {
            throw new CHttpException(404,'Неправильный запрос');
        }
        $viewVars = array('title' => $doc->title,   'description' => $doc->description);
        if ($request->isPostRequest) {
            $title = trim($request->getPost('title'));
            $description = trim($request->getPost('description'));
            
            if ($title == '') {
                $error = 'Введите название';
                $viewVars['error'] = $error;
                $viewVars['title'] = $title;
                $viewVars['description'] = $description;
            }
            else {
                $doc->title = $title;
                $doc->description = $description;
                
                if (isset($_POST['Documents'])) {
				
					$doc->attributes = $_POST['Documents'];				
					
					$post_file = CUploadedFile::getInstance($doc,'file');
					if(!empty($post_file)){
						$doc->file = CUploadedFile::getInstance($doc,'file');
					}
					
					if (is_object($doc->file)) {
						$doc->file->saveAs('documents/' . $doc->file->getName());
						if (is_file($oldFileFileName)) {
							unlink($oldFileFileName);
						}
					}				
					
					$doc->update();
					$viewVars['result'] = 'Документ успешно сохранена';
					header('Refresh:2; url=' . Yii::app()->getBaseUrl(true) . '/admin/documents');
					
				}
            }
        }
        $this->render('edit', array('model' => $doc, 'value' => $viewVars));
    }
    
    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $doc = Documents::model()->findByPk($id);
        $doc->delete();
        header('Location:' . Yii::app()->getBaseUrl(true) . '/admin/documents');
        exit();
    }
    
    public function actionSaveOrder() {
        $request = Yii::app()->request;
        if ($request->isAjaxRequest) {
            $order = $request->getQuery('id');
            fb($order);
            foreach ($order as $id => $item) {
                Yii::app()->db->createCommand()->update('documents', array('position' => $id), 'id = ' . $item);
            }
            echo CJavaScript::jsonEncode(array('order' => $order));
            Yii::app()->end();
        } else {
            throw new CHttpException(404, 'Неправильный запрос');
        }
    }
}
