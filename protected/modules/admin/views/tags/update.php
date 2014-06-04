<div class="span4">
    <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/tags">&lt;&nbsp;&lt;&nbsp;&lt;&nbsp; Back </a>
    <h2>Update tag</h2>
    <?php $this->renderPartial('_form', array(
        'model' => $model
    )); ?>