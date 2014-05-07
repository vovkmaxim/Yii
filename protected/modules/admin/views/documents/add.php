<div class="span4">
    <?php if (Yii::app()->user->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
    <?php else : ?>


    <?php $doc = $this->beginWidget('CActiveForm',
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
    
    <?php if (isset($value['error'])) : ?>
        <div class="alert alert-error">
            <?php echo $value['error']; ?>
        </div>
    <?php endif; ?>
    
    <div class="control-group">
        <label>Название*</label>
        <div class="controls">
            <input type="text" class="input-xxlarge" name="title" value="<?php echo $value['title']; ?>" />
        </div>
    </div>


    <div class="control-group">
        <label>Описание</label>
        <div class="controls">
            <textarea class="input-xxlarge content-block" cols="40" rows="20" name="description"><?php echo $value['description']; ?></textarea>
        </div>
    </div>
    
    <div class="control-group">
        <?php echo $doc->error($model, 'file'); ?>
        <?php echo $doc->fileField($model, 'file'); ?>
    </div>
    <div class="control-group">
        <?php echo CHtml::submitButton('Добавить'); ?>
    </div>
    <?php $this->endWidget(); ?>
    <?php endif; ?>
</div>

