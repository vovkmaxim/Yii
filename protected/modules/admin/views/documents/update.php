<div class="span4">
    <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/documents">&lt;&nbsp;&lt;&nbsp;&lt;&nbsp; Back </a>

    <h2>Update document</h2>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>