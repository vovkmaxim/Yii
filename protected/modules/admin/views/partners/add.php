<div class="span4">
    <?php if (Yii::app()->user->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
    <?php else : ?>


    <?php $form = $this->beginWidget('CActiveForm',
    array(
        'id' => 'user-form',
        'enableClientValidation' => true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data'
        )
    ));
    ?>


    <div class="control-group">
        <?php echo $form->error($model, 'url'); ?>
        <?php echo $form->label($model, 'url'); ?>
        <?php echo $form->textField($model,'url'); ?>
    </div>
    <div class="control-group">
        <?php echo $form->error($model, 'icon'); ?>
        <?php echo $form->label($model, 'icon'); ?>
        <?php echo $form->fileField($model, 'icon'); ?>
    </div>
    <div class="control-group">
        <?php echo CHtml::submitButton('Добавить'); ?>
    </div>
    <?php $this->endWidget(); ?>
    <?php endif; ?>
</div>

