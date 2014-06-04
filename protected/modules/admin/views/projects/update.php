<div class="span4">
    <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/projects">&lt;&nbsp;&lt;&nbsp;&lt;&nbsp; Back </a>
    <h2>Update Project</h2>
    <?php $this->renderPartial('_form', array(
        'model' => $model,
        'tech' => $tech,
        'tagsList' => $tagsList
    )); ?>