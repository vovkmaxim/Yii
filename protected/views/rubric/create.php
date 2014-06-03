<?php
/* @var $this RubricController */

$this->breadcrumbs = array(
    'Rubric' => array('/rubric'),
    'Create',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>


<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'rubric-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    ));    
            ?>
    	<p class="note">Fields with <span class="required">*</span> are required.</p>
        <div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>10,'cols'=>45)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
        <div class="row">
            <p><select name="root_rubric">
                    <?php foreach ($rubric as $rubrics){ ?>
                        <option value="<?php echo $rubrics->root_id; ?>"><?php echo $rubrics->name; ?></option>
                    <?php } ?>
            </select></p>	
        </div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton('Create'); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->
