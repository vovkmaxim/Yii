<?php

class ProjectsController extends AdminController
{
    public function init() {
        $this->active = 'projects';
    }

    public function actionIndex() {
        $projectsModel = new Projects();
        $projectsList = $projectsModel->with(
                    array(
                        'tech' => array(
                            'select' => array('title')
                        )
                    ))->findAll(array('order' => 't.position'));
        $this->render('index', array('projectsList' => $projectsList));
    }

    public function actionAdd() {
        $request = Yii::app()->request;
        $techList = Tech::model()->findAll();
        $viewVars = array('description' => '', 'desiredSkills' => '', 'techList' => $techList, 'tech' => array());
        if ($request->isPostRequest) {
            //name and description loading
            $title = trim($request->getPost('title'));
            $description = trim($request->getPost('description'));
            $tech = (array)$request->getPost('tech');

            //loaded avatar preview
            $avatar = (!empty($_FILES['avatar'])) ? $_FILES['avatar'] : array();
            //previously loaded avatar preview
            $postedAvatarPreview = $request->getPost('postedavatar', '');
            //previously loaded previews
            $postedPreviews = (array)$request->getPost('previews');

            $avatarSize = false;
            if (!empty($avatar['tmp_name'])) {
                $avatarSize = getimagesize($avatar['tmp_name']);
            }
            $errors = array();

            if (!$avatarSize && $postedAvatarPreview == '') {
                $errors['preview'] = 'Для проекта нужно загрузить картинку-превью размером 400*250';
            }
            if ($avatarSize) {
                if ($avatarSize[0] != ProjectImage::PREVIEW_WIDTH || $avatarSize[1] != ProjectImage::PREVIEW_HEIGHT) {
                    $errors['preview'] = 'Превью должно иметь размер ' . ProjectImage::PREVIEW_WIDTH . ' на ' . ProjectImage::PREVIEW_HEIGHT;
                }
            }

            $img = new ProjectImage();
            if ($title == '') {
                $errors['title'] = 'Введите название';
            }
            if (!$tech) {
                $errors['tech'] = 'Выберите технологию';
            }


            if (count($errors) > 0) {
                if (!isset($errors['preview'])) {
                    $img->loadTitlePreview($postedAvatarPreview, $avatar);
                } else {
                    $img->cleanTitlePreview($postedAvatarPreview);
                }
                $displayAvatar = $img->getTitlePreview();
                if ($displayAvatar) {
                    $viewVars['avatar'] = $displayAvatar;
                }
                $previews = array();
                $images = $_FILES['img'];
                $img->cleanPreviews($postedPreviews, false);
                $img->makePreview($images);
                $previews = $img->getPreviews();
                if (count($previews) > 0) {
                    $viewVars['previews'] = $previews;
                }
                $viewVars['description'] = $description;
                $viewVars['tech'] = $tech;
                $viewVars['errors'] = $errors;

            } else {

                $project = new Projects();
                $project->title = $title;
                $project->description = $description;
                $project->tech = Tech::model()->findAllByPk($tech);
                $project->save();

                $images = empty($_FILES['img']) ? array() : $_FILES['img'];
                $img->cleanPreviews($postedPreviews, true);

                $img->loadImages($images, $project->id);
                $img->loadAvatar($avatar, $project->id);
                $viewVars['result'] = 'Проект успешно добавлен';
                header('Refresh:2; url=' . Yii::app()->getBaseUrl(true) . '/admin/projects');
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
        $project = Projects::model()->findByPk($id);
        if (!$project) {
            throw new CHttpException(404, 'Неправильный запрос');
        }

        $techList = Tech::model()->findAll();
        $projectPics = $project->projectsPics;
        $projectImages = array();
        foreach ($projectPics as $pic) {
            if ($pic->preview == 0) {
                $projectImages[] = $pic;
            } else {
                $projectBaseAvatar = $pic;
            }
        }

        $img = new ProjectImage();
        $techs = $project->tech;
        $tech = self::getPrimaryKeys($techs);

        $viewVars = array(
                    'title' => $project->title,
                    'description' => $project->description,
                    'techList' => $techList,
                    'tech' => $tech,
        );

        if ($request->isPostRequest) {

            $title = trim($request->getPost('title'));
            $description = trim($request->getPost('description'));
            $tech = (array)$request->getPost('tech');
            $postedPreviews = (array)$request->getPost('previews');
            $avatar = $_FILES['avatar'];
            $avatarSize = false;
            if ($avatar['tmp_name']) {
                $avatarSize = getimagesize($avatar['tmp_name']);
            }
            $errors = array();
            if ($avatarSize) {
                if ($avatarSize[0] != ProjectImage::PREVIEW_WIDTH || $avatarSize[1] != ProjectImage::PREVIEW_HEIGHT) {
                    $errors['preview'] = 'Превью должно иметь размер ' . ProjectImage::PREVIEW_WIDTH . ' на ' . ProjectImage::PREVIEW_HEIGHT;
                }
            } else {
               $errors['preview'] = 'Для проекта нужно загрузить картинку-превью размером ' . ProjectImage::PREVIEW_WIDTH . ' на ' . ProjectImage::PREVIEW_HEIGHT;
            }

            if ($title == '') {
                $errors['title'] = 'Введите название';
            }
            if (count($tech) == 0) {
                $errors['tech'] = 'Выберите технологию';
            }

            if (count($errors) > 0) {
                $postedAvatar = $request->getPost('posted_avatar');
                $viewVars['errors'] = $errors;
                $viewVars['title'] = $title;
                $viewVars['description'] = $description;
                $viewVars['tech'] = $tech;
                if (!isset($errors['preview'])) {
                    $img->makeTitlePreview($avatar, $postedAvatar);
                }
                $projectAvatar = $img->getTitlePreview();
                if ($projectAvatar == '') {
                    $projectAvatar = $projectBaseAvatar;
                }
                $images = $_FILES['img'];
                $previews = array();
                $img->cleanPreviews($postedPreviews, false);
                $img->makePreview($images);
                $previews = $img->getPreviews();
                if (count($previews) > 0) {
                    $viewVars['previews'] = $previews;
                }
            } else {
                $project->title = $title;
                $project->description = $description;
                $project->tech = Tech::model()->findAllByPk($tech);
                $project->save();
                $images = empty($_FILES['img']) ? array() : $_FILES['img'];


                $img->loadAvatar($avatar, $project->id);
                $img->loadImages($images, $project->id);
                $viewVars['result'] = 'Проект успешно изменен';
                header('Refresh:1; url=' . Yii::app()->getBaseUrl(true) . '/admin/projects');

            }
        }
        $viewVars['pics'] = $projectImages;
        if (isset($projectAvatar)) {
            $viewVars['avatar'] = $projectAvatar;
        } elseif (isset($projectBaseAvatar)) {
            $viewVars['avatar'] = $projectBaseAvatar;
        }


        $this->render('edit', $viewVars);
    }

    public function actionDeletePreview() {
        $request = Yii::app()->request;
        if ($request->isAjaxRequest) {
            $id = $request->getPost('id');
            $fileName = 'preview' . DIRECTORY_SEPARATOR . md5(session_id()) . DIRECTORY_SEPARATOR . base64_decode($id);
            if (is_file($fileName)) {
                unlink($fileName);
                echo CJavaScript::jsonEncode(array('result' => 'OK'));
                Yii::app()->end();
            } else {
                echo CJavaScript::jsonEncode(array('error' => 'No file'));
                Yii::app()->end();
            }
        }
    }

    public function actionDeletePic() {
        $request = Yii::app()->request;
        if ($request->isAjaxRequest) {
            $pictureId = $request->getPost('pic_id');
            $modelPic = ProjectsPics::model()->findByPk($pictureId);
            if (empty($modelPic->id)) {
                echo CJavaScript::jsonEncode(array('error' => 'No file'));
                Yii::app()->end();
            } else {
                $explodePicUrl = explode('/', $modelPic->url);
                $filePic = $explodePicUrl[count($explodePicUrl) - 1];
                $fileName = 'pics' . DIRECTORY_SEPARATOR . $modelPic->project_id . DIRECTORY_SEPARATOR . $filePic;
            }


            if (is_file($fileName)) {
                unlink($fileName);
                $modelPic->delete();
                echo CJavaScript::jsonEncode(array('result' => 'OK'));
                Yii::app()->end();
            } else {
                echo CJavaScript::jsonEncode(array('error' => 'No file'));
                Yii::app()->end();
            }
        }
    }
    public function actionDelete($id) {
        $id = (int)$id;
        if ($id == 0) {
            throw new CHttpException(404, 'Invalid request');
        }
        $project = Projects::model()->findByPk($id);
        $projectsPics = $project->projectsPics;
        if ($projectsPics) {
            foreach ($projectsPics as $pic) {
                if (is_file($_SERVER['DOCUMENT_ROOT'] . $pic->url)) {
                    unlink ($_SERVER['DOCUMENT_ROOT'] . $pic->url);
                }
            }
        }
        $project->delete();
        header('Location:' . Yii::app()->getBaseUrl(true) . '/admin/projects');
    }

    public function actionSaveOrder() {
        $request = Yii::app()->request;
        if ($request->isAjaxRequest) {
            $order = $request->getQuery('id');
            fb($order);
            foreach ($order as $id => $item) {
                Yii::app()->db->createCommand()->update('projects', array('position' => $id), 'id = ' . $item);
            }
            echo CJavaScript::jsonEncode(array('order' => $order));
            Yii::app()->end();
        } else {
            throw new CHttpException(404, 'Неправильный запрос');
        }

    }


}