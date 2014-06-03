<?php
/* @var $this RubricController */

$this->breadcrumbs = array(
    'Rubric' => array('/rubric'),
    'Change',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'changerubric-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('value' => $rubric->name)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 10, 'cols' => 45, 'value' => $rubric->description)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>
    <div class="row">
        <p><select name="root_rubric">
                <?php foreach ($rubrics as $rubricw) { ?>
                    <?php
                    if ($rubricw->root_id == $rubric->root_id) {
                        echo "<option selected value='" . $rubricw->root_id . "' > " . $rubricw->name . " </option>";
                    } else {
                        echo "<option value='" . $rubricw->root_id . "' >" . $rubricw->name . "</option>";
                    }
                }
                ?>
            </select></p>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Change'); ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
<!--
<form method="post" action="/index.php?r=rubric/changesave">

    <input type="hidden" name="id" value="<?php echo $rubric->id; ?>">
    <table>
        <tr>
            <td>
                Title:                 
            </td>
            <td>
                <input type="text" name="title" value="<?php echo $rubric->name; ?>"><br>

            </td>
        </tr>
        <tr>
            <td>
                Description:                  
            </td>
            <td>
                <textarea rows="10" cols="45" name="description"><?php echo $rubric->description; ?></textarea><br>
            </td>
        </tr>
    </table>

    <div class="row buttons">
<?php echo CHtml::submitButton('Change'); ?>
    </div>
</form>-->