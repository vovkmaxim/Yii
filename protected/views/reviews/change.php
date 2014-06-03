<?php
/* @var $this ReviewsController */

$this->breadcrumbs=array(
	'Reviews'=>array('/reviews'),
	'Change',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'changereviews-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    ));
            ?>
    	<p class="note">Fields with <span class="required">*</span> are required.</p>
        
        <input type="hidden" name="id" value="<?php echo $reviews->id; ?>">
        <input type="hidden" name="rubric_id" value="<?php echo $reviews->rubric_id; ?>">
        
        <div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('value'=>$reviews->title)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>10,'cols'=>45,'value'=>$reviews->description));//textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('value'=>$reviews->author)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton('Create'); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->
