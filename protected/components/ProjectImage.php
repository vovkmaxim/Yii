<?php

class ProjectImage
{
    const PIC_SALT = 'rt3f6h';

    public function makePreview($images) {
        if (!is_array($images)) {
            return false;
        }
        if (empty($images['name']) || empty($images['type']) || empty($images['size'])) {
            return false;
        }

        foreach ($images['name'] as $id => $imageName) {
            if (in_array($images['type'][$id], array('image/jpeg', 'image/png', 'image/gif'))) {
                $this->_createDirectory('preview' . DIRECTORY_SEPARATOR . md5(session_id()));
                $previewDir = 'preview' . DIRECTORY_SEPARATOR . md5(session_id()) . DIRECTORY_SEPARATOR;
                move_uploaded_file($images['tmp_name'][$id], $previewDir . $imageName);
            }
        }
        return true;
    }

    public function getPreviews() {
        $previewDir = 'preview' . DIRECTORY_SEPARATOR . md5(session_id());
        if (!is_dir($previewDir)) {
            return array();
        }
        $files = scandir($previewDir);
        $previews = array();
        foreach ($files as $file) {
            $isFile = is_file($previewDir . DIRECTORY_SEPARATOR . $file);
            if (!$isFile) {
                continue;
            }
            $previews[] = array('url' => Yii::app()->baseUrl . '/preview/' . md5(session_id()) . '/' . $file, 'filename' => $file);
        }
        return $previews;
    }

    public function cleanPreviews($postedPreviews) {
        $oldPreviews = $this->getPreviews();
        $previewDir = 'preview' . DIRECTORY_SEPARATOR . md5(session_id());
        foreach ($oldPreviews as $preview) {
            if (!in_array(md5($preview['filename']), $postedPreviews)) {
                unlink($previewDir . DIRECTORY_SEPARATOR . $preview['filename']);
            }
        }
        return true;
    }

    protected function _createDirectory($dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        return true;
    }

    public function loadImages($images, $projectId) {
        $this->loadImagesFromPreviews($projectId);
        if (!is_array($images)) {
            return false;
        }
        if (count($images) == 0) {
            return false;
        }
        $this->_createDirectory('pics' . DIRECTORY_SEPARATOR . $projectId);
        foreach ($images['name'] as $id => $imageName) {
            if (in_array($images['type'][$id], array('image/jpeg', 'image/png', 'image/gif'))) {
                $this->_createDirectory('preview' . DIRECTORY_SEPARATOR . md5(session_id()));
                $imageDir = 'pics' . DIRECTORY_SEPARATOR . $projectId . DIRECTORY_SEPARATOR;
                move_uploaded_file($images['tmp_name'][$id], $imageDir . $imageName);
                $modelImage = new ProjectsPics();
                $modelImage->url = '/pics/' . $projectId . '/' . $imageName;
                $modelImage->project_id = $projectId;
                $modelImage->insert();
            }
        }

        return true;
    }

    public function loadImagesFromPreviews($projectId) {
        $previews = $this->getPreviews();
        if (count($previews) > 0) {
            foreach ($previews as $preview) {
                $oldName = 'preview' . DIRECTORY_SEPARATOR . md5(session_id()) . DIRECTORY_SEPARATOR . $preview['filename'];
                $newName = 'pics' . DIRECTORY_SEPARATOR . $projectId . DIRECTORY_SEPARATOR . $preview['filename'];
                rename($oldName, $newName);
                $modelImage = new ProjectsPics();
                $modelImage->url = '/pics/' . $projectId . '/' . $preview['filename'];
                $modelImage->project_id = $projectId;
                $modelImage->insert();
            }
            rmdir('preview' . DIRECTORY_SEPARATOR . md5(session_id()));
        }
    }


}