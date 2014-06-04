<div class="span4">
    <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/tech">&lt;&nbsp;&lt;&nbsp;&lt;&nbsp; Back </a>
    <h2>Update technology</h2>
    <?php $this->renderPartial('_form', array(
        'model' => $model,
        'list' => $list,
    )); ?>