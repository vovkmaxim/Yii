<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm'); ?>

<?php if($form->error($model, 'username')): ?>
    <div class="alert alert-error">
        <?php echo $form->error($model, 'username'); ?>
    </div>
<?php endif; ?>

<?php if($form->error($model, 'email')): ?>
    <div class="alert alert-error">
        <?php echo $form->error($model, 'email'); ?>
    </div>
<?php endif; ?>

<div class="control-group">
    <?php echo $form->label($model,'Username*'); ?>
    <div class="controls">
        <?php echo $form->textField($model,'username', array('class' => 'input-xxlarge')); ?>
    </div>
</div>

<div class="control-group">
    <?php echo $form->label($model,'E-Mail'); ?>
    <div class="controls">
        <?php echo $form->textField($model,'email', array('class' => 'input-xxlarge')); ?>
    </div>
</div>

<div class="control-group">
    <?php echo $form->label($model,'Password'); ?>
    <div class="controls">
        <?php echo $form->textField($model,'password', array('value' => '', 'class' => 'input-xxlarge')); ?>
    </div>
</div>

<div class="control-group">
    Роль
    <div class="controls">
        <?php echo $form->dropDownList($model,'role', Users::titleList()); ?>
    </div>
</div>

<div class="control-group">
    <?php echo $form->label($model,'Email Host'); ?>
    <div class="controls">
        <?php echo $form->textField($model,'email_host', array('class' => 'input-xxlarge')); ?>
    </div>
</div>

<div class="control-group">
    <?php echo $form->label($model,'Email User'); ?>
    <div class="controls">
        <?php echo $form->textField($model,'email_user', array('class' => 'input-xxlarge')); ?>
    </div>
</div>

<div class="control-group">
    <?php echo $form->label($model,'Email Password'); ?>
    <div class="controls">
        <?php echo $form->textField($model,'email_password', array('class' => 'input-xxlarge')); ?>
    </div>
</div>

<div class="controls">
    <?php echo CHtml::submitButton('Принять', array('class' => 'btn btn-save')); ?>
</div>

<?php $this->endWidget(); ?>
</div>
