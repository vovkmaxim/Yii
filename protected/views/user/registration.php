<?php
/* @var $this UserController */

$this->breadcrumbs=array(
	'User'=>array('/user'),
	'Registration',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'registration-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    ));
            ?>
    	<p class="note">Fields with <span class="required">*</span> are required.</p>
        <div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email');//textField($model,'description'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'password2'); ?>
		<?php echo $form->textField($model,'password2'); ?>
		<?php echo $form->error($model,'password2'); ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton('Registration'); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->