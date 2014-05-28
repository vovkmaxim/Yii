
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'documents-form',
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

<?php if($form->error($model, 'title')): ?>
    <div class="alert alert-error">
        <?php echo $form->error($model, 'title'); ?>
    </div>
<?php endif; ?>

<?php if($form->error($model, 'url')): ?>
    <div class="alert alert-error">
        <?php echo $form->error($model, 'url'); ?>
    </div>
<?php endif; ?>

<div class="control-group">
    <?php echo $form->label($model,'Title*'); ?>
    <div class="controls">
        <?php echo $form->textField($model,'title', array('class' => 'input-xxlarge')); ?>
    </div>
</div>

<div class="control-group">
    <?php echo $form->label($model,'Url*'); ?>
    <div class="controls">
        <?php echo $form->textField($model,'url', array('class' => 'input-xxlarge')); ?>
    </div>
</div>

<div class="control-group">
    <?php echo $form->label($model,'Parent*'); ?>
    <div class="controls">
        <?php echo $form->dropDownList($model,'parent', Navigation::titleList()); ?>
    </div>
</div>

<div class="control-group">
    <?php echo $form->label($model,'Category*'); ?>
    <div class="controls">
        <?php echo $form->dropDownList($model,'category', NavigationCategories::titleList()); ?>
    </div>
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
</div>