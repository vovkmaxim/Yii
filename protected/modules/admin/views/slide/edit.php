<div class="span4">
    <h2>Изменение слайда</h2>
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'slides-form',
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
    )); ?>

    <?php if($form->error($model, 'img')): ?>
        <div class="alert alert-error">
            <?php echo $form->error($model, 'img'); ?>
        </div>
    <?php endif; ?>

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

    <div class="control-group">
        Картинка - <a href="/slides/<?php echo $model->id; ?>/<?php echo $model->img; ?>" target="_blank"><?php echo $model->img; ?></a>
    </div>

    <div class="control-group">
        <?php echo $form->fileField($model, 'img'); ?>
    </div>

    <div class="controls">
        <?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-save')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
