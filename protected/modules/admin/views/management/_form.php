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

    <?php if($form->error($model, 'email')): ?>
        <div class="alert alert-error">
            <?php echo $form->error($model, 'email'); ?>
        </div>
    <?php endif; ?>

    <?php if($form->error($model, 'img')): ?>
        <div class="alert alert-error">
            <?php echo $form->error($model, 'img'); ?>
        </div>
    <?php endif; ?>

    <div class="control-group">
        <?php echo $form->label($model,'Название*'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'title', array('class' => 'input-xxlarge')); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->label($model,'Email*'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'email', array('class' => 'input-xxlarge')); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <?php echo $form->ckEditorRow(
                $model,
                'description',
                array(
                    'editorOptions' => array(
                        'fullpage' => 'js:true',
                        'width' => '840',
                        'resize_maxWidth' => '640',
                        'resize_minWidth' => '320'
                    )
                )
            ); ?>
        </div>
    </div>

    <div class="control-group">
        Форматы картинки JPG, JPEG, BMP, GIF, PNG
    </div>

    <?php if(!empty($model->img)): ?>
    <div class="control-group">
        Картинка - <a href="/images/management/<?php echo $model->id; ?>/<?php echo $model->img; ?>" target="_blank"><?php echo $model->img; ?></a>
    </div>
    <?php endif; ?>

    <div class="control-group">
        <?php echo $form->fileField($model, 'img'); ?>
    </div>

    <div class="controls">
        <?php echo CHtml::submitButton('Принять', array('class' => 'btn btn-save')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
