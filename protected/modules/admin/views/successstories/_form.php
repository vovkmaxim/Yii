<?php
    $form=$this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'id'=>'successstories-form',
            'enableAjaxValidation'=>true,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )
    );
?>

<?php echo $form->ckEditorRow(
    $model,
    'client',
    array(
        'editorOptions' => array(
            'fullpage' => 'js:true',
            'width' => '840',
            'resize_maxWidth' => '640',
            'resize_minWidth' => '320'
        )
    )
); ?>
<?php echo $form->ckEditorRow(
    $model,
    'task',
    array(
        'editorOptions' => array(
            'fullpage' => 'js:true',
            'width' => '840',
            'resize_maxWidth' => '640',
            'resize_minWidth' => '320'
        )
    )
); ?>

<?php echo $form->ckEditorRow(
    $model,
    'solution',
    array(
        'editorOptions' => array(
            'fullpage' => 'js:true',
            'width' => '840',
            'resize_maxWidth' => '640',
            'resize_minWidth' => '320'
        )
    )
); ?>

<?php echo $form->ckEditorRow(
    $model,
    'result',
    array(
        'editorOptions' => array(
            'fullpage' => 'js:true',
            'width' => '840',
            'resize_maxWidth' => '640',
            'resize_minWidth' => '320'
        )
    )
); ?>
<?php ////echo $form->labelEx($model,'client'); ?>
<?php ////$this->widget('application.extensions.vince.widgets.redactorjs.Redactor', array( 'model' => $model, 'attribute' => 'result' )); ?>
<!--<!---->
<?php //echo $form->labelEx($model,'task'); ?>
<?php //$this->widget('application.extensions.vince.widgets.redactorjs.Redactor', array( 'model' => $model, 'attribute' => 'result' )); ?>
<!---->
<?php //echo $form->labelEx($model,'solution'); ?>
<?php //$this->widget('application.extensions.vince.widgets.redactorjs.Redactor', array( 'model' => $model, 'attribute' => 'result' )); ?>
<!---->
<?php //echo $form->labelEx($model,'result'); ?>
<?php //$this->widget('application.extensions.vince.widgets.redactorjs.Redactor', array( 'model' => $model, 'attribute' => 'result' )); ?>

<!--	--><?php //echo $form->textFieldRow($model,'client',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<!---->
<!--	--><?php //echo $form->textFieldRow($model,'task',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<!---->
<!--	--><?php //echo $form->textAreaRow($model,'solution',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<!---->
<!--	--><?php //echo $form->textAreaRow($model,'result',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<div class="control-group">
<!--    --><?php //if($model->pic): ?>
<!--        Image:<br>-->
<!--        --><?php //echo CHtml::image(DIRECTORY_SEPARATOR.$model->pic,
//            "this is alt tag of image",
//            array("width"=>"120px" ,"height"=>"120px"));
//        ?>
<!--    --><?php //endif; ?>

    <?php if(!empty($model->pic)): ?>
    Image:<br>
    <?php echo CHtml::image(DIRECTORY_SEPARATOR.$model->pic,
        "this is alt tag of image",
        array("width"=>"120px" ,"height"=>"120px"));
    ?>
    <?php if(!$model->isNewRecord): ?>
            <?php if ($model->pic != ''): ?>
                <p><?php  echo CHtml::link('Delete image', array("/admin/successstories/deletefile/", 'id'=>$model->id), array('confirm'=>'Are you sure?',)); ?></p>
            <?php endif; ?>
        <?php endif; ?>
    <?php else: ?>
        No Picture uploaded

    <?php endif; ?>

<br>
<p>Upload new image: Formats: JPG, JPEG, GIF, PNG. Recommended size: 120x120</p>
    <?php echo $form->fileField($model,'pic'); ?>
    <?php echo $form->error($model,'pic'); ?>
</div>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		));
    ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton',
        array('buttonType' => 'reset', 'label' => 'Reset')
    );
    ?>
</div>

<?php $this->endWidget(); ?>
