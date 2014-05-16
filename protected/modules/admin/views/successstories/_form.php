<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'successstories-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php ///** @var TbActiveForm $form */
//$form = $this->beginWidget(
//    'booster.widgets.TbActiveForm',
//    array(
//        'id' => 'horizontalForm',
//        'type' => 'horizontal',
//    )
//); ?>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>



	<?php echo $form->textFieldRow($model,'client',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'task',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'solution',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'result',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'pic',array('class'=>'span5')); ?>
<!--    --><?php //echo $form->fileFieldGroup($model, 'pic',array('wrapperHtmlOptions' => array('class' => 'col-sm-5',),)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
