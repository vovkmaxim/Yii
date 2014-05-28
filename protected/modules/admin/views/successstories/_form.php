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

<!--	--><?php //echo $form->textFieldRow($model,'client',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<!---->
<!--	--><?php //echo $form->textFieldRow($model,'task',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<!---->
<!--	--><?php //echo $form->textAreaRow($model,'solution',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<!---->
<!--	--><?php //echo $form->textAreaRow($model,'result',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

    <?php echo $form->labelEx($model,'pic'); ?>
<div class="control-group">
    <p>Formats: JPG, JPEG, GIF, PNG.</p>
    <p>Recommended size: 120x120</p>
</div>
    <?php if($model->pic): ?>
        <p><?php echo CHtml::encode($model->pic); ?></p>
    <?php endif; ?>

    <?php echo $form->fileField($model,'pic'); ?>
    <?php echo $form->error($model,'pic'); ?>

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
