<div class="span4">
    <h2>Изменение тега</h2>
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm'); ?>

    <?php if($form->error($model, 'title')): ?>
        <div class="alert alert-error">
            <?php echo $form->error($model, 'title'); ?>
        </div>
    <?php endif; ?>

    <div class="control-group">
        <?php echo $form->label($model,'Название*', array('for' => 'Documents_title')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'title', array('class' => 'input-xxlarge')); ?>
        </div>
    </div>

    <div class="controls">
        <?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-save')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
