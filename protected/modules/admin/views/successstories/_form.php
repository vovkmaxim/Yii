<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'successstories-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>




	<?php echo $form->textFieldRow($model,'client',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'task',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'solution',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'result',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<!--	--><?php //echo $form->textFieldRow($model,'pic',array('class'=>'span5')); ?>
<!--    --><?php //echo $form->fileFieldGroup($model, 'pic',array('wrapperHtmlOptions' => array('class' => 'col-sm-5',),)); ?>
    <?php echo $form->labelEx($model,'pic'); ?>
    <?php if($model->pic): ?>
        <p><?php echo CHtml::encode($model->pic); ?></p>
    <?php endif; ?>

    <?php echo $form->fileField($model,'pic'); ?>
    <?php echo $form->error($model,'pic'); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
		));
    ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton',
        array('buttonType' => 'reset', 'label' => 'Сбросить')
    );
    ?>
</div>

<?php $this->endWidget(); ?>
