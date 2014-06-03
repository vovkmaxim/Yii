<?php
/* @var $this NewsController */

$this->breadcrumbs=array(
	'News'=>array('/news'),
	'Create',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'createnews-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    ));
            ?>
    	<p class="note">Fields with <span class="required">*</span> are required.</p>
        <div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>10,'cols'=>45));//textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author'); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton('Create'); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->