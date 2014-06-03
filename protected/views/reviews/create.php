<?php
/* @var $this ReviewsController */

$this->breadcrumbs=array(
	'Reviews'=>array('/reviews'),
	'Create',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'createreviews-form',
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
<!--<form method="post" action="/index.php?r=reviews/saving">
    
    <table>
        <tr>
            <td>
                Title:                 
            </td>
            <td>
                <input type="text" name="title" value=""><br>

            </td>
        </tr>
        <tr>
            <td>
                Description:                  
            </td>
            <td>
                <textarea rows="10" cols="45" name="description"></textarea><br>
            </td>
        </tr>
        <tr>
            <td>
                Author:             </td>
            <td>
                <input type="text" name="author" value=""><br>
            </td>
        </tr>
    </table>
    
	<div class="row buttons">
		<?php //echo CHtml::submitButton('Create'); ?>
	</div>
</form>-->